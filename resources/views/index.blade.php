@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ route('pulsa.create')}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Tambah Data</button>
                </a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nomor</td>
          <td>Provider</td>
          <td>Nominal</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pulsa as $pulsa)
        <tr>
            <td>{{$pulsa->id}}</td>
            <td>{{$pulsa->nomber}}</td>
            <td>{{$pulsa->provider}}</td>
            <td>{{$pulsa->nominal}}</td>
            <td><a href="{{ route('pulsa.edit',$pulsa->id)}}" class="btn btn-primary">Edit</a>
            
                <a href="{{ route('pulsa.destroy', $pulsa->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection