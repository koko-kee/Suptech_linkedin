<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    public function index(){
        $entreprises=Entreprise::all();
        return View("Admin.entreprise.index",compact('entreprises'));
    }
}
