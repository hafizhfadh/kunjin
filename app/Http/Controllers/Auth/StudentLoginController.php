<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:student', ['except' => ['logout']]);
  }

  public function showLoginForm()
  {
    return view('auth.student-login');
  }

  public function login(Request $request)
  {
    // Validate the form data
    $this->validate($request, [
      'nipd' => 'required|string',
      'password' => 'required|min:6'
    ]);

    // Attempt to log the user in
    if (Auth::guard('student')->attempt(['nipd' => $request->nipd, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('student.index'));
    }
    // if unsuccessful, then redirect back to login form
    return redirect()->back()->withInput($request->only('nipd', 'remember'));
  }

  public function logout()
  {
      Auth::guard('student')->logout();
      return redirect('/');
  }
}
