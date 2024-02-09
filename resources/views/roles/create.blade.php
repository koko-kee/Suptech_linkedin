@extends('partials._Layout')
@section('content')
<div class="container">
    <form action="{{route('roles.store')}}" class="form col-md-6 m-auto alert alert-primary" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="contol-label">Nom</label>
            <input type="text" class="form-control input-lg" name="nom">
        </div>
        <div class="mb-3">
            <label for="" class="contol-label">Description</label>
            <input type="text" class="form-control input-lg" name="description">
        </div>

        <div class="mb-3">
            <button type="submit" name="envoyer" class="btn btn-success">
                Envoyer
            </button>
        </div>
    </form>
</div>
@endsection