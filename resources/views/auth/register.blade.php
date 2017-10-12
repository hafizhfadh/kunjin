@extends('layouts.auth')

@section('content')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Register an Account</div>
    <div class="card-body">
      <form method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="control-label">Name</label>
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label">E-Mail Address</label>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
          </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <div class="form-row">
            <div class="col-md-6">
              <label for="password" class="control-label">Password</label>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
            <div class="col-md-6">
              <label for="password-confirm" class="control-label">Confirm Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-block btn-outline-primary">
            Register
        </button>
      </form>
      <div class="text-center">
        <a class="d-block mt-3" href="{{ route('login') }}">Login Page</a>
      </div>
    </div>
  </div>
@endsection
