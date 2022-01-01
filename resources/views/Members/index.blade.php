@extends('Admin.template')
@section('content')
<body>
<div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Members</h4>
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

        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
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
                Image
                </th>
                <th>
                User Email
                </th>
                <th>
                Role
                </th>
                <th>
                  Option
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($response as $members)
                <tr>
                    <td>{{$members['id']}}</td>
                    <td>{{$members['name']}}</td>
                    <td>{{$members['image']}}</td>
                    <td>{{$members['user']['email']}}</td>
                    <td>{{$members['user']['role']}}</td>
                    <td>
                        <a href="{{route('members.getById',$members['id'])}}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{route('members_update',$members['id'])}}" class="btn btn-success btn-sm">Edit</a>
                        <a href="{{route('members.delete',$members['id'])}}" class="btn btn-danger btn-sm">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Create Members</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('members.add')}}" method="get">
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
              <div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Input Images</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
              </div>
            <div>
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>   
              <!-- <div>
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div> 
              <div>
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
              </div>       
              <br> -->
              <button type="submit" class="btn btn-primary">Save changes</button>            
          </form>
      </div>
    </div>
  </div>
</div>

@endsection