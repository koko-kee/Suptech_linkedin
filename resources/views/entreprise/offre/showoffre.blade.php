@extends('partials._layout')
@section('content')
<div class="container">
    <div class="d-flex align-items-center mb-2 ">
        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;"alt="Avatar" />
        <h1 style="margin-left: 20px">{{ $offre->entreprise->name }}</h1>
    </div>
    <h1>{{$offre->libelle}}</h1>
    <span class="badge bg-primary mb-3">{{$offre->created_at->diffForHumans()}}</span>
    <span class="badge bg-success mb-3">Statut : {{$offre->contrat?->name}} </span>
    
    {!! Illuminate\Support\Str::markdown($offre->description) !!}
    <hr>
   <a class="btn btn-danger fw-bold" href="{{route('candidats.postule', $offre->id)}}">Postuler Maintenant</a>
    <hr>
    
</div>
@endsection
