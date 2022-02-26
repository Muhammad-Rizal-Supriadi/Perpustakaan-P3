@extends('layouts.main')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
    <div class="card-body">
        <h4 class="card-title">Update Members</h4>
        <form action="{{route('members.update',$members['id'])}}" method="get">
            @csrf
            <strong>Name</strong>
            <input type="text" class="form-control" name="name" class="form-control" value="{{$members['name']}}">
            <br>
            <strong>Address</strong>
            <textarea class="form-control" name="address">{{$members['address']}}</textarea>
            <br>
            <strong>Phone</strong>
            <input type="number" class="form-control" name="phone"  value="{{$members['phone']}}">
            <br>
            <strong>Images</strong>
            <input type="file" class="form-control" name="image"  value="{{$members['image']}}">
            <br>
            <strong>Email</strong>
            <input type="email" class="form-control" name="email" class="form-control" value="{{$members['user']['email']}}">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('membersIndex')}}" class="btn btn-warning">Back</a>
        </form>
    </div>
    </div>
  </div>
@endsection  