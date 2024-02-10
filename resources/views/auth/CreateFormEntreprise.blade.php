@extends('partials._layoutAuth')

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">

            <div class="d-flex align-items-center justify-content-center w-100">

                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-5">
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
                                <p class="text-center text-uppercase">Creer une entreprise</p>
                                <form method="POST" action="{{route('createCompany')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nom Entreprise</label>
                                        <input type="text" value="{{old('name')}}"  name="name" class="form-control" id="name" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Entreprise</label>
                                        <input type="email" value="{{old('email')}}" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" name="logo" class="form-control" id="logo" name="logo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledSelect" class="form-label">Disabled select menu</label>
                                        <select name="statut_id" id="disabledSelect" class="form-select">
                                            @foreach($status as $statut)
                                                <option value="{{$statut->id}}">{{$statut->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Enregistrer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
