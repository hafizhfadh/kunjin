<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departure;
use Yajra\DataTables\DataTables;

use App\Student;
use App\Company;

class DepartureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                           return '<a href="" class="btn btn-warning">Edit</a>
                                   <form method="post" action="'.url("departure/".$departures->id).'">
                                      '.csrf_field().'
                                     <input name="_method" type="hidden" value="DELETE">
                                     <button type="submit" class="btn btn-danger">Delete</button>
                                   </form>
                                   ';
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
        $departure = Departure::select('id')->orderBy('id','desc')->first();
        $students = Student::select('id','name')->get();
        $companies  = Company::select('id','company')->get();
        return view('departure.create',compact('departure', 'students', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
          'letter_number' => 'required',
          'student_id' => 'required|exist:students',
          'company_id' => 'required|exist:company',
          'departure_date' => 'required|date'
        ]);

        Departure::create($validate);
        return 'sucsess';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departure = Departure::find($id);
        return view('departure.show', compact('departure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departure = Departure::find($id);
        return view('departure.edit', compact('departure'));
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
        $validate = $this->validate($request, [
          'letter_number' => 'required',
          'student_id' => 'required|exist:students',
          'company_id' => 'required|exist:company',
          'departure_date' => 'required|date'
        ]);
        Departure::where('id', $id)->update($validate);
        return 'sucsess';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departure::find($id)->delete();
        return 'sucsess';
    }
}
