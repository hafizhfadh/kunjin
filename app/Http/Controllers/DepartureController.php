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
                         ->editColumn('departure_date', function($departures){
                           $date = date('d-m-Y', strtotime($departures->departure_date));
                           return $date;
                         })
                         ->addColumn('action', function($departures){
                           $departure = $departures;
                           return view('form.form_departure', compact('departure'));
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
        $surat = '421.5/'.$cdeparture.'/YSB/SMK.TB/Hubin/Kunjin/2017';
        $students = Student::select('id','name','class')->where('status',0)->get();


        $companies  = Company::select('id','company')->where('status','Belum dikunjungi')->get();
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
              'student_id'    => 'required|max:5',
              'company_id'    => 'required|exists:companies,id',
              'departure_date'=> 'required|date'
          ]);
      $departure = Departure::count('id')+1;
      $surat = '421.5/'.$departure.'/YSB/SMK.TB/Hubin/Kunjin/2017';

      Student::whereIn('id', $request->student_id)->update(['status'=>1]);

      $letter                = new Letter;
      $letter->letter_number = $surat;
      $letter->status    = "Permohonan surat";
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
      $company->status       = 'Sedang dikunjungi';
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
        $letter   = Letter::find($departure->letter_id);

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

      $student_id = json_decode($departure->student_id);
      $student1 = Student::find($student_id);

      $student0 = Student::select('id','name', 'class')->where('status',0)->get();
      $companies  = Company::select('id','company')->where('status','Belum dikunjungi')->get();
      return view('departure.edit', compact('departure', 'student1', 'student0', 'companies'));
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
      $departure = Departure::find($id);
      $student_id = json_decode($departure->student_id);
      Company::where('id', $departure->company_id)->update(['status'=>'Belum dikunjungi']);
      Student::whereIn('id', $student_id)->update(['status'=>0]);

      $input = request()->validate([
              'student_id' => 'required',
              'company_id' => 'required|exists:companies,id',
              'departure_date' => 'required|date'
          ]);

      $departured = Departure::find($id);
      $departured->student_id = json_encode($request->student_id);
      $departured->company_id = $request->company_id;
      $departured->departure_date = $request->departure_date;
      $departured->save();

      Company::where('id', $request->company_id)->update(['status'=>'Sedang dikunjungi']);
      Student::whereIn('id', $request->student_id)->update(['status'=>1]);

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
        $departure = Departure::find($id);
        $student_id = json_decode($departure->student_id);
        Company::where('id', $departure->company_id)->update(['status'=>'Belum dikunjungi']);

        Student::whereIn('id', $student_id)->update(['status'=>0]);
        Departure::find($id)->delete() && Letter::find($id)->delete();
        return 'success';
    }
}
