@extends('Admin.template')
@section('content')
<body>
<div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Borrows</h4>
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
                Employee
                </th>
                <th>
                Member
                </th>
                <th>
                Book
                </th>
                <th>
                Borrow Date
                </th>
                <th>
                Return Date
                </th>
                <th>
                  Option
                </th>
            </tr>
            </thead>
            <tbody>
              @foreach($response as $borrows)
                <tr>
                    <td>{{$borrows['id']}}</td>
                    <td>{{$borrows['employee']['name']}}</td>
                    <td>{{$borrows['member']['name']}}</td>
                    <td>{{$borrows['book']['title']}}</td>
                    <td>{{$borrows['borrow_date']}}</td>
                    <td>{{$borrows['return_date']}}</td>
                    <td>
                        <a href="{{route('borrows.getById',$borrows['id'])}}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{route('borrows_update',$borrows['id'])}}" class="btn btn-success btn-sm">Edit</a>
                        <a href="{{route('borrows.delete',$borrows['id'])}}" class="btn btn-danger btn-sm">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Create Borrows</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('borrows.add')}}" method="get" enctype="multipart/form-data">
            @csrf
              <div>
                <label>Member</label>
                <select name="member_id" class="form-control">
                    @foreach($response_members as $members)
                    <option value="{{$members['id']}}">{{$members['name']}}</option>
                    @endforeach
                </select>
              </div>
              <div>
                <label>Title Books</label>
                <select name="book_id" class="form-control">
                    @foreach($response_books as $books)
                    <option value="{{$books['id']}}">{{$books['title']}}</option>
                    @endforeach
                </select>
              </div>
              <div>
                <label>Borrow Date</label>
                <input type="text"  class="form-control" name="borrow_date" readonly data-date-format="DD MMMM YYYY"  value="2015-08-09">
              </div>
              <div>
                <label>Return Date</label>
                <input type="date"  class="form-control" name="return_date">
              </div>
              <br>  
              <button type="submit" class="btn btn-primary">Save changes</button>            
          </form>
      </div>
    </div>
  </div>
</div>
@endsection