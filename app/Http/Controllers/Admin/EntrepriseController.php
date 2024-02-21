<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\SendEmailEnableAccount;
use Illuminate\Support\Facades\Mail;

class EntrepriseController extends Controller
{
    public function index(){

        $entreprises=Entreprise::orderBy('created_at','desc')->paginate(5);
        return View("Admin.entreprise.index",compact('entreprises'));
    }

    public function EnableAccount(Entreprise $entreprise)
    {
        DB::beginTransaction();
        try {
            $entreprise->isCompany = true;
            $entreprise->save();
            Mail::to($entreprise->email)->send(new SendEmailEnableAccount($entreprise));
            DB::commit();
            return redirect()->back()->with('success', 'Le compte a été activé avec succès.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('danger', "L'Activation du compte a echouer L'e-mail n'a pas été envoyé. Veuillez réessayer plus tard.");
        }
    }

    public function DiseableAccount(Entreprise $entreprise)
    {
        $entreprise->isCompany = false;
        $entreprise->update();
        return redirect()->back()->with('success','le compte a ete desactiver');
    }
}
