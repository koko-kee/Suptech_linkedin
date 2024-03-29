<?php

namespace App\Http\Controllers\Entreprise;
use App\Http\Controllers\Controller;
use App\Http\Requests\OffreRequest;
use App\Models\Offre;
use App\Models\StatutOffre;
use App\Models\TypeContrat;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offres = Offre::orderBy('created_at','desc')->paginate(5);
        return view('candidats.index', compact('offres'));
    }

    public function MyOffre()
    {
        $myOffre = Offre::where('entreprise_id',auth()->User()->entreprise_id)->get();
        return View('entreprise.offre.NosOffre',compact('myOffre'));
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
    public function store(OffreRequest $request)
    {
        //validation
        $request->validate(
            [
                'libelle.required' =>"Le libellé ne doit pas etre vide",
                'description.required' =>"La description ne doit pas etre vide"
            ]
        );

    $offre = Offre::create([

        'libelle' => $request->input('libelle'),
        'description' => $request->input('description'),
        'localisation' => $request->input('localisation'),
        'date_limite' => $request->input('date_limite'),
        'statut_offre_id' => $request->input('statut_offre_id'),
        'type_contrat_id' => $request->input('type_contrat_id'),
        'entreprise_id' => $request->user()->entreprise_id
    ]);
    return redirect()->back()->with('success',"Offre publier");
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
    public function edit(Offre $offre)
    {
        $typeContrats = TypeContrat::all();
        $statusOffre = StatutOffre::all();
        return View('entreprise.offre.edit',compact('offre','typeContrats','statusOffre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        $request->validate([
            'libelle'=> "required",
            'description'=> "required",
            'date_limite'=> "required|date",
            'localisation'=> "required|string",
            'statut_offre_id'=> "required|exists:statut_offres,id",
            'type_contrat_id'=> "required|exists:type_contrats,id",
        ],
        [
            'libelle.required' =>"Le libellé ne doit pas etre vide",
            'description.required' =>"La description ne doit pas etre vide"
        ]);


        $offre->update([

            'libelle' => $request->input('libelle'),
            'description' => $request->input('description'),
            'localisation' => $request->input('localisation'),
            'date_limite' => $request->input('date_limite'),
            'statut_offre_id' => $request->input('statut_offre_id'),
            'type_contrat_id' => $request->input('type_contrat_id'),
            'entreprise_id' => $request->user()->entreprise_id
        ]);

        return redirect()->back()->with('success',"Offre Modfier");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
