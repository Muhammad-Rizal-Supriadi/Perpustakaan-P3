@extends('layouts.main')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $employee['name'] }} Detail</h4>
            <table>
                <tr>
                    <td class="col-sm-3">Address</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $employee['address'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Phone Number</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $employee['phone'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Email</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $employee['user']['email'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Role</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $employee['user']['role'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Status</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">
                        @if ($employee['user']['verified'])
                            <div class="badge badge-success">Verified</div>
                        @else
                        <div class="badge badge-danger">Not Verified</div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="col-sm-3">Created At</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $employee['created_at'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Updated At</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $employee['updated_at'] }}</td>
                </tr>
            </table>
            <a href="{{ route('employees.index') }}" class="btn btn-warning mt-4">Back</a>
        </div>
    </div>
</div>
@endsection