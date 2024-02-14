
@extends('partials._Layout')
@section('content')

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

<div class="container">
   <div class="card">
       <div class="card-body">
            <div class="d-flex align-items-center mb-2 ">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;"alt="Avatar" />
                <h1 style="margin-left: 20px">{{  $user->name }}</h1>
            </div>
       </div>
   </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h1  class="card-title">Informations Personnelles</h1>
            </div>
        
            <div class="card-body">
                <h1  class="card-title">Informations Personnelles</h1>
                <h6 class="card-title">Nom:  {{ $user->name }} </h6>
                <h6 class="card-title">Telephone: {{ $user->telephone }} </h6>
                <h6 class="card-title">Adresse: {{ $user->adresse }}</h6>
                <h6 class="card-title">Date de naissance: {{ $user->date_naissance }}</h6>
                <h6 class="card-title">Email: {{ $user->email }}</h6>
                
                <a href="{{route('user.profil.edit')}}" class="btn btn-primary">Modifier profil</a>
                
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h1  class="card-title">Mes competences</h1>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                  </ul>    
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h1  class="card-title">Niveau D'etudes</h1>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                  </ul>    
            </div>
        </div>
    </div>
</div>
<a href="{{route('user.profil.edit')}}" class="btn btn-danger">Supprimer mon compte</a>
@endsection