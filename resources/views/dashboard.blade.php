@extends('layouts.app')

@section('title', 'Beranda Donasik')

@section('header-title', 'Bantu Mereka yang Membutuhkan')
@section('header-description', 'Gabung bersama kami dalam platform donasi terbaik.')

@section('content')
<!-- Hero Section -->
<div class="hero-section position-relative mb-5">
    <div class="hero-image w-100" style="
        height: 500px;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                    url('{{ asset('images/bajir jakarta.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-8 mx-auto text-center text-white">
                    <h1 class="display-4 fw-bold mb-4">Bantu Mereka yang Membutuhkan</h1>
                    <p class="lead mb-4">Bergabunglah dalam gerakan kebaikan untuk membantu sesama. Setiap bantuan Anda sangat berarti bagi mereka yang membutuhkan.</p>
                    <a href="#menu-section" class="btn btn-light btn-lg px-5 rounded-pill">
                        Mulai Sekarang
                        <i class="bi bi-arrow-down-circle ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu Section -->
<div id="menu-section" class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Pilihan Program Donasi</h2>
        <p class="text-muted">Pilih program yang sesuai dengan keinginan Anda untuk membantu sesama</p>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Donasi Barang Section -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 hover-card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper bg-primary text-white rounded-circle mb-3 mx-auto">
                        <i class="bi bi-box-seam fs-4"></i>
                    </div>
                    <h5 class="card-title fw-bold text-primary">Donasi Barang</h5>
                    <p class="card-text text-muted">Kirimkan barang bekas yang layak pakai untuk mereka yang membutuhkan.</p>
                    <a href="{{ url('/donations') }}" class="btn btn-primary rounded-pill px-4">Donasi Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Galang Dana Section -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 hover-card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper bg-success text-white rounded-circle mb-3 mx-auto">
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
            <div class="card shadow border-0 rounded-4 hover-card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper bg-warning text-white rounded-circle mb-3 mx-auto">
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
            <div class="card shadow border-0 rounded-4 hover-card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper bg-info text-white rounded-circle mb-3 mx-auto">
                        <i class="bi bi-person-plus fs-4"></i>
                    </div>
                    <h5 class="card-title fw-bold text-info">Daftar Volunteer</h5>
                    <p class="card-text text-muted">Bergabunglah sebagai volunteer untuk membantu mereka yang membutuhkan.</p>
                    <a href="{{ url('/volunteer') }}" class="btn btn-info rounded-pill px-4">Daftar Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Artikel Section -->
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4 hover-card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper bg-danger text-white rounded-circle mb-3 mx-auto">
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

@push('styles')
<style>
    /* Hero Section Styling */
    .hero-section {
        margin-top: -24px; /* Adjust based on your navbar height */
    }

    /* Icon Wrapper */
    .icon-wrapper {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Card Hover Effects */
    .hover-card {
        transition: all 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15) !important;
    }

    /* Button Hover Effects */
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Smooth Scroll */
    html {
        scroll-behavior: smooth;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .hero-image {
            height: 400px;
        }
        
        .display-4 {
            font-size: 2.5rem;
        }
    }
</style>
@endpush
@endsection