@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Artikel</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $article->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten Artikel</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $article->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Nama Penulis</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $article->author) }}" placeholder="Masukkan nama penulis">
        </div>
        <div class="mb-3">
            <label for="media" class="form-label">Media</label>
            <input type="text" class="form-control" id="media" name="media" value="{{ old('media', $article->media) }}" placeholder="Masukkan nama media/platform">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar (Opsional)</label>
            @if ($article->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $article->image) }}" class="img-thumbnail" alt="{{ $article->title }}" width="200">
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection