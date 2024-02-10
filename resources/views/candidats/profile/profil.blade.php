@extends('partials._layout')

@section('content')

<div class="card">
    <div class="card-header">
        Mon profil
    </div>
    <div class="card-body">
        <h1  class="card-title">Informations Personnelles</h1>


        <h6 class="card-title">Nom:  {{ $user->name }} </h6>
        <h6 class="card-title">Telephone: {{ $user->telephone }} </h6>
        <h6 class="card-title">Adresse: {{ $user->adresse }}</h6>
        <h6 class="card-title">Date de naissance: {{ $user->date_naissance }}</h6>
        <h6 class="card-title">Email: {{ $user->email }}</h6>
        
        <a href="#" class="btn btn-primary">Modifier profil</a>
    </div>
</div>

@endsection