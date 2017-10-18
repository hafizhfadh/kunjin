<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

use App\Departure;
use App\Student;
use App\Company;
use App\Letter;

class DepartureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departure = Departure::select('updated_at')->orderBy('updated_at','desc')->first();
        return view('departure.index', compact('departure'));
    }

    public function data(Datatables $datatables)
    {
      $test = Departure::with('company', 'letter')->select(['*']);
      return Datatables::of($test)
                         ->editColumn('students.name', function($departures){
                             $id = json_decode($departures->student_id);
                             $students = Student::find($id);
                             foreach ($students as $s) {
                               $stud[] = $s->name;
                             }
                             return $stud;
                         })
                         ->editColumn('letter.status', function ($data) {
                           $departure = $data;
                           return view('layouts.status', compact('departure'));
                        })
                         ->editColumn('departure_date', function($departures){
                           $date = date('d-m-Y', strtotime($departures->departure_date));
                           return $date;
                         })
                         ->addColumn('action', function($departures){
                           $departure = $departures;
                           return view('layouts.form', compact('departure'));
                         })
                         ->rawColumns(['action'])
                         ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departures = Departure::all();
        $result ="";
        if (count($departures) > 0) {
          foreach($departures as $d){
            $student_id[] = json_decode($d->student_id);
          }
          $result = array();
          foreach ($student_id as $array) {
              $result = array_merge($result, $array);
          }
        }
        //return $result;
        $departure = Departure::select('company_id','student_id')->get();

        $cdeparture = Departure::count('id')+1;
        $surat = '2017/Hubin/Kunjin/Smk.tb/'.$cdeparture;
        $students = Student::select('id','name','class')->get();


        $companies  = Company::select('id','company')->get();
        return view('departure.create',compact('departure', 'students', 'result', 'companies', 'surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = request()->validate([
              'letter_id'     => 'required',
              'letter_number' => 'required',
              'status'        => 'required',
              'student_id'    => 'required|max:5',
              'company_id'    => 'required|exists:companies,id',
              'departure_date'=> 'required|date'
          ]);
      $departure = Departure::count('id')+1;
      $surat = '2017/Hubin/Kunjin/Smk.tb/'.$departure;

      $letter                = new Letter;
      $letter->letter_number = $surat;
      $letter->status        = "Permohonan surat";
      $letter->save();

      $letter_id = $letter->id;

      $depart                = new Departure;
      $depart->id            = $letter_id;
      $depart->letter_id     = $letter_id;
      $depart->student_id    = json_encode($request->student_id);
      $depart->company_id    = $request->company_id;
      $depart->departure_date= $request->departure_date;
      $depart->save();

      $company               = Company::find($request->company_id);
      $company->status       = 'Sudah dikunjungi';
      $company->save();

      return back()->with('success', 'Keberangkatan berhasil dibuat.');
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

        $student_id = json_decode($departure->student_id);
        $students = Student::find($student_id);

        $company  = Company::find($departure->company_id);
        $letter   = Company::select('letter_number')->where('id', $departure->letter_id);
        return view('departure.show', compact('departure', 'students', 'company', 'letter'));
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

        $id = json_decode($departure->student_id);
        $students = Student::find($id);
        foreach ($students as $s) {
          $stud[] = $s->name;
        }

        $studentss = Student::select('id','name', 'class')->get();
        $companies  = Company::select('id','company')->get();
        return view('departure.edit', compact('departure', 'studentss', 'companies', 'stud'));
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
      $input = request()->validate([
              'student_id' => 'required',
              'company_id' => 'required|exists:companies,id',
              'departure_date' => 'required|date'
          ]);
      $request['student_id'] = json_encode($request['student_id']);
      $input = request()->except(['_token', '_method']);
      $departure = Departure::where('id', $id)->update($input);;

      return back()->with('success', 'Keberangkatan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departure::find($id)->delete() && Letter::find($id)->delete();
        return 'hehe';
    }
}
