@extends('layouts.main')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Publishers Data</h4>
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
        <table class="table table-striped table-bordered data">
          <thead>
            <tr>
              <th>
                Name
              </th>
              <th>
                Address
              </th>
              <th>
                Phone
              </th>
              <th>
                Option
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($publishers as $publisher)
            <tr>
              <td>
                {{$publisher['name']}}
              </td>
              <td>
                {{$publisher['address']}}
              </td>
              <td>
                {{$publisher['phone']}}
              </td>
              <td>
                <a href="{{ route('publishers.show',$publisher['id']) }}" class="btn btn-primary btn-sm">Detail</a>
                <a href="{{ route('publishers.edit',$publisher['id']) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('publishers.destroy', $publisher['id']) }}" method="POST"
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



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Publisher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('publishers.store') }}" method="POST">
          @csrf
          <div>
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
          <div>
            <label>Address</label>
            <textarea class="form-control" name="address" placeholder="Address"></textarea>
          </div>
          <div>
            <label>Phone Number</label>
            <input type="number" class="form-control" name="phone" placeholder="Phone Number">
          </div>
          <br>
          <br>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection