@extends('partials._layoutAuth')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div
  class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-6 col-xxl-6">
        <div class="card mb-0">
          <div class="card-body">
            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
            </a>
{{--              {{session('type')}}--}}
            <p class="text-center text-uppercase fw-bold">Inscription</p>
            <form action="{{route('register.store')}}" method="post">
                @csrf
              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Date de Naissance</label>
                <input type="date" name="date_naissance" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
               <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" >Inscription</button>
              <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                <a class="text-primary fw-bold ms-2" href="{{route('login')}}">Sign In</a>
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
