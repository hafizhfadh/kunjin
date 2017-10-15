@extends('layouts.app')

@section('content')
  <!-- Example DataTables Card-->
  @push('scripts')
    <script>
    $(document).ready(function(){
      $('#users').DataTable({
          processing: true,
          serverSide: false,
          ajax: '{{ url('resource/departure-data') }}',
          columns: [
              { data: 'letter_number'},
              { data: 'students.name'},
              { data: 'company.company'},
            @guest
              { data: 'departure_date'}
            @else
              { data: 'departure_date'},
              { data: 'action',orderable:false, searchable:false}
            @endguest
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
        <a href="{{url('departure/create')}}" class="btn btn-primary">Add</a>
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
    <div class="card-footer small text-muted">Terakhir diupdate {{$departure->updated_at}}</div>
  </div>
  <!-- End Example Datatable Card-->

@endsection
