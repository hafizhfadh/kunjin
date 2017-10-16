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
              { data: 'letter.letter_number'},
              { data: 'students.name'},
              { data: 'company.company'},
              @if (Auth::guest())
              { data: 'departure_date'}
              @elseif (Auth::guard('admin'))
              { data: 'departure_date'},
              { data: 'action',orderable:false, searchable:false}
              @else
              // User
              @endif
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
                    <th>No surat</th>
                    <th>Nama siswa</th>
                    <th>Nama perusahaan</th>
                    <th>Tanggal berangkat</th>
                    <th>Status</th>
                  @guest

                  @else
                    <th>Aksi</th>
                  @endguest
                </tr>
            </thead>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">
      @if (!empty($departure->updated_at))
        Terakhir diupdate {{$departure->updated_at}}
    </div>
      @endif
  </div>
  <!-- End Example Datatable Card-->

@endsection
