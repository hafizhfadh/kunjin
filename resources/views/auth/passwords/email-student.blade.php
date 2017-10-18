@extends('layouts.auth')

@section('content')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ config('app.name', 'Laravel') }} - Reset Password</div>
    <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <form class="form-horizontal" method="POST" action="{{ route('student.password.email') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label">E-Mail Address</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email...">

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
          </div>
          <button type="submit" class="btn btn-block btn-outline-primary">
              Send Password Reset Link
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
