@extends('layouts.auth')

@section('content')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ config('app.name', 'Laravel') }} - Reset Password</div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
          {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label">E-Mail Address</label>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email...">
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label">Password</label>
              <input id="password" type="password" class="form-control" name="password" required>
              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label for="password-confirm" class="control-label">Confirm Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              @if ($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
              @endif
            </div>
          <button type="submit" class="btn btn-block btn-outline-primary">
              Reset Password
          </button>
      </form>
      <div class="text-center">
        <a class="btn btn-link" href="{{ route('register') }}">Register an Account</a>
        <a class="btn btn-link" href="{{ route('login') }}">
            Login Page
        </a>
      </div>
    </div>
  </div>
@endsection
