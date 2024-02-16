<?php

namespace App\Http\Controllers\Entreprise;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Offre;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offres=Offre::all();

        return view('entreprise.profil.profil', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'logo' => 'required',
            'nom' => 'required'
            ]);

        $entreprise  = new Entreprise();
        $entreprise->logo = $request->input('logo');
        $entreprise->nom = $request->input('nom');       
        $entreprise->save();
        return redirect()->route('entreprise.profil')->with('success','information ajoutée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $entreprise= Entreprise::find($id);
        return  view('entreprise.profil.edit',compact('entreprise'));
        //return view('entreprise.profil.edit');
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
