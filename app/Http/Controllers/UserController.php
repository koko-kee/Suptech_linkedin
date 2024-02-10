<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;


class UserController extends Controller
{
    public function Index(){

    $offres = Offre::all();
    return view('candidats.index', compact('offres'));

    }
}
