@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold">Donasi</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('donations.show') }}" 
               class="btn btn-info btn-lg shadow-sm">
                <i class="fas fa-history me-2"></i>Riwayat Donasi Saya
            </a>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Campaign Cards -->
    <div class="row">
        @forelse($campaigns as $campaign)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <img src="{{ asset('images/'.$campaign->image) }}" 
                         class="card-img-top rounded-top" 
                         alt="{{ $campaign->title }}"
                         style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-3">{{ $campaign->title }}</h5>
                        <p class="card-text text-muted flex-grow-1">
                            {{ Str::limit($campaign->description, 100) }}
                        </p>
                        
                        <!-- Progress Bar -->
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar bg-primary" 
                                 role="progressbar" 
                                 style="width: {{ $campaign->getProgressPercentageAttribute() }}%"
                                 aria-valuenow="{{ $campaign->getProgressPercentageAttribute() }}"
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                            </div>
                        </div>
                        <div class="text-center mb-2">
                            <small class="text-primary fw-bold">
                                {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}% Tercapai
                            </small>
                        </div>

                        <!-- Amount Information -->
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <small class="text-muted d-block">Terkumpul</small>
                                <p class="fw-bold text-success mb-0">
                                    Rp {{ number_format($campaign->current_amount) }}
                                </p>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block">Target</small>
                                <p class="fw-bold text-primary mb-0">
                                    Rp {{ number_format($campaign->target_amount) }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <small class="text-muted">
                                <i class="far fa-clock me-1"></i> 
                                {{ \Carbon\Carbon::parse($campaign->deadline)->diffForHumans() }}
                            </small>
                            <div class="btn-group">
                                <button type="button" 
                                        class="btn btn-outline-primary"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#campaignModal-{{ $campaign->id }}">
                                    <i class="fas fa-info-circle me-1"></i>Detail
                                </button>
                                <a href="{{ route('donations.create', $campaign) }}"
                                   class="btn btn-primary">
                                    <i class="fas fa-heart me-1"></i>Donasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Campaign Detail Modal -->
            <div class="modal fade" id="campaignModal-{{ $campaign->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title fw-bold" id="campaignModalLabel-{{ $campaign->id }}">
                                {{ $campaign->title }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('images/'.$campaign->image) }}" 
                                 class="img-fluid rounded mb-4" 
                                 alt="{{ $campaign->title }}"
                                 style="width: 100%; height: 300px; object-fit: cover;">
                            
                            <p class="text-justify mb-4">{{ $campaign->description }}</p>
                            
                            <!-- Modal Progress Bar -->
                            <div class="progress mb-3" style="height: 15px;">
                                <div class="progress-bar bg-primary" 
                                     role="progressbar" 
                                     style="width: {{ $campaign->getProgressPercentageAttribute() }}%">
                                    {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}%
                                </div>
                            </div>

                            <!-- Modal Stats -->
                            <div class="row mb-3 g-3">
                                <div class="col-md-4">
                                    <div class="border rounded-3 p-3 text-center bg-light h-100">
                                        <h6 class="text-muted mb-2">Target</h6>
                                        <p class="h4 text-primary mb-0">
                                            Rp {{ number_format($campaign->target_amount) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="border rounded-3 p-3 text-center bg-light h-100">
                                        <h6 class="text-muted mb-2">Terkumpul</h6>
                                        <p class="h4 text-success mb-0">
                                            Rp {{ number_format($campaign->current_amount) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="border rounded-3 p-3 text-center bg-light h-100">
                                        <h6 class="text-muted mb-2">Tenggat Waktu</h6>
                                        <p class="h4 text-danger mb-0">
                                            {{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i>Tutup
                            </button>
                            <a href="{{ route('donations.create', $campaign) }}" 
                               class="btn btn-primary">
                                <i class="fas fa-heart me-1"></i>Donasi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center shadow-sm">
                    <i class="fas fa-info-circle me-2"></i>Belum ada kampanye yang tersedia.
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
        border-radius: 12px;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .progress {
        border-radius: 10px;
        background-color: #e9ecef;
    }

    .progress-bar {
        transition: width 0.5s ease;
    }

    .btn {
        border-radius: 6px;
        padding: 0.5rem 1rem;
    }

    .btn-group .btn {
        border-radius: 6px;
        margin: 0 2px;
    }

    .modal-content {
        border-radius: 12px;
    }

    .alert {
        border-radius: 10px;
    }
</style>
@endpush