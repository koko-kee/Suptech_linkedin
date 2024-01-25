<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntrepriseRequest;
use App\Models\Entreprise;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class EntrepriseController extends Controller
{

    public function index()
    {
        $entreprises = Entreprise::orderBy('created_at', 'desc')->paginate();
        return response(['entreprises' => $entreprises], 200);
    }


    public function store(EntrepriseRequest $request)
    {
        $dataValidated = $request->validated();
        $imagePath = $request->validated("logo")->store("LogoEntreprise", "public");
        $dataValidated["logo"] = $imagePath;
        $entreprise = Entreprise::create($dataValidated);
        return response(['message' => 'ressource creer avec success'], 201);
    }


    public function show(Entreprise $entreprise)
    {
        return response(['entreprise' => $entreprise], 200);
    }


    public function update(EntrepriseRequest $request, Entreprise $entreprise)
    {
        $dataValidated = $request->validated();
        if (isset($data["image"])){

            if ($entreprise->logo) {
                Storage::disk("public")->delete($entreprise->logo);
            }
            $data["logo"] = $data["image"]->store("LogoEntreprise", "public");
        }

        $entreprise->update($dataValidated);
        return response(['message' => 'mise à jour effectuée'], 200);
    }

    public function destroy(Entreprise $entreprise)
    {
        if ($entreprise->logo){

            Storage::disk("public")->delete($entreprise->logo);
        }
        $entreprise->delete();
        return response(['message' => 'suppression effectuer'], 200);
    }
}
