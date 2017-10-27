<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Letter;
use App\Company;
use App\Student;
use App\Departure;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('letter.index');
    }

    public function data(Datatables $datatables)
    {
      $test = Letter::select(['*']);
      return Datatables::of($test)
                         ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Letter::where('id', $id)->update(['status'=>$request->status]);

        $departure = Departure::find($request->departure_id);
        $student_id= json_decode($departure->student_id);
        $company_id= $departure->company_id;

        Company::where('id', $company_id)->update(['status'=>$request->company_status]);
        if ($request->status == 'Gagal') {
          Student::whereIn('id', $student_id)->update(['status'=>0]);
        }

        return back()->with('success', 'Status berhasil di konfirmasi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
