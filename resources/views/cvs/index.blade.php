@extends('partials._layout')

@section('content')
<h5>Ajouter un CV</h5>
<form>
<div class="mb-5">
  <label for="formFile" class="form-label"></label>
  <input class="form-control" type="file" id="formFile">
</div>
<button type="submit" class="btn btn-primary">Ajouter un CV</button>
</form>


<table class="table" class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>NomCv</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td>Delete</td> 
      
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td>Edit</td> 
      <td></td>
    </tr>
  </tbody>
</table>
@endsection
