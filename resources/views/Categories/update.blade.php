@extends('Admin.template')
@section('content')
<div class="col-8 col-md-6">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Update Categories</h4>
        <form action="{{route('category.update',$category['id'])}}" method="get">
            @csrf
            <input type="text" class="form-control" name="name" class="form-control" placeholder="Input Category" value="{{$category['name']}}">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
        </form>
       
    </div>
    </div>
  </div>
@endsection  