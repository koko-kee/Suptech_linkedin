@extends('partials._layout')
@section('content')
    <h5 class="card-title fw-semibold mb-4">Nouvelle Offre</h5>
    @if(session('success'))
<div class="alert alert-success" role="alert">
{{session('success')}}
</div>
@endif
    <div class="card">
        <div class="card-body">
            <form  class="form-group" action="{{route('entreprise.offre.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-5">
                            <label for="exampleInputEmail1" class="form-label">Libelle de l'offre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="libelle">
                            @error('libelle')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-5">
                            <label for="exampleInputEmail1"  class="form-label">Lieu de travail</label>
                            <input placeholder="Ville,Region ou departement" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="localisation">
                            @error('localisation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Type contrat</label>
                            <select id="disabledSelect" name="type_contrat_id" class="form-select">
                                @foreach($typeContrats as $contrat)
                                    <option value="{{$contrat->id}}">{{$contrat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Statut de l'offre</label>
                            <select id="disabledSelect" name="statut_offre_id" class="form-select">
                                @foreach($statusOffre as $offreStatut)
                                    <option value="{{$offreStatut->id}}">{{$offreStatut->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-5">
                            <label for="exampleInputEmail1" class="form-label">Date Limite</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_limite">
                            @error('date_limite')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="exampleInputPassword1" class="form-label">description de l'offre</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Soumettre</button>
                </div>
            </form>
        </div>
    </div>
@endsection
