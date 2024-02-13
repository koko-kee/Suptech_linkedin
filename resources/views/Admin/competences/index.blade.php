@extends('partials._Layout')
@section('content')
<div class="container">
    <h5 class="card-title fw-semibold mb-4">Formulaire Competences</h5>
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
            <form action="{{route('competences.store')}}" method="POST" class="form">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
        <table class="table table-bordered table-triped">
            <thead>
              <tr>
                
                <th scope="col">Nom</th>
                <th scope="col">Action 1</th>
                <th scope="col">Action 2</th>
              </tr>
            </thead>
            <tbody>
                @foreach($competences as $competence)
              <tr>
                
               
                <td>{{$competence->name}}</td>
               <td>
                <a type="button" href="{{route('competences.edit',$competence->id)}}" class="btn btn-primary m-1 inline">Edit</a>
                
               </td>
               <td>
                <form action="{{route('competences.destroy',$competence->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-1 inline">Delete</button>
                </form>
               </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        
</div>
@endsection