<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\ResetRequest;


class ForgetController extends Controller{

    public function FormForget(){
        return view('Auth.resetPassword');
    }

    public function Reset(ResetRequest $request){

        //1. verifier le contenu de la saisie
        $request->validate([
            'email' => 'required|email',
        ]);

           /* 
           Vérifier si l'utilisateur existe avec l'adresse e-mail fournie
           $user = User::where('email', $request->email)->first();

           if (!$user) {
               return redirect()->back()->with('error', 'Adresse e-mail invalide.');
           }
           changer $request par $user une fois la validation effectuée
            */

           //2a. générer un token 
           $token = str_random(16);

           //2b. insérer ce token dans notre db
           DB::table('password_reset_tokens')->insert([
            'email' => $request->email,  
            'token' => $token,
            ]);

            //3. générer un lien de redirection pour l'email 
            $resetUrl = URL::to('/reset') . '?token=' . $token;

            //4. envoyer l'email
            Mail::send('resetEmail', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Réinitialisation de mot de passe');
            });

            //5. message de confirmation
            //return redirect()->back()->with('success', 'Un e-mail de réinitialisation de mot de passe a été envoyé.');
    }

}