@extends('partials._layout')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div
  class="">
  <div class="d-flex align-items-center justify-content-center w-100">
    @if (Session('succes'))
        
    @endif
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-6 col-xxl-3">
        <div class="card mb-0">
          <div class="card-body">
            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="{{asset('./assets/images/logos/dark-logo.svg')}}" width="180" alt="">
            </a>
            <p class="text-center mb-5">Your Social Campaigns</p>
            <form  class="form-group" action="{{route('entreprise.offre.store')}}" method="POST">
              @csrf
              <div class="mb-5">
                <label for="exampleInputEmail1" class="form-label">Libelle de l'offre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="libelle">
                @error('libelle')
                    <span class="text-danger">{{$message}}</span>
                @enderror
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
      </div>
    </div>
  </div>
</div>
</div>
@endsection