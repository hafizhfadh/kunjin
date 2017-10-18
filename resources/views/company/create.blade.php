@extends('layouts.app')

@section('content')
  @include('layouts.message')
    <form method="post" action="{{url('company')}}">
      {{ csrf_field() }}
      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Perusahaan</label>
          <input type="text" class="form-control" name="company">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Alamat</label>
          <input type="text" class="form-control" name="address">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Kontak</label>
          <input type="text" class="form-control" name="contact">
        </div>
      </div>

      {{-- <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">email</label>
          <input type="email" class="form-control" name="email">
        </div>
      </div> --}}

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
