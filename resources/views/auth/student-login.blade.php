@extends('layouts.auth')

@section('content')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ config('app.name', 'Laravel') }} - Student Login</div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ route('student.login.submit') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('student') ? ' has-error' : '' }}">
              <label for="id" class="control-label">NIPD</label>
                  <input id="id" type="text" class="form-control" name="id" value="{{ old('id') }}" required autofocus placeholder="NIPD...">

                  @if ($errors->has('id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('id') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label">Password</label>
                  <input id="password" type="password" class="form-control" name="password" required placeholder="Password...">

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
          </div>
          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                  </div>
              </div>
          </div>
          <button type="submit" class="btn btn-block btn-outline-primary">
              Login
          </button>
      </form>
      <div class="text-center">
        <a class="btn btn-link" href="{{ route('register') }}">Register an Account</a>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>
      </div>
    </div>
  </div>
@endsection
