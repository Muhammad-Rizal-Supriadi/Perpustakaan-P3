@extends('layouts.main')
@section('content')
<div class="col-8 col-md-6">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Update Categories</h4>
        <form action="{{ route('categories.update', $category['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="text" class="form-control" name="name" class="form-control" placeholder="Input Category" value="{{ $category['name'] }}">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-warning">Back</a>
        </form>
       
    </div>
    </div>
  </div>
@endsection  