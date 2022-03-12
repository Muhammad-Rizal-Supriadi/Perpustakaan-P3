@extends('layouts.main')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
        <div class="card-body">
            <h4 class="card-title">Update book</h4>
            <form action="{{ route('books.update', $book['id']) }}" method="POST">
                @method('PUT')
                @csrf
                <strong>Title</strong>
                <input type="text" class="form-control" name="title" class="form-control" value="{{ $book['title'] }}"
                    placeholder="Title">
                <br>
                <strong>Description</strong>
                <textarea class="form-control" name="description"
                    placeholder="Description">{{ $book['description'] }}</textarea>
                <br>
                <label>Year</label>
                <select name="year" class="form-control">
                    @for($i=date('Y'); $i>=date('Y')-32; $i-=1)
                    <option value='{{ $i }}' {{ $book['year']==$i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <br>
                <strong>Author</strong>
                <input type="text" class="form-control" name="author" class="form-control" value="{{ $book['author'] }}"
                    placeholder="Author">
                <br>
                <strong>Quantity</strong>
                <input type="number" class="form-control" name="qty" class="form-control" value="{{ $book['qty'] }}"
                    placeholder="Quantity">
                <br>
                <strong>Number of Page</strong>
                <input type="number" class="form-control" name="page" class="form-control" value="{{ $book['page'] }}"
                    placeholder="Number of Page">
                <br>
                <strong>Category</strong>
                <select class="form-control" name="category_id">
                    <option>--Select</option>
                    @foreach($categories as $category)
                    <option value="{{ $category['id'] }}" {{ $book['category_id']==$category['id'] ? 'selected' : '' }}>
                        {{ $category['name'] }}</option>
                    @endforeach
                </select>
                <br>
                <strong>Publisher</strong>
                <select class="form-control" name="publisher_id">
                    <option>--Select</option>
                    @foreach($publishers as $publisher)
                    <option value="{{ $publisher['id'] }}" {{ $book['publisher_id']==$publisher['id'] ? 'selected' : ''
                        }}>{{ $publisher['name'] }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-4">Save</button>
                <a href="{{ route('books.index') }}" class="btn btn-warning mt-4">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection