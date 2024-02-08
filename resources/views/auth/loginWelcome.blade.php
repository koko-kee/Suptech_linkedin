@extends('partials._layoutAuth')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div
  class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-6 col-xxl-3">
        <div class="card mb-0">
          <div class="card-body">
            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
            </a>
            <p class="text-center text-capitalize fw-bold">Qui etes vous?</p>
            <div class="row">
                <a href="{{route('')}}" class="btn btn-info fw-bold mb-4">Candidat</a>
                <a href="{{route('')}}" class="btn btn-primary fw-bold mb-4">Entreprise</a>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection