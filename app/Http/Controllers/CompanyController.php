<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Excel;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data(Datatables $datatables)
    {
      $query = Company::select(['*']);

      return Datatables::of($query)
                        ->addColumn('action', function($data){
                          $data = $data;
                          return view('form.form_company', compact('data'));
                        })
                        ->make(true);
    }

    public function index()
    {
        return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
          'company' => 'required',
          'contact' => 'required',
          'address' => 'required'
        ]);
        Company::create($validate);
        return back()->with('success', 'Data perusahaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
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
      $validate = $this->validate($request,[
        'company' => 'required',
        'contact' => 'required',
        'address' => 'required'
      ]);
      Company::find($id)->update($validate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        return 'success';
    }
    public function exportExcel(Request $request, $type)
    {
        $data = Company::select('company','contact','address','status')->get()->toArray();
        return Excel::create('Data_perusahaan'.date('d-m-Y'), function($excel) use ($data){
          $excel->sheet('data_perusahaan', function($sheet) use ($data){
            $sheet->fromArray($data);
          });
        })->download($type);
    }
    public function importExcel(Request $request)
    {
        if ($request->hasFile('import_file')) {
          $path = $request->file('import_file')->getRealPath();

          $data = Excel::load($path, function($reader){

          })->get();
          if (!empty($data) && $data->count()) {
            foreach($data as $v){
                $insertCompany[] = [
                  'company'=> $v->company,
                  'contact'=> $v->contact,
                  'address'=> $v->address,
                  'status'=> $v->status
                ];
            }
            if(!empty($insertCompany)){
              Company::insertOrUpdate($insertCompany);
              return back()->with('success', 'Import data perusahaan berhasil.');
            }
          }
          return back()->with('errors', 'Tidak ada data, silahkan periksa kembali file anda. ');
        }
        return back()->with('errors', 'Tidak ada file terdeteksi, silahkan input kembali');
    }
}
