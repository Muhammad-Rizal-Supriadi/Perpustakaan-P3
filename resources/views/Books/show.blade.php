@extends('layouts.main')
@section('content')
<div class="col-md-6 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $book['title'] }} Detail</h4>
            <p class="card-description">{{ $book['description'] }}</p>
            <table>
                <tr>
                    <td class="col-sm-3">Year</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $book['year'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Author</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $book['author'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Quantity</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $book['qty'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Page</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $book['page'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Category</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $book['category']['name'] }}</td>
                </tr>
                <td class="col-sm-3">Publisher</td>
                <td class="col-sm-1">:</td>
                <td class="col-sm-8">{{ $book['publisher']['name'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Created At</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $book['created_at'] }}</td>
                </tr>
                <tr>
                    <td class="col-sm-3">Updated At</td>
                    <td class="col-sm-1">:</td>
                    <td class="col-sm-8">{{ $book['updated_at'] }}</td>
                </tr>
            </table>
            <a href="{{route('books.index')}}" class="btn btn-warning mt-4">Back</a>
        </div>
    </div>
</div>
@endsection