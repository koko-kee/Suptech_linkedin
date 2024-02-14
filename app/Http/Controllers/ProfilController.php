<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function showProfil(){

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

        'name'=>["required"],
        'telephone'=>["required"],
        'adresse'=>["required"],
        'date_naissance'=>["required", "date"],
        'email'=>["required", "email"],

        
    ]);
    $user = auth()->user();
    $user->update($request->all());
    return redirect()->route('user.profil.index')->with("success", "Modifier avec succes");
}








}
