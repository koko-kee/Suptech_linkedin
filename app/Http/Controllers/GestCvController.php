<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Responce;

class GestCvController extends Controller
{
    public function index()
    {
        $cv = Cv::all();
        return view('cv.index',compact('cv'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048' // Validation pour s'assurer que le fichier est un PDF et de taille maximale 2MB
        ]);

        if ($request->file('cv')) {
            $fileName = time().'.'.$request->cv->extension();  
            $request->cv->move(public_path('cvs'), $fileName);
            CV::create ([
                'cv'=>$fileName,
                'user_id'=>auth()->user()->id,
                
                
            ]);

        }
        return redirect()->route('user.cv')->with("success", "CV Ajouter ");
    }



    public function edit(Request $request,int $id)
    {
        $cv = CV::find($id);
        return view('cv.edit',compact('cv'));
    }
    public function update(Request $request, int $id)
    {
        $cv = CV::find($id);
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048' // Validation pour s'assurer que le fichier est un PDF et de taille maximale 2MB
        ]);

        if ($request->file('cv')) {
            File::delete(public_path('cvs/'.$cv->cv));
            $fileName = time().'.'.$request->cv->extension();  
            $request->cv->move(public_path('cvs'), $fileName);
            $cv->update ([
                'cv'=>$fileName
            ]);
        }
    
        
        return redirect()->route('user.cv')->with('success', 'CV modifié avec succès');
    }
    public function destroy(Request $request,$id)
    {
        $cv = CV::find($id);
        $cv->delete();
        return redirect()->route('user.cv')->with('success', "CV supprimer");

    }
    public function dowmload(Request $request, int $id){
        $cv = CV::find($id);
        $file = public_path('cvs/'.$cv->cv);
        if(file_exists($file)){
            return response()->download($file, "cv.pdf");
        }
        return redirect()->back()->with('failed', "Le fichier n'existe pas");

    }
}
