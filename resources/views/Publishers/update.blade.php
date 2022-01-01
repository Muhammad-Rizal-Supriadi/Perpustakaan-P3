@extends('Admin.template')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
    <div class="card-body">
        <h4 class="card-title">Update Publisher</h4>
        <form action="{{route('publishers.update',$publishers['id'])}}" method="get">
            @csrf
            <strong>Name</strong>
            <input type="text" class="form-control" name="name" class="form-control" placeholder="Input Category" value="{{$publishers['name']}}">
            <br>
            <strong>Address</strong>
            <textarea class="form-control" name="address">{{$publishers['address']}}</textarea>
            <br>
            <strong>Phone</strong>
            <input type="number" class="form-control" name="phone"  value="{{$publishers['phone']}}">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('publishersIndex')}}" class="btn btn-warning">Back</a>
        </form>
    </div>
    </div>
  </div>
@endsection  