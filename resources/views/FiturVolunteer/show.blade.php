@extends('layouts.app')

@section('title', 'Daftar Volunteer')

@section('content')
<div class="container mt-5">
    <h2 class="mt-5">Daftar Semua Volunteer</h2>
    <div class="row">
        @forelse($volunteers as $vol)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $vol->name }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $vol->email }}</p>
                        <p class="card-text"><strong>Telepon:</strong> {{ $vol->phone }}</p>
                        <p class="card-text"><strong>Keahlian:</strong> {{ $vol->skills }}</p>
                        <div class="d-flex justify-content-between">
                            <!-- Tombol Edit -->
                            <a href="{{ route('volunteer.edit', $vol->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('volunteer.destroy', $vol->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus volunteer ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">Belum ada volunteer yang terdaftar.</div>
            </div>
        @endforelse
    </div>

    <a href="{{ route('volunteer.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection