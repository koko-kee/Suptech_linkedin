<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetCompleteRequest extends FormRequest
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
            'password' => 'required|string|min:12|same:password_confirmation',
            'password_confirmation' => 'required|string|min:12',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Un email valide est requis.',
            'password.required' => 'Le champ mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.same' => 'Les mots de passe ne correspondent pas.'
        ];
    }
}
