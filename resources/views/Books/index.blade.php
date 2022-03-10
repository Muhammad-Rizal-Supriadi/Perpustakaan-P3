@extends('layouts.main')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Books Data</h4>
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
                Title
              </th>
              <th>
                Description
              </th>
              <th>
                Category
              </th>
              <th>
                Author
              </th>
              <th>
                Qty
              </th>
              <th>
                Option
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
            <tr>
              <td>
                {{$book['title']}}
              </td>
              <td>
                {{$book['description']}}
              </td>
              <td>
                {{$book['category']['name']}}
              </td>
              <td>
                {{$book['author']}}
              </td>
              <td bgcolor="yellow">
                {{$book['qty']}}
              </td>
              <td>
                <a href="{{ route('books.show',$book['id']) }}" class="btn btn-primary btn-sm">Detail</a>
                <a href="{{ route('books.edit',$book['id']) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('books.destroy', $book['id']) }}" method="POST" class="d-inline">
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('books.store') }}" method="POST">
          @csrf
          <div>
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
          </div>
          <div>
            <label>Description</label>
            <textarea class="form-control" name="description" placeholder="Description"></textarea>
          </div>
          <div>
            <label>Year</label>
            <select name="year" class="form-control">
              @for($i=date('Y'); $i>=date('Y')-32; $i-=1)
              <option value='{{ $i }}'> {{ $i }} </option>
              @endfor
            </select>
          </div>
          <div>
            <label>Author</label>
            <input type="text" class="form-control" name="author" placeholder="Author">
          </div>
          <div>
            <label>Quantity</label>
            <input type="number" class="form-control" name="qty" placeholder="Quantity">
          </div>
          <div>
            <label>Number of Page</label>
            <input type="number" class="form-control" name="page" placeholder="Number of Page">
          </div>
          <div>
            <label>Category</label>
            <select class="form-control" name="category_id">
              @foreach($categories as $category)
              <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label>Publisher</label>
            <select class="form-control" name="publisher_id">
              @foreach($publishers as $publisher)
              <option value="{{ $publisher['id'] }}">{{ $publisher['name'] }}</option>
              @endforeach
            </select>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection