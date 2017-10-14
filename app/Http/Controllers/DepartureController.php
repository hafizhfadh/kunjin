<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departure;
use Yajra\DataTables\DataTables;

class DepartureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('departure.index');
    }

    public function data(Datatables $datatables)
    {
      $test = Departure::with('students', 'company')->select(['*']);
      return Datatables::of($test)
                         //if admin
                         ->addColumn('action', function($departures){
                           return '<a class="btn btn-warning" href="'.url('departure/'.$departures->id.'/edit').'">Edit</a>
                                  <button class="btn btn-danger" value="{{$departures->id}}">Delete</button>';
                         })
                         ->rawColumns(['action'])
                         //endif
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
        return $id;
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
        //
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
