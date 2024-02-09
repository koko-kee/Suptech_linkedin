@extends('partials._layoutAuth')

@section('content')

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-5">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center text-uppercase">Creer une entreprise</p>
                                <form>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nom Entreprise</label>
                                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" name="logo" class="form-control" id="logo" name="logo">
                                    </div>
                                    <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Enregistrer</a>
>>>>>>> 95dd4e164c2c741a45374c0184e96de918dcf933
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
