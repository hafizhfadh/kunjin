@extends('layouts.app')

@section('content')
    <form>
      <div class="form-group">

        <div class="form-row">
          <div class="col-md-5">
            <label for="exampleInputName">Nomor surat</label>
              <p>{{$departure->id}}</p>
          </div>
        </div>

      </div>
      <a class="btn btn-primary" href="login.html">Register</a>
    </form>
@endsection
