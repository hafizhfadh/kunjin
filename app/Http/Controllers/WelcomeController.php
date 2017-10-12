<?php

namespace App\Http\Controllers;

use App\Departure;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WelcomeController extends Controller
{
  public function index()
  {
    return view('welcome');
  }

  public function anyData(Datatables $datatables)
  {
    $test = Departure::with('students', 'company')->select(['*']);
    return Datatables::of($test)
                       ->make(true);
  }
}
