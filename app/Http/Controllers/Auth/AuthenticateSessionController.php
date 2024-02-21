<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Ajoutez cette ligne pour importer la classe Session
use Illuminate\Validation\ValidationException; // Ajoutez cette ligne pour importer la classe ValidationException
use App\Providers\RouteServiceProvider;

class AuthenticateSessionController extends Controller
{
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
        
            return redirect()->back();
        }
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Email ou mot de passe incorrect'
            ]);
        }
        $request->session()->regenerate();
        if(Auth::User()->ManyRoles()){
            $count = Offre::count();
           session::put('current_role',(Auth::user()->entreprise->isCompany) ? 'AdminEntreprise' :'candidat');
           return (Auth::user()->entreprise->isCompany) ? redirect()->route('dash',compact('count')) : redirect()->route('offres');

        }else if(Auth::User()->isAdmin()){
            session::put('current_role','admin');
            return redirect()->route('dash');
        }
        else{
            session::put('current_role','candidat');
            return redirect()->route('offres');
        }
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        return redirect('/');
    }
}
