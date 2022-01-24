<!-- create.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Pulsa
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('pulsa.store') }}">
          <div class="form-group">
              @csrf
              <label for="nomber">Nomor :</label>
              <input type="text" class="form-control" name="nomber"/>
          </div>
          <div class="form-group">
              <label for="provider">Provider :</label>
              <input type="text" class="form-control" name="provider"/>
          </div>
          <div class="form-group">
              <label for="nominal">Nominal :</label>
              <input type="text" class="form-control" name="nominal"/>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
      </form>
  </div>
</div>
@endsection
