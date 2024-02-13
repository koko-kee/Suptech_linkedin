<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use Illuminate\Support\Facades\Mail;
use App\Models\Offre;
use App\Models\Entreprise;
use App\Models\User;
use App\Mail\SendMailDemande;

class PostulerController extends Controller
{
    public function showForm(int $id){
        return view('candidats.demande.postule', compact('id'));

    }

    public function store(Request $request, int $id){

        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048' // Validation pour s'assurer que le fichier est un PDF et de taille maximale 2MB
        ]);

        if ($request->file('cv')) {
            $fileName = time().'.'.$request->cv->extension();  
            $request->cv->move(public_path('pdfs'), $fileName);
            Demande::create ([
                'offre_id'=>$id,
                'user_id'=>auth()->user()->id,
                'cv'=>$fileName
                
            ]);

            $offre = Offre::find($id);
            $entreprise=Entreprise::find($offre->entrepise);
            $user = User::find(auth()->user()->id);

            Mail::to($entreprise)->send(new SendMailDemande($offre, $user));

            return redirect()->back()->with('success', 'Votre demande a ete soumis avec succes');
        } else {
            return redirect()->back()->with('error', 'Failed to upload PDF.');
        }
    }

}
