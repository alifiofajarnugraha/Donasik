@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3">
                <!-- Campaign Image -->
                <img src="{{ asset('images/'.$campaign->image) }}" 
                     class="card-img-top rounded-top" 
                     alt="{{ $campaign->title }}"
                     style="height: 400px; object-fit: cover">

                <div class="card-body">
                    <!-- Header Section -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold mb-0">{{ $campaign->title }}</h3>
                        <a href="{{ route('campaigns.index') }}" 
                           class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>

                    <!-- Description -->
                    <p class="text-justify mb-4">{{ $campaign->description }}</p>

                    <!-- Progress Section -->
                    <div class="progress mb-2" style="height: 15px;">
                        <div class="progress-bar bg-primary" 
                             role="progressbar" 
                             style="width: {{ $campaign->getProgressPercentageAttribute() }}%">
                            {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}%
                        </div>
                    </div>
                    
                    <!-- Progress Text -->
                    <div class="text-center mb-4">
                        <small class="text-primary fw-bold">
                            {{ number_format($campaign->getProgressPercentageAttribute(), 1) }}% dari target tercapai
                        </small>
                    </div>

                    <!-- Campaign Stats -->
                    <div class="row g-3 mb-4">
                        <!-- Target Amount -->
                        <div class="col-md-4">
                            <div class="border rounded-3 p-3 text-center bg-light h-100">
                                <h5 class="text-muted mb-2">Target</h5>
                                <p class="h4 text-primary mb-0 fw-bold">
                                    Rp {{ number_format($campaign->target_amount) }}
                                </p>
                            </div>
                        </div>

                        <!-- Current Amount -->
                        <div class="col-md-4">
                            <div class="border rounded-3 p-3 text-center bg-light h-100">
                                <h5 class="text-muted mb-2">Terkumpul</h5>
                                <p class="h4 text-success mb-0 fw-bold">
                                    Rp {{ number_format($campaign->current_amount) }}
                                </p>
                            </div>
                        </div>

                        <!-- Deadline -->
                        <div class="col-md-4">
                            <div class="border rounded-3 p-3 text-center bg-light h-100">
                                <h5 class="text-muted mb-2">Deadline</h5>
                                <p class="h4 text-danger mb-0 fw-bold">
                                    {{ \Carbon\Carbon::parse($campaign->deadline)->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('campaigns.edit', $campaign->id) }}" 
                           class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Kampanye
                        </a>

                        <form action="{{ route('campaigns.destroy', $campaign->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus kampanye ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i>Hapus Kampanye
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Card Styling */
    .card {
        transition: all 0.3s ease;
    }

    /* Progress Bar */
    .progress {
        border-radius: 10px;
        background-color: #e9ecef;
    }

    .progress-bar {
        transition: width 0.5s ease;
    }

    /* Button Styling */
    .btn {
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        transition: all 0.2s ease;
        font-weight: 500;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn i {
        font-size: 0.9em;
    }

    /* Stats Box */
    .border {
        border-color: #dee2e6 !important;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .btn {
            padding: 0.5rem 1rem;
        }
        
        .card-body {
            padding: 1rem;
        }
    }
</style>
@endpush