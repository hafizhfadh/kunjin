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
              { data: 'company_pic'},
              { data: 'status'}
          ]
      });
    });
    </script>
  @endpush
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-company"></i> Perusahaan
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="users">
            <thead>
                <tr>
                    <th>Companies Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Picture</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- End Example Datatable Card-->

@endsection
