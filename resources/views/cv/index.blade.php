@extends('partials._Layout')
@section('content')
<div class="container">
    <h5 class="card-title fw-semibold mb-4">Mom CV</h5>
    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
              @if(session('success'))
              <div class="alert alert-success" role="alert">
                  {{session('success')}}
              </div>
          @endif

        <div class="card">

        <div class="card-body">
            <form action="{{route('user.cv.store')}}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Votre CV</label>
                <input type="file" name="cv" class="form-control" id="monCv" aria-describedby="emailHelp">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
        <table class="table table-bordered table-triped">
            <thead>
              <tr>
                
                <th scope="col">CV</th>
                <th scope="col">Action 1</th>
                <th scope="col">Action 2</th>
                <th scope="col">Action 3</th>
              </tr>
            </thead>
            <tbody>
                @foreach($cv as $cv)
              <tr>
                
               
                <td><p>CV numero {{$cv->id}} </p></td>
               <td>
                <a type="button" href="{{route('user.cv.edit',$cv->id)}}" class="btn btn-primary m-1 inline">Edit</a>
                
               </td>
               <td>
                <form action="{{route('user.cv.destroy',$cv->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-1 inline">Supprimer</button>
                </form>
               </td>
               <td>
                <a type="button" href="{{route('user.cv.download', $cv->id)}}" class="btn btn-primary m-1 incline">Telecharger</a>
               </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        
</div>
@endsection





