@extends('layouts.app')

@section('content')
  <!-- Example DataTables Card-->
  @push('scripts')
    <script>
    $(document).ready(function(){
      $('#users').DataTable({
          processing: true,
          serverSide: false,
          ajax: '{{ url('resource/company-data') }}',
          columns: [
              { data: 'company'},
              { data: 'address'},
              { data: 'contact'},

              @if (Auth::user())
                { data: 'status'},
                { data: 'action'}
              @else
                { data: 'keterangan'}
              @endif

          ]
      });
    });
    </script>
  @endpush
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-company"></i> Perusahaan
      @guest
      @else
        <a href="{{url('company/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Tambah" ><i class="fa fa-plus"></i></a>
        <a href="{{url('company/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Import excel" ><i class="fa fa-upload"></i></a>
        <a href="{{url('company/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Export excel" ><i class="fa fa-download"></i></a>
      @endguest
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="users">
            <thead>
                <tr>
                    <th>Nama perusahaan</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Keterangan</th>
                    @if (Auth::user())
                      <th>Aksi</th>
                    @endif
                </tr>
            </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- End Example Datatable Card-->

@endsection
