@extends('layouts.app')
@section('title', 'Beranda Donasik')

@section('header-title', 'Bantu Mereka yang Membutuhkan')
@section('header-description', 'Gabung bersama kami dalam platform donasi terbaik.')

@section('content')


<body class="bg-light">
    

    <!-- Hero Section -->
    <div class="container py-5" style="margin-top: 100px;">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h1 class="display-4 text-dark mb-4">Wujudkan Kepedulian Anda Melalui Donasi</h1>
                <p class="lead text-muted mb-4">DONASIK adalah platform donasi online terpercaya yang menghubungkan para donatur dengan mereka yang membutuhkan bantuan.</p>
                <a href="#" class="btn btn-primary btn-lg me-3">Mulai Donasi</a>
                <a href="#learn-more" class="btn btn-outline-primary btn-lg">Pelajari Lebih Lanjut</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/1111.jpg') }}" alt="Donasi Kemanusiaan" class="img-fluid rounded-3 shadow-lg">
            </div>
        </div>
    </div>

    <!-- Keunggulan Section -->
    <div id="learn-more" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-dark mb-4">Mengapa Memilih DONASIK?</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <svg class="bi bi-check-circle-fill" width="2rem" height="2rem" fill="currentColor">
                                    <path d="M12 0C5.37 0 0 5.373 0 12s5.37 12 12 12 12-5.373 12-12S18.63 0 12 0zm5.707 6.293l-6 6c-.39.39-.902.447-1.309.188a.993.993 0 0 1-.188-1.309l3.707-3.707c.39-.39.902-.447 1.309-.188a.993.993 0 0 1 .188 1.309z"/>
                                </svg>
                            </div>
                            <h5 class="card-title">100% Terpercaya</h5>
                            <p class="card-text">Semua donasi dikelola secara transparan dan dapat dipertanggungjawabkan dengan laporan berkala.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <svg class="bi bi-clock-fill" width="2rem" height="2rem" fill="currentColor">
                                    <path d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zM11 4a1 1 0 1 1 2 0v5.5h3a1 1 0 1 1 0 2h-4.5a1 1 0 0 1-1-1V4z"/>
                                </svg>
                            </div>
                            <h5 class="card-title">Cepat & Mudah</h5>
                            <p class="card-text">Proses donasi yang simpel dan cepat dengan berbagai metode pembayaran yang aman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <svg class="bi bi-heart-fill" width="2rem" height="2rem" fill="currentColor">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            </div>
                            <h5 class="card-title">Dampak Nyata</h5>
                            <p class="card-text">Donasi Anda langsung disalurkan kepada yang membutuhkan dengan bukti penyaluran yang jelas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Section -->
    <div class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4">
                    <h2 class="display-4">10.000+</h2>
                    <p>Donatur Aktif</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h2 class="display-4">Rp5M+</h2>
                    <p>Total Donasi</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h2 class="display-4">100+</h2>
                    <p>Program Aktif</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h2 class="display-4">34</h2>
                    <p>Provinsi Terjangkau</p>
                </div>
            </div>
        </div>
    </div>

   
