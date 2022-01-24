@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit pulsa
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
      <form method="post" action="{{ route('pulsa.update', $pulsa->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nomber">Nomor:</label>
              <input type="text" class="form-control" name="nomber" value="{{$pulsa->nomber}}"/>
          </div>
          <div class="form-group">
              <label for="provider">Provider :</label>
              <input type="text" class="form-control" name="provider" value="{{$pulsa->provider}}"/>
          </div>
          <div class="form-group">
              <label for="nominal">Nominal :</label>
              <input type="text" class="form-control" name="nominal" value="{{$pulsa->nominal}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection