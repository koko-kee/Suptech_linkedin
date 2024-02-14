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
              <img src="../assets/images/logos/logo.png" width="180" alt="">
            </a>

            <p class="text-center text-uppercase fw-bold">Reinitialisation mot de passe</p>
            <form action="{{route('send')}}" method="post">
                @csrf
              <div class="mb-3 row">
                <label for="exampleInputEmail1" class="form-label col-3 align-self-end">Adresse Email</label>
                <input type="email" name="email" class="form-control col" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
               <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" >Envoyer</button>
            </form>

            
            @if(session('error'))

            <div class="modal" tabindex="-1" id="customModal">
              <div class="modal-dialog modal-dialog-center">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Client introuvable!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>{{ session('error') }}</p>
                            
                  </div>
                  <div class="modal-footer">
                    <a href="{{ route('welcome') }}" class="btn btn-primary">oui</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">non</button>
                  </div>
                </div>
              </div>
            </div>

        @endif

        @if(session('failure'))
    <div class="alert alert-danger">
        {{ session('failure') }}
    </div>
        @endif

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
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
