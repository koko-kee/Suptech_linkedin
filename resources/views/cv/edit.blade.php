@extends('partials._Layout')
@section('content')
<div class="container">
    <h5 class="card-title fw-semibold mb-4">Modification du CV</h5>
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
            <form action="{{route('user.cv.update',$cv->id)}}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">CV</label>
                <input type="file" value="{{$cv->cv}}" name="cv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
            </form>

        </div>
</div>
@endsection
