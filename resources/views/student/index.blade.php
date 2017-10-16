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
              { data: 'email'}
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
                    <th>NIPD</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Email</th>
                </tr>
            </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- End Example Datatable Card-->

@endsection
