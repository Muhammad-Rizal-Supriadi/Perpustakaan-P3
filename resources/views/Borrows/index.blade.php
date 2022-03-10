@extends('layouts.main')
@section('content')
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
        <table class="table table-striped table-bordered data">
            <thead>  
            <tr>
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
              @foreach($borrows as $borrow)
                <tr>
                    <td>{{ $borrow['employee']['name'] }}</td>
                    <td>{{ $borrow['member']['name'] }}</td>
                    <td>{{ $borrow['book']['title'] }}</td>
                    <td>{{ $borrow['borrow_date'] }}</td>
                    <td>{{ $borrow['return_date'] }}</td>
                    <td>
                        <a href="{{ route('borrows.show', $borrow['id']) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('borrows.edit', $borrow['id']) }}" class="btn btn-success btn-sm">Edit</a>
                
                        <form action="{{ route('borrows.destroy', $borrow['id']) }}" method="POST"
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Borrow</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('borrows.store') }}" method="POST">
            @csrf
              <div>
                <label>Member</label>
                <select name="member_id" class="form-control">
                    @foreach($members as $member)
                    <option value="{{ $member['id'] }}">{{ $member['name'] }}</option>
                    @endforeach
                </select>
              </div>
              <div>
                <label>Title Books</label>
                <select name="book_id" class="form-control">
                    @foreach($books as $book)
                    <option value="{{ $book['id'] }}">{{ $book['title'] }}</option>
                    @endforeach
                </select>
              </div>
              <div>
                <label>Borrow Date</label>
                <input type="date"  class="form-control" name="borrow_date" readonly data-date-format="DD MMMM YYYY"  value="{{ date("Y-m-d") }}">
              </div>
              <div>
                <label>Return Date</label>
                <input type="date"  class="form-control" name="return_date">
              </div>
              <br>  
              <button type="submit" class="btn btn-primary">Save</button>            
          </form>
      </div>
    </div>
  </div>
</div>
@endsection