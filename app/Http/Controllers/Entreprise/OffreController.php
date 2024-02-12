<?php

namespace App\Http\Controllers\Entreprise;
use App\Http\Controllers\Controller;
use App\Models\Offre;
use App\Models\StatutOffre;
use App\Models\TypeContrat;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Http\Request;


class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entreprise.offre.offre',[
            'typeContrats' => TypeContrat::all(),
            'statusOffre' => StatutOffre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'libelle'=> "required",
            'description'=> "required",
        ],
        [
            'libelle.required' =>"Le libellé ne doit pas etre vide",
            'description.required' =>"La description ne doit pas etre vide"
        ]
    );

    $offre = Offre::create([

        'libelle' => $request->input('libelle'),
        'description' => $request->input('description'),
        'localisation' => $request->input('localisation'),
        'date_limite' => $request->input('date_limit'),
        'statut_offre_id' => $request->input('statut_offre_id'),
        'type_contrat_id' => $request->input('type_contrat_id'),
        'entreprise_id' => 1
    ]);
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Offre $offre)
    {
        $desc = Str::markdown($offre->description);
        return View('entreprise.offre.showoffre',compact('offre','desc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
