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
              { data: 'company_pic'}
          ]
      });
    });
    </script>
  @endpush
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Keberangkatan
      @guest
      @else
        <a href="{{url('student/create')}}" class="btn btn-primary">Add</a>
      @endguest
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="users">
            <thead>
                <tr>
                    <th>Nomor surat</th>
                    <th>Nama siswa</th>
                    <th>Nama perusahaan</th>
                    <th>Tanggal berangkat</th>
                  @guest

                  @else
                    <th>Aksi</th>
                  @endguest
                </tr>
            </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- End Example Datatable Card-->

@endsection
