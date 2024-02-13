@extends('partials._layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
                <div class="card">
                  <img src="{{asset('orange.png')}}" class="" width="px" alt="...">
                </div>
                <div class="text-secondary fs-4">
                    <p>Claye RSX</p>
                </div>
                <div>
                   <a href="{{url('entreprise/profil/edit/{9}')}}" class="btn btn-primary w-100 p-1 fs-4 mb-4 rounded-2 fw-bold">Editer</a>
                </div>
        </div>
        <div class="col-md-7">
            <div class="bg-primary w-100 py-14 fs-4 mb-4 rounded-2">
                <h3 class=" offset-4 text-white">Liste des offres</h3>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card p-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non, libero nam quas at
                            que perferendis iure quisquam debitis maior
                            es maxime?
                        </p>
                        <a href="#" class="btn btn-dark">Voir l'offre</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non, libero nam quas at
                            que perferendis iure quisquam debitis maior
                            es maxime?
                        </p>
                        <a href="#" class="btn btn-dark">Voir l'offre</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non, libero nam quas at
                            que perferendis iure quisquam debitis maior
                            es maxime?
                        </p>
                        <a href="#" class="btn btn-dark">Voir l'offre</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card p-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non, libero nam quas at
                            que perferendis iure quisquam debitis maior
                            es maxime?
                        </p>
                        <a href="#" class="btn btn-dark">Voir l'offre</a>
                    </div>
                </div> 
                {{--<div class="col-4 ">
                    <div class="card p-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non, libero nam quas at
                            que perferendis iure quisquam debitis maior
                            es maxime?
                        </p>
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="card p-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non, libero nam quas at
                            que perferendis iure quisquam debitis maior
                            es maxime?
                        </p>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="text-center">
            <p>Statistiques des differentes candidatures durant l'année</p>
        </div>
    </div>
</div>

@endsection