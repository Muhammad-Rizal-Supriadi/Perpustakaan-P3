@extends('Admin.template')
@section('content')
<body>
<div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Employees</h4>
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
                User
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
                @foreach($response as $employees)
                <tr>
                    <td>{{$employees['id']}}</td>
                    <td>{{$employees['name']}}</td>
                    <td>{{$employees['image']}}</td>
                    <td>{{$employees['user']['email']}}</td>
                    <td>{{$employees['user']['role']}}</td>
                    <td>
                        <a href="{{route('employees.getById',$employees['id'])}}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{route('employees_update',$employees['id'])}}" class="btn btn-success btn-sm">Edit</a>
                        <a href="{{route('employees.delete',$employees['id'])}}" class="btn btn-danger btn-sm">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Create Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('employees.add')}}" method="get" enctype="multipart/form-data">
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
                  <label>Images</label>
                  <input type="file" class="form-control" name="image">
              </div>
             
              <div>
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>   
              <div>
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div> 
              <div>
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
              </div>       
              <br>  
              <button type="submit" class="btn btn-primary">Save changes</button>            
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailEmployees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div>
                <table>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Name</td>
                        <td>:</td>
                        <td>{{$employees['name']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Address</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Phone Number</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Create At</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Updated At</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
              </div>    
              <br>
              <br>   
              <button type="submit" class="btn btn-danger btn-sm">Close</button>                  
      </div>
    </div>
  </div>
</div>
@endsection