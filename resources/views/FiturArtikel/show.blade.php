@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">{{ $article->title }}</h1>

    @if ($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mb-4" alt="{{ $article->title }}">
    @endif

    <p><strong>Penulis:</strong> {{ $article->author ?? 'Tidak diketahui' }}</p>
    <p><strong>Media:</strong> {{ $article->media ?? 'Tidak ada' }}</p>
    <p>{{ $article->content }}</p>

    <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Artikel</a>
</div>
@endsection