@extends('Admin.template')
@section('content')
<body>
<div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Publisher</h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Create
        </button>
        <br>
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
                Address
                </th>
                <th>
                Phone
                </th>
                <th>
                Option
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($response as $publishers)    
            <tr>
                <td class="py-1">
                {{$publishers['id']}}
                </td>
                <td>
                {{$publishers['name']}}
                </td>
                <td>
                {{$publishers['address']}}
                </td>
                <td>
                {{$publishers['phone']}}
                </td>
                <td>
                    <a href="{{route('publishers.getById',$publishers['id'])}}" class="btn btn-primary btn-sm">Detail</a>
                    <a href="{{route('publishers_update',$publishers['id'])}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{route('publishers.delete',$publishers['id'])}}" class="btn btn-danger btn-sm">Hapus</a>
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



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Publisher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <form action="{{route('publishers.add')}}" method="get">
          @csrf
              <div>
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
              </div>
              <div>
                <label>Address</label>
                <textarea class="form-control" name="address"></textarea>
              </div>
              <div>
              <label>Phone</label>
                <input type="number" class="form-control" name="phone" placeholder="Phone Number">
              </div>    
              <br>
              <br>   
              <button type="submit" class="btn btn-primary">Save changes</button>                  
          </form>
      </div>
    </div>
  </div>
</div>


@endsection