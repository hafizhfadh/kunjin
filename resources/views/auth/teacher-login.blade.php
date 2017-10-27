@extends('layouts.auth')

@section('content')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ config('app.name', 'Laravel') }} - Teacher Login</div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ route('teacher.login.submit') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('teacher') ? ' has-error' : '' }}">
              <label for="nik" class="control-label">NIK</label>
                  <input id="nik" type="text" class="form-control" name="nik" value="{{ old('nik') }}" required autofocus placeholder="NIK...">

                  @if ($errors->has('nik'))
                      <span class="help-block">
                          <strong>{{ $errors->first('nik') }}</strong>
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
