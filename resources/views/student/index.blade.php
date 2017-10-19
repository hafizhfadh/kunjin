@extends('layouts.app')

@section('content')
@include('layouts.modal')
  <!-- Example DataTables Card-->
  @push('scripts')
    <script>
    $(document).ready(function(){
      $('[rel="tooltip"]').tooltip({trigger: "hover"});
      $('#users').DataTable({
          processing: true,
          serverSide: false,
          ajax: '{{ url('resource/student-data') }}',
          columns: [
              { data: 'nipd'},
              { data: 'name'},
              { data: 'class'},
              @if (Auth::user())
                { data: 'email'},
                { data: 'action',orderable:false, searchable:false}
              @else
                { data: 'email'}
              @endif
          ]
      });

    });
    </script>
  @endpush
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-group"></i> Murid
      @guest
      @else
        <a href="{{url('student/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Tambah" ><i class="fa fa-plus"></i></a>
        <button type="button" class="btn btn-primary" rel="tooltip" title="Import excel" data-toggle="modal" data-target="#importStudent"><i class="fa fa-upload" aria-hidden="true"></i></button>
        <a href="{{url('student/exportExcel/xls')}}" class="btn btn-primary" data-toggle="tooltip" title="Export excel" ><i class="fa fa-download"></i></a>
      @endguest
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="users">
            <thead>
                <tr>
                    <th>NIPD</th>
                    <th>Nama murid</th>
                    <th>Kelas</th>
                    <th>Email</th>
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
