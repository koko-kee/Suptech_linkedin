<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    public function index(){

        $entreprises=Entreprise::orderBy('created_at','desc')->paginate(5);
        return View("Admin.entreprise.index",compact('entreprises'));
    }

    public function EnableAccount(Entreprise $entreprise)
    {
        $entreprise->isCompany = true;
        $entreprise->update();
        return redirect()->back()->with('success','le compte a ete activer');
    }

    public function DiseableAccount(Entreprise $entreprise)
    {
        $entreprise->isCompany = false;
        $entreprise->update();
        return redirect()->back()->with('success','le compte a ete desactiver');
    }
}
