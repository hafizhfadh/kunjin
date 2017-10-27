<?php

namespace App\Http\Controllers;

use Auth;
use App\Letter;
use App\Student;
use App\Teacher;
use App\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pending = Student::select('status')->where('status', 0)->count();
      $depart = Student::select('status')->where('status', 1)->count();
      $availableComp = Company::select('status')->where('status', 'Belum dikunjungi')->count();
      $requestLetter = Letter::select('status')->where('status', 'Permohonan surat')->count();
      return view('dashboard', compact('pending', 'depart', 'availableComp', 'requestLetter'));
    }
}
