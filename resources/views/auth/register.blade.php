@extends('partials._layoutAuth')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div
  class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-6 col-xxl-6">
          @if ($errors->any())
              <div class="alert alert-danger mt-5">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <div class="card mb-0">
          <div class="card-body">
            <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="../assets/images/logos/logo.png" width="180" alt="">
            </a>
            <p class="text-center text-uppercase fw-bold">Inscription</p>
            <form action="{{route('register.store')}}" method="post">
                @csrf
              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Nom</label>
                <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Profil</label>
                <input type="file" value="{{old('profil')}}" name="profil" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Date de Naissance</label>
                <input type="date" value="{{old('date_naissance')}}" name="date_naissance" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" value="{{old('email')}}"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
               <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" >Inscription</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
