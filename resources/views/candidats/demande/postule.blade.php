@extends('partials._layout')

@section('content')

<h5 class="card-title fw-semibold mb-4">POSTULER </h5>   
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
        <form method="POST" action=" {{route('candidats.postule.store', $id)}}" enctype="multipart/form-data"> 
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">CV</label>
                <input type="file" name = "cv" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
                <!-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            
            <button type="submit" class="btn btn-primary">Postuler</button>
        </form>
   </div>
</div>

@endsection
