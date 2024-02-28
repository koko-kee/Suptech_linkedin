@extends('partials._layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
                <div class="card">
                
                <img src="{{asset('./storage/'.$entreprise->entreprise->logo)}}" class="rounded-circle" style="width: 300px;"alt="Avatar" />
                </div>
                <div class="text-secondary fs-4">
                    
                    <p>{{$entreprise->entreprise->name}}</p>
                </div>
                <div>
                   <a href="{{route('entreprise.profil.edit', $entreprise->entreprise_id)}}" class="btn btn-primary w-100 p-1 fs-4 mb-4 rounded-2 fw-bold">Editer</a>
                </div>
        </div>
        <div class="col-md-7">
            <div class="bg-light w-100 py-14 fs-4 mb-4 rounded-2">
                <h3 class=" offset-4 text-black">A propos de nous</h3>
            </div>
                <div class="card">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus quibusdam dolorum eaque ut vero ratione nostrum voluptatibus, doloribus modi hic ipsam maxime?
                         Autem necessitatibus ad voluptatem qui provident cupiditate dolores?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus quibusdam dolorum eaque ut vero ratione nostrum voluptatibus, doloribus modi hic ipsam maxime?
                         Autem necessitatibus ad voluptatem qui provident cupiditate dolores?</p>

                </div>
            <!-- <div class="bg-primary w-100 py-14 fs-4 mb-4 rounded-2">
                <h3 class=" offset-4 text-white">Liste des offres</h3>
            </div> --> 
            <div class="card">
            <a href="#" class="btn btn-light">Voir plus offres</a>
            </div>
           <div>
            @foreach($offres as $offre)
            <div class="card"> 
        <!-- <img src="../assets/images/products/s4.jpg" class="card-img-top" alt="..."> -->
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 50px;"alt="Avatar" />
                <h5 style="margin-left: 15px" class="card-title">{{ $offre->entreprise->name }}</h5>
            </div>
            <h1 class="card-title">{{ $offre->libelle}}</h1>
            <p class="card-text">{{ $offre->created_at->diffForHumans()}}</p>
            <a href="{{ route('entreprise.offre.show',$offre->id) }}" class="btn btn-primary">Voir l'offre</a>
        </div>
        
    </div>

            @endforeach


           </div>
        </div>
</div>

@endsection