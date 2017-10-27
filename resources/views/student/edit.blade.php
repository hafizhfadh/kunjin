@extends('layouts.app')

@section('content')
  @include('layouts.message')
    <form method="post" action="{{url('student/'.$student->id)}}">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PATCH">
      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">NIPD</label>
          <input type="text" class="form-control" name="nipd" value="{{$student->nipd}}">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Nama</label>
          <input type="text" class="form-control" name="name" value="{{$student->name}}">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">Kelas</label>
          <input type="text" class="form-control" name="class" value="{{$student->class}}">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-5">
          <label for="exampleInputName">email</label>
          <input type="email" class="form-control" name="email" value="{{$student->email}}">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
