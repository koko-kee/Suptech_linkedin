<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\sendResetMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\ResetCompleteRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ForgetController extends Controller{

    public function FormForget(){
        return view('Auth.resetPassword');
    }

    public function FormReset(){
        return view('Auth.resetConclusion');
    }

    public function SendToken(ResetRequest $request){
        //1a. verifier le contenu de la saisie
        $request->validated();

        //1b. vérifier si l'email existe dans notre db
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', "Nous ne retrouvons pas cette adresse. \nVoulez-vous vous inscrire?");
        }

        //2a. générer un token 
        $token = \Str::random(16);

        //2b. insérer ce token dans notre db

        DB::beginTransaction();

       $insertion =  DB::table('password_reset_tokens')->insert([
        'email' => $user->email,  
        'token' => $token,
        ]);

       $envoi =  Mail::to($user)->send(new SendResetMail($token,$user->email));

       if($insertion && $envoi){
          DB::commit();
         return redirect()->back()->with('success', 'Un e-mail a été envoyé à cette adresse. <br>Veuillez le consulter afin de pouvoir poursuivre le processus');
       
       }else{
        DB::rollback();
        return redirect()->back()->with('failure', 'Une erreur est survenue lors de l\'envoi de l\'email. <br>Veuillez réessayer plus tard.');
       }
}   
    
    public function CheckToken($token){    
        $resetToken = DB::table('password_reset_tokens')->where('token', $token)->first();
        if (!$resetToken) {
            abort(404); 
        }

        Session()->put('resetEmail', $resetToken->email);
        return redirect()->route('reset');
    
    }
    
    public function newPassword(ResetCompleteRequest $request)
    {
        $credentials = $request->validated();
        $newPassword = Hash::make($credentials['password']);
        
        DB::beginTransaction();

        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            $user->password = $newPassword;
            $user->save();

            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
            
            DB::commit();
            
            session()->forget('resetEmail');
            return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
        }else{
            DB::rollback();
            return redirect()->back()->with('error', 'Nous éprouvons des difficultés pour joindre à la base de données. <br>Veuillez nous excuser et réessayer plus tard');
        }
    }
}