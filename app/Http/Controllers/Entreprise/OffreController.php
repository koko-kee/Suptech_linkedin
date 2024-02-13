<?php

namespace App\Http\Controllers\Entreprise;
use App\Http\Controllers\Controller;

use App\Models\Offre;
use Auth;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entreprise.offre.offre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'libelle'=> "required",
            'description'=> "required"
        ],
        [
            'libelle.required' =>"Le libellé ne doit pas etre vide",
            'description.required' =>"La description ne doit pas etre vide"
        ]
    );
    $offre = Offre::create([
        'libelle' => $request->input('libelle'),
        'description' => $request->input('description'),
        'entreprise_id' => 1
        
    ]);
    return redirect()->back()->with('succes',"Offre ajouter avec succes");
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
