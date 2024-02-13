<?php

namespace App\Http\Controllers\Admin;
use App\Models\Niveau;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index()
    {
        $niveaux = Niveau::all();
        return view('Admin.niveaux.index',compact('niveaux'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "name"=>[
                "required",
                
            ]
        ]);
        $niveau = new Niveau();
        $niveau->name = $request->name;
        $niveau->save();
        return redirect()->route('niveaux.index')->with('success', "Niveau creer");

    }
    public function edit(Request $request,$id)
    {
        $niveau = Niveau::find($id);
        return view('Admin.niveaux.edit',compact('niveau'));
    }
    public function update(Request $request,$id)
    {
        $niveau = Niveau::find($id);
        $niveau->name = $request->name;
        $niveau->update();
        return redirect()->route('niveaux.index')->with('success', "Niveau modifier");
    }
    public function destroy(Request $request,$id)
    {
        $niveau = Niveau::find($id);
        $niveau->delete();
        return redirect()->route('niveaux.index')->with('success', "Niveau supprimer");

    }
}
