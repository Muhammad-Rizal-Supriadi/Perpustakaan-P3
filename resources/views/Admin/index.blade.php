@extends('layouts.main')

@section('head')
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ url('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Welcome {{ Session::get('employee.name') }}</h3>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card"><div class="card">
    <div class="card-body">
      <h4 class="card-title">Today's Borrow</h4>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Employee</th>
              <th>Member</th>
              <th>Book</th>
              <th>Return Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($borrows as $borrow)
            @if($borrow['borrow_date'] == date('Y-m-d'))
            <tr>
              <td>{{ $borrow['employee']['name'] }}</td>
              <td>{{ $borrow['member']['name'] }}</td>
              <td>{{ $borrow['book']['title'] }}</td>
              <td>{{ $borrow['return_date'] }}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">Number of Borrows</p>
            <p class="fs-30 mb-2">{{ count($borrows) }}</p>
            <p>(All time)</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Book Collection</p>
            <p class="fs-30 mb-2">{{ $count_books }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
        <div class="card card-light-blue">
          <div class="card-body">
            <p class="mb-4">Number of Employees</p>
            <p class="fs-30 mb-2">{{ $count_employees }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 stretch-card transparent">
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">Number of Members</p>
            <p class="fs-30 mb-2">{{ $count_members }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
  <!-- Plugin js for this page -->
  <script src="{{ url('vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ url('vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ url('js/dataTables.select.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ url('js/dashboard.js') }}"></script>
  <script src="{{ url('js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
@endsection