@extends('layouts.main')
@section('content')
   
<div class="row">
    <div class="col-6 col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Category</h4>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="name" class="form-control"
                        placeholder="Category Name">
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categories Data</h4>
                    <br>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Created
                                    </th>
                                    <th>
                                        Option
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        {{ $category['name'] }}
                                    </td>
                                    <td>
                                        {{ $category['created_at'] }}
                                    </td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category['id']) }}"
                                            class="btn btn-success btn-sm">Edit</a>

                                        <form action="{{ route('categories.destroy', $category['id']) }}" method="POST"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
