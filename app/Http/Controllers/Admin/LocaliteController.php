<?php

namespace App\Http\Controllers\Admin;

use App\Models\Localite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaliteController extends Controller
{
    public function index()
    {
        $localites = Localite::all();
        return view('Admin.localites.index',compact('localites'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "name"=>[
                "required",
                
            ]
        ]);
        $localite = new Localite();
        $localite->name = $request->name;
        $localite->save();
        return redirect()->route('localites.index')->with('success', "Localite creer");

    }
    public function edit(Request $request,$id)
    {
        $localite = Localite::find($id);
        return view('Admin.localites.edit',compact('localite'));
    }
    public function update(Request $request,$id)
    {
        $localite = Localite::find($id);
        $localite->name = $request->name;
        $localite->update();
        return redirect()->route('localites.index')->with('success', "Localite modifier");
    }
    public function destroy(Request $request,$id)
    {
        $localite = Localite::find($id);
        $localite->delete();
        return redirect()->route('localites.index')->with('success', "Localite supprimer");

    }
}
