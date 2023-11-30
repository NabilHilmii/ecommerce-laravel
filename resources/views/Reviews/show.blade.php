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
            <h1>{{ $review->name }}</h1>

            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/images/' . $review->image) }}" alt="{{ $review->name }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>0
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $review->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp. {{ $review->price }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $review->desc }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection