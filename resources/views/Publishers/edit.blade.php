@extends('layouts.main')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
    <div class="card-body">
        <h4 class="card-title">Update Publisher</h4>
        <form action="{{ route('publishers.update', $publisher['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <strong>Name</strong>
            <input type="text" class="form-control" name="name" class="form-control" placeholder="Name" value="{{ $publisher['name'] }}">
            <br>
            <strong>Address</strong>
            <textarea class="form-control" name="address" placeholder="Address">{{ $publisher['address'] }}</textarea>
            <br>
            <strong>Phone Number</strong>
            <input type="number" class="form-control" name="phone"   placeholder="Phone Number" value="{{ $publisher['phone'] }}">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('publishers.index')}}" class="btn btn-warning">Back</a>
        </form>
    </div>
    </div>
  </div>
@endsection  