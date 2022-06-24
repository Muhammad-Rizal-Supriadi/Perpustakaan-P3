@extends('Admin.template')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
    <div class="card-body">
        <h4 class="card-title">Update Borrows</h4>
        <form action="{{route('borrows.update',$borrows['id'])}}" method="get">
            @csrf
            <strong>Member</strong>
            <select name="member_id" class="form-control">
                @foreach($response_members as $members)
                <option value="{{$members['id']}}">{{$members['name']}}</option>
                @endforeach
            </select>
            <br>
            <strong>Book</strong>
            <select name="book_id" class="form-control">
                @foreach($response_books as $books)
                <option value="{{$books['id']}}">{{$books['title']}}</option>
                @endforeach
            </select>
            <br>
            <strong>Borrows Date</strong>
            <input type="text"  class="form-control" name="borrow_date" readonly data-date-format="DD MMMM YYYY"  value="2022-02-24">
            <br>
            <strong>Return Date</strong>
            <input type="date"  class="form-control" name="return_date">
            <br>
            <!-- <strong>Status</strong>
             -->
             <input type="text"  class="form-control" name="status" value="true">
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('borrowsIndex')}}" class="btn btn-warning">Back</a>
        </form>
        
    </div>
    </div>
  </div>
@endsection  