@extends('partials._layout')
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
                  <img src="{{asset('./assets/images/logos/dark-logo.svg')}}" width="180" alt="">
                </a>
                <p class="text-center mb-4">Your Social Campaigns</p>
                <form>
                  <div class="mb-5">
                    <label for="exampleInputEmail1" class="form-label">Logo de l'entreprise</label>
                    <input type="file" name="logoEntreprise" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Nom de l'entreprise</label>
                    <input type="text" name="nomEntreprise" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                  </div>
                  <div class="mt-3 form-group">
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Editer</button>
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