@extends('partials._Layout')
@section('content')
<div class="container">
    <h5 class="card-title fw-semibold mb-4">Formulaire Roles</h5>
    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
        <div class="card">
        <div class="card-body">
            <form action="{{route('roles.store')}}" method="POST" class="form">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
        <table class="table table-bordered table-triped">
            <thead>
              <tr>
                
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Action 1</th>
                <th scope="col">Action 2</th>
              </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
              <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->description}}</td>
               <td>
                <a type="button" href="{{route('roles.edit',$role->id)}}" class="btn btn-primary m-1 inline">Edit</a>
                
               </td>
               <td>
                <form action="{{route('roles.destroy',$role->id)}}" method="POST">
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