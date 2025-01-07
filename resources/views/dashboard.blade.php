@extends('layouts.app')

@section('title', 'Beranda Donasik')

@section('header-title', 'Bantu Mereka yang Membutuhkan')
@section('header-description', 'Gabung bersama kami dalam platform donasi terbaik.')

@section('content')
<div class="container mt-5">
    <div class="row g-4 justify-content-center">
        <!-- Donasi Barang Section -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <div class="icon bg-primary text-white rounded-circle mb-3 mx-auto" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-box-seam fs-4"></i>
                    </div>
                    <h5 class="card-title fw-bold text-primary">Donasi Barang</h5>
                    <p class="card-text text-muted">Kirimkan barang bekas yang layak pakai untuk mereka yang membutuhkan.</p>
                    <a href="{{ url('/donasi') }}" class="btn btn-primary rounded-pill px-4">Donasi Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Galang Dana Section -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <div class="icon bg-success text-white rounded-circle mb-3 mx-auto" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <h5 class="card-title fw-bold text-success">Galang Dana</h5>
                    <p class="card-text text-muted">Mulai kampanye penggalangan dana untuk tujuan mulia Anda.</p>
                    <a href="{{ url('/campaigns') }}" class="btn btn-success rounded-pill px-4">Mulai Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Zakat & Donasi Uang Section -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <div class="icon bg-warning text-white rounded-circle mb-3 mx-auto" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-wallet2 fs-4"></i>
                    </div>
                    <h5 class="card-title fw-bold text-warning">Zakat & Donasi Uang</h5>
                    <p class="card-text text-muted">Sumbangkan uang Anda untuk zakat atau kebutuhan lainnya.</p>
                    <a href="{{ url('/zakat') }}" class="btn btn-warning rounded-pill px-4">Donasi Uang</a>
                </div>
            </div>
        </div>

        <!-- Daftar Volunteer Section -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <div class="icon bg-info text-white rounded-circle mb-3 mx-auto" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-person-plus fs-4"></i>
                    </div>
                    <h5 class="card-title fw-bold text-info">Daftar Volunteer</h5>
                    <p class="card-text text-muted">Bergabunglah sebagai volunteer untuk membantu mereka yang membutuhkan.</p>
                    <a href='volunteer'class="btn btn-info rounded-pill px-4">Daftar Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Artikel Section -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-4">
                    <div class="icon bg-danger text-white rounded-circle mb-3 mx-auto" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-newspaper fs-4"></i>
                    </div>
                    <h5 class="card-title fw-bold text-danger">Artikel Terbaru</h5>
                    <p class="card-text text-muted">Baca artikel terbaru untuk mengetahui lebih banyak tentang donasi dan kemanusiaan.</p>
                    <a href="{{ url('/articles') }}" class="btn btn-danger rounded-pill px-4">Lihat Artikel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
