@extends('layouts.main')
@section('content')
<!-- Modal -->

<div class="card" style="margin-left: 50%;margin-top:10%;width:600px;" >
  <div class="card-header" style="background-color:grey;color:ivory">
    Detail Borrows
  </div>
  <div class="card-body">
    <h5 class="card-title">Data Member-Employee</h5>
    <div>
                <table style="width: 800px;">
                    <tr>
                        <td style="text-decoration: bold;width:150px;">Member</td>
                        <td>:</td>
                        <td>{{$borrows['member']['name']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Address Member</td>
                        <td>:</td>
                        <td>{{$borrows['member']['address']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Phone Member</td>
                        <td>:</td>
                        <td>{{$borrows['member']['phone']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Profile Member</td>
                        <td>:</td>
                        <td><img src="{{$borrows['member']['image']}}"></td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Employee</td>
                        <td>:</td>
                        <td>{{$borrows['employee']['name']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Phone Employee</td>
                        <td>:</td>
                        <td>{{$borrows['employee']['phone']}}</td>
                    </tr>
                    <tr>
                    <td style="text-decoration: bold;width:100px;">Profile Employee</td>
                        <td>:</td>
                        <td><img src="{{$borrows['employee']['image']}}"></td>
                    </tr>
                </table>
                <table style="width: 800px;">
                <hr>
                    <p><b>Data books</b></p>
                    <br>
                    <td style="text-decoration: bold;width:100px;">Title</td>
                        <td>:</td>
                        <td>{{$borrows['book']['title']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Description</td>
                        <td>:</td>
                        <td>{{$borrows['book']['description']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Year</td>
                        <td>:</td>
                        <td>{{$borrows['book']['year']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Author</td>
                        <td>:</td>
                        <td>{{$borrows['book']['author']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Qty</td>
                        <td>:</td>
                        <td>{{$borrows['book']['qty']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Page</td>
                        <td>:</td>
                        <td>{{$borrows['book']['page']}}</td>
                    </tr>
                </table>
              </div>    
              <br>             
      </div>

    <a href="{{route('borrowsIndex')}}" class="btn btn-primary">Back</a>
  </div>
</div>
@endsection