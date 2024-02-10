@extends('partials._Layout')
@section('content')
<div class="container">
    <h5 class="card-title fw-semibold mb-4">Formulaire competences</h5>
    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
        <div class="card">
        <div class="card-body">
            <form action="{{route('competences.update',$competence->id)}}" method="POST" class="form">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" value="{{$competence->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
           
            <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
            
        </div>
</div>
@endsection