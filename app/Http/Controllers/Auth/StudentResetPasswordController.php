<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class StudentResetPasswordController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Password Reset Controller
  |--------------------------------------------------------------------------
  |
  | This controller is responsible for handling password reset requests
  | and uses a simple trait to include this behavior. You're free to
  | explore this trait and override any methods you wish to tweak.
  |
  */

  use ResetsPasswords;

  /**
   * Where to redirect users after resetting their password.
   *
   * @var string
   */
  protected $redirectTo = '/';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('guest:student');
  }

  protected function guard()
  {
    return Auth::guard('student');
  }

  protected function broker()
  {
    return Password::broker('students');
  }

  public function showResetForm(Request $request, $token = null)
  {
      return view('auth.passwords.reset-student')->with(
          ['token' => $token, 'email' => $request->email]
      );
  }
}
