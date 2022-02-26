@extends('layouts.main')
@section('content')
<!-- Modal -->

<div class="card" style="margin-left: 50%;margin-top:10%;width:600px;" >
  <div class="card-header" style="background-color:grey;color:ivory">
    Detail Books
  </div>
  <div class="card-body">
    <h5 class="card-title">Data Books</h5>
    <div>
                <table>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Title</td>
                        <td>:</td>
                        <td>{{$books['title']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Description</td>
                        <td>:</td>
                        <td>{{$books['description']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Year</td>
                        <td>:</td>
                        <td>{{$books['year']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Author</td>
                        <td>:</td>
                        <td>{{$books['author']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Qty</td>
                        <td>:</td>
                        <td>{{$books['qty']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Page</td>
                        <td>:</td>
                        <td>{{$books['page']}}</td>
                    </tr>
                    <tr>
                    <td style="text-decoration: bold;width:100px;">Category</td>
                        <td>:</td>
                        <td>{{$books['category']['name']}}</td>
                    </tr>
                    <td style="text-decoration: bold;width:100px;">Publisher</td>
                        <td>:</td>
                        <td>{{$books['publisher']['name']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Create At</td>
                        <td>:</td>
                        <td>{{$books['created_at']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Updated At</td>
                        <td>:</td>
                        <td>{{$books['updated_at']}}</td>
                    </tr>
                </table>
              </div>    
              <br>             
      </div>

    <a href="{{route('booksIndex')}}" class="btn btn-primary">Back</a>
  </div>
</div>
@endsection