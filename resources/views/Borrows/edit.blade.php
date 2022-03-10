@extends('layouts.main')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
        <div class="card-body">
            <h4 class="card-title">Update Borrow</h4>
            <form action="{{ route('borrows.update',$borrow['id']) }}" method="POST">
                @method('PUT')
                @csrf
                <strong>Member</strong>
                <select name="member_id" class="form-control">
                    @foreach($members as $member)
                    <option value="{{ $member['id'] }}" {{ $member['id']==$borrow['member_id'] ? 'selected' : '' }}>{{
                        $member['name'] }}</option>
                    @endforeach
                </select>
                <br>
                <strong>Book</strong>
                <select name="book_id" class="form-control">
                    @foreach($books as $book)
                    <option value="{{ $book['id'] }}" {{ $book['id']==$borrow['book_id'] ? 'selected' : '' }}>{{
                        $book['title'] }}</option>
                    @endforeach
                </select>
                <br>
                <strong>Borrow Date</strong>
                <input type="date" class="form-control" name="borrow_date" readonly data-date-format="DD MM YYYY"
                    value="{{ $borrow['borrow_date'] }}">
                <br>
                <strong>Return Date</strong>
                <input type="date" class="form-control" name="return_date" data-date-format="DD MM YYYY"
                    value="{{ $borrow['return_date'] }}">
                <br>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('borrows.index') }}" class="btn btn-warning">Back</a>
            </form>

        </div>
    </div>
</div>
@endsection