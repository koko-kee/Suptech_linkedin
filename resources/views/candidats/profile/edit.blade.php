@extends('partials._layout')

@section('content')

<h5 class="card-title fw-semibold mb-4">MODIFICATION DU PROFIL</h5>   
<div class="card">
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telephone</label>
                <input type="number" class="form-control" id="exampleInputTelephone" aria-describedby="telephoneHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="exampleInputAdresse" aria-describedby="adresseHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="exampleInputDate_naissance" aria-describedby="date_taissanceHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="mail" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
</div>

@endsection
