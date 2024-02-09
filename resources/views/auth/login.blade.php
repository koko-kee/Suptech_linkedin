@extends('partials._layoutAuth')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div
  class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-6 col-xxl-3">
          @if(session('success'))
              <div class="alert alert-success" role="alert">
                  {{session('success')}}
              </div>
          @endif
        <div class="card mb-0">
          <div class="card-body">
            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="../assets/images/logos/logo.png" width="180" alt="">
            </a>
            <p class="text-center text-uppercase">Connexion</p>
            <form>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</a>
              <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                <a class="text-primary fw-bold ms-2" href="{{route('welcome')}}">Sign In</a>
              </div>
              <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">Password forgotten?</p>
                <a class="text-primary fw-bold ms-2" href="{{route('forget')}}">Click here</a>
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
