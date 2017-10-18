<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
    }

    public function data(Datatables $datatables)
    {
      $test = Student::select(['*']);
      return Datatables::of($test)
                         ->addColumn('action', function($data){
                           $data = $data;
                           return view('form.form_student', compact('data'));
                         })
                         ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
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
          'nipd' => 'required|numeric',
          'name' => 'required|string',
          'class'=> 'required|string|max:15',
          'email'=> 'required|unique:students,email'
        ]);
        Student::create($input);
        return back()->with('success', 'Data murid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::find($id);
      return view('student.edit', compact('student'));
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
        'nipd' => 'required|numeric',
        'name' => 'required|string',
        'class'=> 'required|string|max:15',
        'email'=> 'required|unique:students,email'
      ]);
      Student::find($id)->update($input);
      return back()->with('success', 'Data murid berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return 'success';
    }
}
