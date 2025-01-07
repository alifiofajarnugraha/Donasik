@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Artikel</h1>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Tambah Artikel</a>
        <a href="{{ route('articles.history') }}" class="btn btn-secondary">Riwayat Artikel</a>
    </div>

    <!-- Flash Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('articles.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari artikel..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <!-- Daftar Artikel -->
    <div class="row">
        @forelse($articles as $article)
        <div class="col-md-4">
            <div class="card mb-4">
                @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="text-muted">Penulis: {{ $article->author ?? 'Tidak diketahui' }}</p>
                    <p class="text-muted">Media: {{ $article->media ?? 'Tidak ada' }}</p>
                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">Baca Selengkapnya</a>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">Belum ada artikel yang tersedia.</div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $articles->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection