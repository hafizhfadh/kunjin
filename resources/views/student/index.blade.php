@extends('layouts.app')

@section('content')
  <!-- Example DataTables Card-->
  @push('scripts')
    <script>
    $(document).ready(function(){
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
        <a href="{{url('student/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Import excel" ><i class="fa fa-upload"></i></a>
        <a href="{{url('student/create')}}" class="btn btn-primary" data-toggle="tooltip" title="Export excel" ><i class="fa fa-download"></i></a>
      @endguest
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="users">
            <thead>
                <tr>
                    <th>NIPD</th>
                    <th>Student Name</th>
                    <th>Class</th>
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
