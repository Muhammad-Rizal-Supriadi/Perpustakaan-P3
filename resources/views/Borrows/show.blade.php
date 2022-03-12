@extends('layouts.main')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Borrow Detail</h4>
            <table class="mt-2">
                <tr>
                    <th>Member Data</th>
                </tr>
                <tr>
                    <td class="col-sm-3">Name</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['member']['name'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Address</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['member']['address'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Phone</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['member']['phone'] }}</td>
                </tr>
            </table>
            <table class="mt-2">
                <tr>
                    <th>Employee Data</th>
                </tr>
                <tr>
                    <td class="col-sm-3">Name</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['employee']['name'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Phone</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['employee']['phone'] }}</td>
                </tr>
            </table>
            <table class="mt-2">
                <tr>
                    <th>Book Data</th>
                </tr>
                <tr>
                    <td class="col-sm-3">Book Title</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['book']['title'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Description</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['book']['description'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Year</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['book']['year'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Author</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['book']['author'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Quantity</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['book']['qty'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Number of Page</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $borrow['book']['page'] }}</td>
                </tr>
            </table>
            <a href="{{ route('borrows.index') }}" class="btn btn-warning mt-4">Back</a>
        </div>
    </div>
</div>
@endsection