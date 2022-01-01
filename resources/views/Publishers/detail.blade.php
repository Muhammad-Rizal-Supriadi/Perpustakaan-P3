@extends('Admin.template')
@section('content')
<!-- Modal -->

<div class="card" style="margin-left: 50%;margin-top:10%;width:600px;" >
  <div class="card-header" style="background-color:grey;color:ivory">
    Detail Publisher
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <div>
                <table>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Name</td>
                        <td>:</td>
                        <td>{{$publishers['name']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Address</td>
                        <td>:</td>
                        <td>{{$publishers['address']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Phone Number</td>
                        <td>:</td>
                        <td>{{$publishers['phone']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Create At</td>
                        <td>:</td>
                        <td>{{$publishers['created_at']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Updated At</td>
                        <td>:</td>
                        <td>{{$publishers['updated_at']}}</td>
                    </tr>
                </table>
              </div>    
              <br>             
      </div>

    <a href="{{route('publishersIndex')}}" class="btn btn-primary">Back</a>
  </div>
</div>
@endsection