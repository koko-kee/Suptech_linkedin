@extends('partials._Layout')
@section('content')
<div class="container">
    <h5 class="card-title fw-semibold mb-4">Gestion de Mon CV</h5>
    <form class="d-flex mb-5" >
        <input class="form-control me-2" type="search" placeholder="Rechercher une cv.." aria-label="Search" wire:model.live='search'>
    </form>
    <h5 class="card-title fw-bold mb-4">Ajouter un Fichier</h5>
  <form id="upload" method="post" action="{{route('user.cv.store')}}" is="auto-submit" enctype="multipart/form-data">
      @csrf
     <label for="file-upload">
         <img style="width: 100px" src="{{asset('image/add-file.png')}}">
     </label>
      <input id="file-upload" type="file" name="CV"  style="display:none;" onchange="submitForm()">
  </form>
     <hr>
   <div class="d-flex flex-wrap">
       @foreach($cv as $cv)
           <div class="mt-5">
               <img style="width:20px;margin-left:100px" src="{{asset('image/points.png')}}" data-bs-toggle="dropdown">
               <ul class="dropdown-menu">
                   <li>
                       <a class="dropdown-item" href="{{route('user.cv.download',$cv->id)}}">
                           <img style="width:15px;height: 15px" src="{{asset('image/telecharger.png')}}">
                             Telecharger
                       </a>
                   </li>
                   <li>
                       <a class="dropdown-item" href="#">Afficher</a>
                   </li>
                   <li>
                       <a class="dropdown-item" href="#">
                           <img style="width:20px;height: 20px" src="{{asset('image/supprimer.png')}}">
                             Supprimer

                       </a>
                   </li>
                   <li>
                       <a class="dropdown-item" href="#">
                           <img style="width:20px;height:20px" src="{{asset('image/bouton-modifier.png')}}">
                             Editer
                       </a>
                   </li>
               </ul>
               <div class="p-3">
                   <a href="#">
                       <img style="width:100px;margin-left:5px" src="{{asset('image/pdf.png')}}">
                   </a>
               </div>
               <p class="text-center fw-bold mt-2">{{$cv->libelle}}</p>
           </div>
       @endforeach
   </div>




</div>
{{--<div class="container">--}}
{{--    <h5 class="card-title fw-semibold mb-4">Mom CV</h5>--}}
{{--    @if ($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--             @endif--}}
{{--              @if(session('success'))--}}
{{--              <div class="alert alert-success" role="alert">--}}
{{--                  {{session('success')}}--}}
{{--              </div>--}}
{{--          @endif--}}

{{--        <div class="card">--}}

{{--        <div class="card-body">--}}
{{--            <form action="{{route('user.cv.store')}}" method="POST" class="form" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <div class="mb-3">--}}
{{--                <label for="exampleInputEmail1" class="form-label">Votre CV</label>--}}
{{--                <input type="file" name="cv" class="form-control" id="monCv" aria-describedby="emailHelp">--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--            </form>--}}

{{--        </div>--}}
{{--        <table class="table table-bordered table-triped">--}}
{{--            <thead>--}}
{{--              <tr>--}}

{{--                <th scope="col">CV</th>--}}
{{--                <th scope="col">Action 1</th>--}}
{{--                <th scope="col">Action 2</th>--}}
{{--                <th scope="col">Action 3</th>--}}
{{--              </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--                @foreach($cv as $cv)--}}
{{--              <tr>--}}


{{--                <td><p>CV numero {{$cv->id}} </p></td>--}}
{{--               <td>--}}
{{--                <a type="button" href="{{route('user.cv.edit',$cv->id)}}" class="btn btn-primary m-1 inline">Edit</a>--}}

{{--               </td>--}}
{{--               <td>--}}
{{--                <form action="{{route('user.cv.destroy',$cv->id)}}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit" class="btn btn-danger m-1 inline">Supprimer</button>--}}
{{--                </form>--}}
{{--               </td>--}}
{{--               <td>--}}
{{--                <a type="button" href="{{route('user.cv.download', $cv->id)}}" class="btn btn-primary m-1 incline">Telecharger</a>--}}
{{--               </td>--}}
{{--              </tr>--}}
{{--              @endforeach--}}
{{--            </tbody>--}}
{{--          </table>--}}

{{--</div>--}}
@endsection





