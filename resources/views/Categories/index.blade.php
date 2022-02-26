@extends('layouts.main')
@section('content')
<div class="row">

    <div class="col-6 col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Input Categories</h4>
                <form action="{{route('category.add')}}" method="get">
                    @csrf
                    <input type="text" class="form-control" name="name" class="form-control"
                        placeholder="Input Category">
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>

    <div class="col-12 col-md-8">

        <body>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Categories</h4>
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
                                            Id
                                        </th>
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
                                    @foreach($response as $category)
                                    <tr>
                                        <td class="py-1">
                                            {{$category['id']}}
                                        </td>
                                        <td>
                                            {{$category['name']}}
                                        </td>
                                        <td>
                                            {{$category['created_at']}}
                                        </td>
                                        <td>
                                            <a href="{{route('category_update',$category['id'])}}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{route('category.delete',$category['id'])}}"
                                                class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </div>
</div>
<!-- @include('sweetalert::alert')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) -->

@endsection

<!-- Button trigger modal -->