<?php

namespace App\Http\Controllers\Admin;
use App\Models\Competence;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function index()
    {
        $competences = Competence::all();
        return View('Admin.competences.index',compact('competences'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "name"=>[
                "required",
                
            ]
            
        ]);
        $competence = new Competence();
        $competence->name = $request->name;
        $competence->save();
        return redirect()->route('competences.index')->with('success', "Competence creer");

    }
    public function edit(Request $request,$id)
    {
        $competence = Competence::find($id);
        return view('Admin.competences.edit',compact('competence'));
    }
    public function update(Request $request,$id)
    {
        $competence = Competence::find($id);
        $competence->name = $request->name;
        $competence->update();
        return redirect()->route('competences.index') ->with('success', "Competence modifier");
    }
    public function destroy(Request $request,$id)
    {
        $competence = Competence::find($id);
        $competence->delete();
        return redirect()->route('competences.index')->with('success', "Competence supprimer");

    }
}
