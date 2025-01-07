@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Modern Carousel -->
    <div class="card border-0 shadow-sm mb-5">
        <div id="orphanageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="position-relative">
                        <img src="/images/1111.jpg" class="w-100" alt="Panti Asuhan XYZ" style="height: 400px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 end-0 p-4" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <h3 class="text-white fs-2 fw-bold mb-1">Panti Asuhan XYZ</h3>
                            <p class="text-white-50 mb-0">Jl. Contoh No. 123, Kota Bandung</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="position-relative">
                        <img src="/images/donasi1.jpg" class="w-100" alt="Panti Asuhan ABC" style="height: 400px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 end-0 p-4" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <h3 class="text-white fs-2 fw-bold mb-1">Panti Asuhan ABC</h3>
                            <p class="text-white-50 mb-0">Jl. Lain No. 456, Kota Bandung</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#orphanageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#orphanageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 fw-bold mb-0">Data Zakat</h1>
        <a href="{{ route('zakat.create') }}" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus-lg me-2"></i>
            Tambah Data
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Modern Table Section -->
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="fw-semibold">Nama</th>
                        <th class="fw-semibold">Penghasilan</th>
                        <th class="fw-semibold">THR/Bonus</th>
                        <th class="fw-semibold">Utang</th>
                        <th class="fw-semibold">Cicilan</th>
                        <th class="fw-semibold">Zakat</th>
                        <th class="fw-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zakats as $zakat)
                        <tr>
                            <td>{{ $zakat->nama }}</td>
                            <td>Rp {{ number_format($zakat->penghasilan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($zakat->thr_bonus, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($zakat->utang, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($zakat->cicilan, 0, ',', '.') }}</td>
                            <td class="fw-semibold">Rp {{ number_format($zakat->zakat, 0, ',', '.') }}</td>
                            <td>
                                <!-- Action Buttons -->
                                <a href="{{ route('zakat.show', $zakat->id) }}" class="btn btn-outline-info btn-sm me-2">
                                    <i class="bi bi-eye me-2"></i> Lihat
                                </a>

                                @if(!$zakat->is_paid)
                                    <form action="{{ route('zakat.pay', $zakat->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm me-2">
                                            <i class="bi bi-credit-card me-2"></i> Bayar
                                        </button>
                                    </form>
                                @else
                                    <span class="btn btn-outline-secondary btn-sm disabled">
                                        <i class="bi bi-check-lg me-2"></i> Dibayar
                                    </span>
                                @endif

                                <a href="{{ route('zakat.edit', $zakat->id) }}" class="btn btn-outline-warning btn-sm me-2">
                                    <i class="bi bi-pencil me-2"></i> Edit
                                </a>

                                <form action="{{ route('zakat.destroy', $zakat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash me-2"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
@endpush

@endsection
