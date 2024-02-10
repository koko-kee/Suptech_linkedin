<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function showProfil(){

        AUTH::user();
        $user = auth()->user();   
        return view('candidats.profile.profil', compact ('user'));

    }


    public function editProfil()
    {
        $user = auth()->user(); 
        return view('candidats.profile.edit', compact('user'));
    }


public function updateProfil(Request $request)
{
    
    $request->validate([
        
    ]);
    $user = auth()->user();
    $user->update($request->all());
    return redirect()->route('user.profil.index');
}








}
