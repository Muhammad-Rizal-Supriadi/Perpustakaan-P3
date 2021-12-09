@extends('Admin.template')
@section('content')
<body>
<div class="col-lg-12 grid-margin stretch-card">
    
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Buku</h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Create
        </button>
        <br>
        <br>
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
                Year
                </th>
                <th>
                Publisher
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="py-1">
                1
                </td>
                <td>
                Herman Beck
                </td>
                <td>
                $ 77.99
                </td>
                <td>
                $ 77.99
                </td>
                <td>
                May 15, 2015
                </td>
                <td>
                $ 77.99
                </td>
                <td>
                May 15, 2015
                </td>
            </tr>
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
          <form action="" method="post">
              <div>
                <label>Category</label>
                <select class="form-control" >
                    <option>1</option>
                    <option>2</option>
                </select>
              </div>
              <div>
                <label>Publisher</label>
                <select class="form-control" >
                    <option>1</option>
                    <option>2</option>
                </select>
              </div> 
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
                <select name="tahun" class="form-control">
                <option selected="selected">Year</option>
                <?php
                    for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                        echo"<option value='$i'> $i </option>";
                    }
                ?>
                </select>
              </div>                         
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection