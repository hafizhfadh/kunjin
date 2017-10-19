@extends('layouts.app')

@section('content')
  @include('layouts.message')
    <form method="post" action="{{url('company/'.$company->id)}}">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Perusahaan</label>
          <input type="text" class="form-control" name="company" value="{{$company->company}}">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Alamat</label>
          <input type="text" class="form-control" name="address" value="{{$company->address}}">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Kontak</label>
          <input type="text" class="form-control" name="contact" value="{{$company->contact}}">
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
