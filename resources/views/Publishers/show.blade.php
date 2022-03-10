@extends('layouts.main')
@section('content')
<div class="col-md-6 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $publisher['name'] }} Detail</h4>
            <table>
                <tr>
                    <td class="col-sm-3">Address</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $publisher['address'] }}</td>
                </tr>
                    <td class="col-sm-3">Phone Number</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $publisher['phone'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Created At</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $publisher['created_at'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Updated At</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $publisher['updated_at'] }}</td>
                </tr>
            </table>
            <a href="{{ route('publishers.index') }}" class="btn btn-warning mt-4">Back</a>
        </div>
    </div>
</div>
@endsection
