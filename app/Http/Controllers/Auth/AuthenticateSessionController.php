<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
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
                'email' => 'L\'authentification a échoué'
            ]);
        }
        $request->session()->regenerate();
        if(Auth::user()->ManyRoles()){

           session::put('current_role','AdminEntreprise');
           return redirect()->route('dash');

        }else if(Auth::user()->isAdmin()){

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
