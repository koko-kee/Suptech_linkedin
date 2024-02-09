<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Str;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function authenticate()
    {
        // Vérifie si l'utilisateur n'a pas atteint la limite de tentatives de connexion.
        $this->ensureIsNotRateLimited();

        // Tente d'authentifier l'utilisateur en utilisant les informations d'email et de mot de passe.
        if (!Auth::attempt($this->only('email', 'password'), $this->filled('remember'))) {
            // Si l'authentification échoue, enregistre une tentative ratée dans le mécanisme de limitation du taux.
            RateLimiter::hit($this->throttleKey());

            // Lève une exception de validation avec un message d'échec d'authentification.
            throw ValidationException::withMessages([
                'email' => 'l authentification a echoue'
            ]);
        }

        // Si l'authentification réussit, récupère l'utilisateur authentifié.
        $user = Auth::user();

        // Vérifie si le compte de l'utilisateur est inactif (status = 0).
        if ($user->status == 0) {
            // Déconnecte l'utilisateur et lève une exception avec un message indiquant que le compte est inactif.
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Votre compte est inactif, veuillez contacter votre administrateur'
            ]);
        }

        // Si tout est en ordre, efface les éventuelles tentatives de connexion ratées enregistrées précédemment.
        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited()
    {
        // Vérifie si le nombre de tentatives n'a pas dépassé la limite (5 tentatives dans ce cas).
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return; // Si la limite n'est pas atteinte, la fonction se termine ici.
        }

        // Si la limite est atteinte, déclenche un événement de type Lockout avec l'objet courant.
        event(new Lockout($this));

        // Récupère le nombre de secondes restantes avant de pouvoir réessayer.
        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Lève une exception de validation avec un message.
        throw ValidationException::withMessages([
            'email' => 'Trop de tentatives de connexion. Veuillez réessayer dans :seconds secondes.',
            'seconds' => $seconds,
            'minutes' => ceil($seconds / 60),
        ]);
    }

    public function throttleKey()
    {
        // Utilise la classe Str de Laravel pour convertir l'adresse email en minuscules.
        // Concatène l'adresse email en minuscules avec l'adresse IP de l'utilisateur, séparées par '|'.
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }
}
