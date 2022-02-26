@extends('Admin.template')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
@section('content')
   
<div class="row">
<div class="col-6 col-md-4">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Input Categories</h4>
        <form action="{{route('category.add')}}" method="get">
            @csrf
            <input type="text" class="form-control" name="name" class="form-control" placeholder="Input Category">
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
        <table class="table table-striped table-bordered data">
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
                    <a href="{{route('category_update',$category['id'])}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{route('category.delete',$category['id'])}}" class="btn btn-danger btn-sm">Hapus</a>
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('.data').DataTable();
            });
        </script>
@endsection

<!-- Button trigger modal -->