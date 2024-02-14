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
            <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="../assets/images/logos/logo.png" width="180" alt="">
            </a>
            <p class="text-center text-uppercase fw-bold">NOUVEAU MOT DE PASSE</p>
            <form action="{{route('resetCompleted')}}" method="post">
                @csrf  
              
                <div class="mb-3 row">
                  <label class="form-label col-4 align-self-start text-center">@</label>
                  <p class="h6 col "><strong>{{ Session::get('resetEmail') }}</strong></p>
                  <input type="text" name="email" class="form-control col" id="email" value="{{ Session::get('resetEmail') }}" readonly style="border: none; background-color: transparent; font-weight: bold; display:none">
                </div> 
                <div class="mb-4 row">
                  <label for="password" class="form-label col-4 align-self-end text-center">Nouveau mot de passe</label>
                  <input type="password" name="password" class="form-control col" id="password">
                </div>
                <div class="mb-4 row">
                  <label for="password_confirmation" class="form-label col-4 align-self-center text-center">Confirmer le mot de passe</label>
                  <input type="password" name="password_confirmation" class="form-control col" id="password_confirmation">
                </div>
          

              <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" >soumettre</button>
            </form>

            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            @if(session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
            @endif

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
