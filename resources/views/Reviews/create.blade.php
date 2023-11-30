@extends('template.user')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Tambah Review</h1>

            <form action="/reviews" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>

                <div class="form-group">
                    <label for="desc">Deskripsi</label>
                    <textarea class="form-control" id="desc" name="desc" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection