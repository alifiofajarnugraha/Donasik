@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Riwayat Artikel</h1>
    <a href="{{ route('articles.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Artikel</a>

    <div class="row">
        @forelse($articles as $article)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="text-muted">Penulis: {{ $article->author ?? 'Tidak diketahui' }}</p>
                    <p class="text-muted@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Riwayat Artikel</h1>
    <a href="{{ route('articles.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Artikel</a>

    <div class="row">
        @forelse($articles as $article)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="text-muted">Penulis: {{ $article->author ?? 'Tidak diketahui' }}</p>
                    <p class="text-muted">Media: {{ $article->media ?? 'Tidak ada' }}</p>
                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                    <form action="{{ route('articles.restore', $article->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Pulihkan</button>
                    </form>
                    <form action="{{ route('articles.forceDelete', $article->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini secara permanen?')">Hapus Permanen</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">Tidak ada artikel dalam riwayat.</div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $articles->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection">Media: {{ $article->media ?? 'Tidak ada' }}</p>
                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                    <form action="{{ route('articles.restore', $article->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Pulihkan</button>
                    </form>
                    <form action="{{ route('articles.forceDelete', $article->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini secara permanen?')">Hapus Permanen</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">Tidak ada artikel dalam riwayat.</div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $articles->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection