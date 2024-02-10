@extends('partials._layout')

@section('content')

@foreach ($offres as $offre)

<div class="card">
    <!-- <img src="../assets/images/products/s4.jpg" class="card-img-top" alt="..."> -->
    <div class="card-body">
        <h5 class="card-title">{{ $offre->name }}</h5>
        <p class="card-text">{{ $offre->description }}</p>
        <a href="{{ route('offres') }}" class="btn btn-primary">Voir l'offre</a>

    </div>
</div>

@endforeach

@endsection