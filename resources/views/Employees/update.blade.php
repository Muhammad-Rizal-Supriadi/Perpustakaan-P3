@extends('Admin.template')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
    <div class="card-body">
        <h4 class="card-title">Update Employees</h4>
        <form action="{{route('employees.update',$employees['id'])}}" method="get">
            @csrf
            <strong>Name</strong>
            <input type="text" class="form-control" name="name" class="form-control" value="{{$employees['name']}}">
            <br>
            <strong>Address</strong>
            <textarea class="form-control" name="address">{{$employees['address']}}</textarea>
            <br>
            <strong>Phone</strong>
            <input type="number" class="form-control" name="phone"  value="{{$employees['phone']}}">
            <br>
            <strong>Images</strong>
            <input type="file" class="form-control" name="image"  value="{{$employees['image']}}">
            <br>
            <strong>Email</strong>
            <input type="email" class="form-control" name="email" class="form-control" value="{{$employees['user']['email']}}">
            <br>
            <strong>Password</strong>
            <input type="password" class="form-control" name="password" class="form-control">
            <br>
            <strong>Confirm Password</strong>
            <input type="password" class="form-control" name="password_confirmation" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('employeesIndex')}}" class="btn btn-warning">Back</a>
        </form>
    </div>
    </div>
  </div>
@endsection  