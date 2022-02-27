@extends('layouts.main')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
    <div class="card-body">
        <h4 class="card-title">Update Employee</h4>
        <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <strong>Name</strong>
            <input type="text" class="form-control" name="name" class="form-control" placeholder="Name" value="{{$employee['name']}}">
            <br>
            <strong>Address</strong>
            <textarea class="form-control" name="address" placeholder="Address">{{$employee['address']}}</textarea>
            <br>
            <strong>Phone Number</strong>
            <input type="number" class="form-control" name="phone" placeholder="Phone Number" value="{{$employee['phone']}}">
            <br>
            <strong>Email</strong>
            <input type="email" class="form-control" name="email" class="form-control" placeholder="Email" value="{{ $employee['user']['email'] }}">
            <br>
            <strong>Password (optional)</strong>
            <input type="password" class="form-control" name="password" class="form-control" placeholder="Password">
            <br>
            <strong>Confirm Password</strong>
            <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('employees.index') }}" class="btn btn-warning">Back</a>
        </form>
    </div>
    </div>
  </div>
@endsection  