@extends('layouts.main')
@section('content')
<!-- Modal -->

<div class="card" style="margin-left: 50%;margin-top:10%;width:600px;" >
  <div class="card-header" style="background-color:grey;color:ivory">
    Detail Employees
  </div>
  <div class="card-body">
    <h5 class="card-title">Data Employees</h5>
    <div>
                <table>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Name</td>
                        <td>:</td>
                        <td>{{$employees['name']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Address</td>
                        <td>:</td>
                        <td>{{$employees['address']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Phone Number</td>
                        <td>:</td>
                        <td>{{$employees['phone']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Image</td>
                        <td>:</td>
                        <td>{{$employees['image']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Email</td>
                        <td>:</td>
                        <td>{{$employees['user']['email']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Role</td>
                        <td>:</td>
                        <td>{{$employees['user']['role']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Status</td>
                        <td>:</td>
                        <td>
                        <?php 
                            $cek = `{{$employees['user']['verified']}}`;
                            if($cek == 'true'){
                                echo '<p style="background-color: green;width:100px;color:white;border-radius:20px;text-align:center;">Verified</p>';
                            }else{
                                echo '<p style="background-color: red;width:100px;color:white;border-radius:20px;text-align:center;">Not Verified</p>';
                            }
                            ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Create At</td>
                        <td>:</td>
                        <td>{{$employees['created_at']}}</td>
                    </tr>
                    <tr>
                        <td style="text-decoration: bold;width:100px;">Updated At</td>
                        <td>:</td>
                        <td>{{$employees['updated_at']}}</td>
                    </tr>
                </table>
              </div>    
              <br>             
      </div>

    <a href="{{route('employeesIndex')}}" class="btn btn-primary">Back</a>
  </div>
</div>
@endsection