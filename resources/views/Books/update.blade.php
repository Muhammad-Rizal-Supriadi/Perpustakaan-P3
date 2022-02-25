@extends('Admin.template')
@section('content')
<div class="col-12 col-md-8" style="position: center;">
    <div class="card" style="position: center;">
    <div class="card-body">
        <h4 class="card-title">Update Books</h4>
        <form action="{{route('books.update', $books['id'])}}" method="get">
            @csrf
            <strong>Title</strong>
            <input type="text" class="form-control" name="title" class="form-control" value="{{$books['title']}}">
            <br>
            <strong>Description</strong>
            <textarea class="form-control" name="description">{{$books['description']}}</textarea>
            <br>
            <label>Year</label>
                <select name="year" class="form-control">
                <option selected="selected">{{$books['year']}}</option>
                <?php
                    for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                        echo"<option value='$i'> $i </option>";
                    }
                ?>
            </select>
            <br>
            <strong>Author</strong>
            <input type="text" class="form-control" name="author" class="form-control" value="{{$books['author']}}">
            <br>
            <strong>Qty</strong>
            <input type="number" class="form-control" name="qty" class="form-control" value="{{$books['qty']}}">
            <br>
            <strong>Author</strong>
            <input type="number" class="form-control" name="page" class="form-control" value="{{$books['page']}}">
            <br>
            <strong>Category</strong>
            <select class="form-control" name="category_id" value="{{$books['category']['name']}}">
                <option>--Select</option>
                @foreach($response_category as $category)
                <option value="{{$category['id']}}">{{$category['name']}}</option>
                @endforeach
            </select>
            <br>
            <strong>Publisher</strong>
            <select class="form-control" name="publisher_id">
                <option>--Select</option>
                @foreach($response_publishers as $publishers)
                <option value="{{$publishers['id']}}">{{$publishers['name']}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('booksIndex')}}" class="btn btn-warning">Back</a>
        </form>
    </div>
    </div>
  </div>
@endsection  