@extends('Admin.template')
@section('content')
<body>
<div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Books</h4>
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
            @foreach($response as $books)
            <tr>
                <td class="py-1">
                  {{$books['id']}}
                </td>
                <td>
                  {{$books['title']}}
                </td>
                <td>
                  {{$books['description']}}
                </td>
                <td>
                 {{$books['category']['name']}}
                </td>
                <td>
                {{$books['author']}}
                </td>
                <td bgcolor="yellow">
                {{$books['qty']}}
                </td>
                <td>
                    <a href="{{route('books.getById',$books['id'])}}" class="btn btn-primary btn-sm">Detail</a>
                    <a href="{{route('books_update',$books['id'])}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{route('books.delete',$books['id'])}}" class="btn btn-danger btn-sm">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Create Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('books.add')}}" method="get">
            @csrf
              <div>
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title">
              </div>
              <div>
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
              </div>
              <div>
                <label>Year</label>
                <select name="year" class="form-control">
                <option selected="selected">Year</option>
                <?php
                    for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                        echo"<option value='$i'> $i </option>";
                    }
                ?>
                </select>
              </div>      
              <div>
                <label>Author</label>
                <input type="text" class="form-control" name="author" placeholder="Author">
              </div>
              <div>
                <label>Qty</label>
                <input type="number" class="form-control" name="qty" placeholder="Qty">
              </div>
              <div>
                <label>Number of Page</label>
                <input type="number" class="form-control" name="page" placeholder="Number of Page">
              </div>               
              <div>
                <label>Category</label>
                <select class="form-control" name="category_id">
                  @foreach($response_category as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div>
                <label>Publisher</label>
                <select class="form-control" name="publisher_id">
                  @foreach($response_publishers as $publishers)
                    <option value="{{$publishers['id']}}">{{$publishers['name']}}</option>
                  @endforeach
                </select>
              </div>   
              <br>  
              <button type="submit" class="btn btn-primary">Save changes</button>            
          </form>
      </div>
    </div>
  </div>
</div>
@endsection