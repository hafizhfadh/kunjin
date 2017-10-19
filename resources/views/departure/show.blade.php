@extends('layouts.app')

@section('content')
  @include('layouts.message')
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Detail keberangkatan
      <a href="#" class="btn btn-secondary" pull-right><i class="fa fa-print"></i></a>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          @php
          $vals = '';
          $valf = '';
          $valsc= '';
          $valfc= '';
          $btval= '';
          if ($departure->letter->status == 'Permohonan surat'){
            $vals = 'Pemrosesan surat';
            $valsc= 'Sudah dikunjungi';

          }elseif($departure->letter->status == 'Pemrosesan surat'){
            $vals = 'Boleh berangkat';
            $valsc= 'Sudah dikunjungi';
          }elseif($departure->letter->status == 'Boleh berangkat'){
            $vals = 'Pengumpulan laporan';
            $valsc= 'Sudah dikunjungi';
            $valfc= 'Belum dikunjungi';
            $valf = 'Gagal';
            $btval= 'Gagal';
          }elseif($departure->letter->status == 'Gagal'){
            $valf = 'Permohonan surat';
            $valfc= 'Belum dikunjungi';
            $btval= 'Permohonan surat lagi';
          }elseif($departure->letter->status == 'Pengumpulan laporan'){
            $vals = 'Selesai';
            $valsc= 'Sudah dikunjungi';
          }
          $forms = '
          <form method="POST" action="'.url('letter/'.$departure->letter_id).'">
            '.csrf_field().'
            <input name="_method" type="hidden" value="PATCH">
            <input type="hidden" name="status" value="'.$vals.'">
            <input type="hidden" name="company_status" value="'.$valsc.'">
            <input type="hidden" name="company_id" value="'.$departure->company_id.'">
            <button type="submit" class="btn btn-success float-md-right">Konfirmasi status <i class="fa fa-check"></i></button>
          </form>
          ';
          $formf = '
          <form method="POST" action="'.url('letter/'.$departure->letter_id).'">
            '.csrf_field().'
            <input name="_method" type="hidden" value="PATCH">
            <input type="hidden" name="status" value="'.$valf.'">
            <input type="hidden" name="company_status" value="'.$valfc.'">
            <input type="hidden" name="company_id" value="'.$departure->company_id.'">
            <button type="submit" class="btn btn-danger float-md-right">'.$btval.' <i class="fa fa-close"></i></button>
          </form>
          ';
          if (!empty($vals) && !empty($valf)) {
            echo $formf;
            echo $forms;
          }elseif(!empty($vals)){
            echo $forms;
          }elseif(!empty($valf)){
            echo $formf;
          }
          @endphp
        </div>
        <div class="col-md-8">
          <div class="card-header">
            <i class="fa fa-table"></i> Data murid
          </div>
          <div class="card-body">
            <p>Status &nbsp;&nbsp;&nbsp;&nbsp;: {{$letter->status}}</p>
            <p>No surat : {{$letter->letter_number}}</p>
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
