@extends('layouts.app')

@section('content')
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Data Table Example</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="users">
            <thead>
                <tr>
                  @guest
                    <th>Id</th>
                    <th>Letter Number</th>
                    <th>Student Name</th>
                    <th>Company Name</th>
                    <th>Departure Date</th>
                  @else
                    <th>Id</th>
                    <th>Letter Number</th>
                    <th>Student Name</th>
                    <th>Company Name</th>
                    <th>Departure Date</th>
                    <th>Action</th>
                  @endguest
                </tr>
            </thead>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
  <!-- End Example Datatable Card-->
@endsection
