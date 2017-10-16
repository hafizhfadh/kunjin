@extends('layouts.app')

@section('content')
  @include('layouts.message')
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Detail keberangkatan
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
          <div class="card-header">
            <i class="fa fa-table"></i> Data murid
          </div>
          <div class="card-body">
            <div class="row">
              @foreach ($students as $s)
                <div class="col-md-6">
                  <table class="table table-responsive">
                    <tr>
                      <td>NIPD:</td>
                      <td>{{$s->nipd}}</td>
                    </tr>
                    <tr>
                      <td>Nama:</td>
                      <td>{{$s->name}}</td>
                    </tr>
                    <tr>
                      <td>Kelas:</td>
                      <td>{{$s->class}}</td>
                    </tr>
                    <tr>
                      <td>Email:</td>
                      <td>
                        @if(strlen($s->email)>25)
                          {{substr($s->email,0,25)}}...
                        @else
                          {{$s->email}}
                        @endif
                      </td>
                    </tr>
                  </table>
                  <br>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-header">
            <i class="fa fa-table"></i> Data perusahaan
          </div>
          <div class="card-body">
            <table class="table table-responsive">
              <tr>
                <td>Perusahaan</td>
                <td>{{$company->company}}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{$company->address}}</td>
              </tr>
              <tr>
                <td>Kontak</td>
                <td>{{$company->contact}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
