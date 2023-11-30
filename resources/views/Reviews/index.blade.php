@extends('template.user')
@section('title')
    Review
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Reviews</h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->category->name }}</td>
                        
                        <td>{{ $review->desc }}</td>
                        <td>Rp. {{ $review->price }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection