@extends('partials._layout')

@section('content')

<h5 class="card-title fw-semibold mb-4">MODIFICATION DU PROFIL</h5>   
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('user.profil.update')}}"> 
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name = "name" value="{{$user->name}}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telephone</label>
                <input type="number" name = "telephone" value="{{$user->telephone}}" class="form-control" id="exampleInputTelephone" aria-describedby="telephoneHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse</label>
                <input type="text" name = "adresse" value="{{$user->adresse}}" class="form-control" id="exampleInputAdresse" aria-describedby="adresseHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date de naissance</label>
                <input type="date" name = "date_naissance"  value="{{$user->date_naissance}}" class="form-control" id="exampleInputDate_naissance" aria-describedby="date_taissanceHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name = "email" value="{{$user->email}}" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
</div>

@endsection
