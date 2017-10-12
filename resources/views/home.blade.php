@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">My Dashboard</li>
  </ol>
  <!-- End Breadcrumbs-->

  <!-- Icon Cards-->
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-comments"></i>
          </div>
          <div class="mr-5">26 New Messages!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-list"></i>
          </div>
          <div class="mr-5">11 New Tasks!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-shopping-cart"></i>
          </div>
          <div class="mr-5">123 New Orders!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-support"></i>
          </div>
          <div class="mr-5">13 New Tickets!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
  <!-- End Card -->

  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Data Table Example</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </tfoot>
          <tbody>
<<<<<<< HEAD
            @foreach ($employee as $employe)
              <tr>
                <td>
                  @php
                  $i=1; echo $i; $i++;
                  @endphp
                </td>
                <td>{{ $employe->name }}</td>
                <td>{{ $employe->departement->departement_name }}</td>
                <td>{{ $employe->office->outlet_name }}</td>
                <td>{{ $employe->age }}</td>
                <td>{{ $employe->joint }}</td>
                <td>Rp. @php
                  number_format($employe->detailEmployee->salary, 0, ',', '.')
                @endphp</td>
              </tr>
            @endforeach
=======
>>>>>>> e8a8e39f290ba5e127282cc8606d470c6296cc4f
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
  <!-- End Example Datatable Card-->

<<<<<<< HEAD
  <!-- Area Chart Example-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-area-chart"></i> Area Chart Example</div>
    <div class="card-body">
      <canvas id="myAreaChart" width="100%" height="30"></canvas>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <!-- Example Bar Chart Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-8 my-auto">
              <canvas id="myBarChart" width="100" height="50"></canvas>
            </div>
            <div class="col-sm-4 text-center my-auto">
              <div class="h4 mb-0 text-primary">$34,693</div>
              <div class="small text-muted">YTD Revenue</div>
              <hr>
              <div class="h4 mb-0 text-warning">$18,474</div>
              <div class="small text-muted">YTD Expenses</div>
              <hr>
              <div class="h4 mb-0 text-success">$16,219</div>
              <div class="small text-muted">YTD Margin</div>
            </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <div class="col-lg-4">
      <!-- Example Pie Chart Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-pie-chart"></i> Pie Chart Example</div>
        <div class="card-body">
          <canvas id="myPieChart" width="100%" height="100"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <!-- Example Notifications Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bell-o"></i> Feed Example</div>
        <div class="list-group list-group-flush small">
          <a class="list-group-item list-group-item-action" href="#">
            <div class="media">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
              <div class="media-body">
                <strong>David Miller</strong>posted a new article to
                <strong>David Miller Website</strong>.
                <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
              </div>
            </div>
          </a>
          <a class="list-group-item list-group-item-action" href="#">
            <div class="media">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
              <div class="media-body">
                <strong>Samantha King</strong>sent you a new message!
                <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
              </div>
            </div>
          </a>
          <a class="list-group-item list-group-item-action" href="#">
            <div class="media">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
              <div class="media-body">
                <strong>Jeffery Wellings</strong>added a new photo to the album
                <strong>Beach</strong>.
                <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
              </div>
            </div>
          </a>
          <a class="list-group-item list-group-item-action" href="#">
            <div class="media">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
              <div class="media-body">
                <i class="fa fa-code-fork"></i>
                <strong>Monica Dennis</strong>forked the
                <strong>startbootstrap-sb-admin</strong>repository on
                <strong>GitHub</strong>.
                <div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>
              </div>
            </div>
          </a>
          <a class="list-group-item list-group-item-action" href="#">View all activity...</a>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div>
  <!-- End Area Chart Example-->

=======
>>>>>>> e8a8e39f290ba5e127282cc8606d470c6296cc4f
</div>
@endsection
