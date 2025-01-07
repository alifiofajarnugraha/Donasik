@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section with Enhanced Styling -->
    <div class="row mb-5">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2 class="display-5 fw-bold text-primary">
                <i class="fas fa-hand-holding-heart me-2"></i>Daftar Kampanye Donasi
            </h2>
            <a href="{{ route('campaigns.create') }}" 
               class="btn btn-primary btn-lg rounded-pill shadow-sm">
                <i class="fas fa-plus-circle me-2"></i> Buat Kampanye Baru
            </a>
        </div>
    </div>

    <!-- Alert with Animation -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" 
             role="alert"
             style="animation: slideIn 0.5s ease-out">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Campaign Cards Grid -->
    <div class="row g-4">
        @forelse($campaigns as $campaign)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                    <!-- Campaign Image with Overlay -->
                    <div class="position-relative">
                        <img src="{{ asset('images/'.$campaign->image) }}" 
                             class="card-img-top" 
                             alt="{{ $campaign->title }}"
                             style="height: 220px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-primary rounded-pill shadow">
                                <i class="far fa-clock me-1"></i>
                                {{ \Carbon\Carbon::parse($campaign->deadline)->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Campaign Title & Description -->
                        <h5 class="card-title fw-bold mb-3">{{ $campaign->title }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($campaign->description, 100) }}
                        </p>
                        
                        <!-- Progress Bar with Enhanced Styling -->
                        <div class="progress mb-4" style="height: 10px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                                 role="progressbar" 
                                 style="width: {{ $campaign->getProgressPercentageAttribute() }}%"
                                 aria-valuenow="{{ $campaign->getProgressPercentageAttribute() }}"
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                            </div>
                        </div>

                        <!-- Amount Details with Icons -->
                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <small class="text-muted d-block mb-1">
                                    <i class="fas fa-coins me-1"></i> Terkumpul
                                </small>
                                <h6 class="fw-bold text-success mb-0">
                                    Rp {{ number_format($campaign->current_amount) }}
                                </h6>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block mb-1">
                                    <i class="fas fa-flag-checkered me-1"></i> Target
                                </small>
                                <h6 class="fw-bold text-primary mb-0">
                                    Rp {{ number_format($campaign->target_amount) }}
                                </h6>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="text-center">
                            <a href="{{ route('campaigns.show', $campaign->id) }}" 
                               class="btn btn-outline-primary btn-lg w-100 rounded-pill">
                                <i class="fas fa-info-circle me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center p-5 shadow-sm rounded-3">
                    <i class="fas fa-info-circle fa-3x mb-3"></i>
                    <h4>Belum ada kampanye yang tersedia.</h4>
                    <p class="mb-0">Jadilah yang pertama membuat kampanye donasi!</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        transition: all 0.3s ease;
        border-radius: 15px;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    @keyframes slideIn {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    .progress {
        border-radius: 10px;
        background-color: #e9ecef;
    }
    .progress-bar {
        border-radius: 10px;
    }
    .btn-outline-primary:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease;
    }
</style>
@endpush