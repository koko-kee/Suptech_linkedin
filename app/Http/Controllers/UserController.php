<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;


class UserController extends Controller
{
    public function Index(){

        $offres = Offre::orderBy('created_at','desc')->paginate(5);
        return view('candidats.index', compact('offres'));
    }

    public function mesDemandes(){

        $demandes = Demande::where("user_id", "=", auth()->user()->id)->get();

    }



     
}
