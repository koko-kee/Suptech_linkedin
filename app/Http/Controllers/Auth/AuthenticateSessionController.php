<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Ajoutez cette ligne pour importer la classe Session
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
        $request->authenticate();
        $request->session()->regenerate();
    
        $typeRegister = Session::get('type');
    
        if ($typeRegister == 1) {
            return redirect(route('home'));
        } else {
            return redirect(route('register'));
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
        return redirect('/');
    }
}
