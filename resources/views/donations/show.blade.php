@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-history me-2"></i>Riwayat Donasi Saya
        </h2>
        <a href="{{ route('donations.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Kampanye
        </a>
    </div>

    <div class="row">
        @if($donations->isEmpty())
            <div class="col-md-12">
                <div class="alert alert-warning shadow-sm rounded-3">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    Belum ada donasi yang dilakukan.
                </div>
            </div>
        @else
            @foreach($donations as $donation)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3 hover-effect">
                    <!-- Campaign Image -->
                    <div class="position-relative">
                        <img src="{{ asset('images/' . $donation->campaign->image) }}" 
                             class="card-img-top rounded-top" 
                             alt="{{ $donation->campaign->title }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="donation-amount position-absolute top-0 end-0 m-3">
                            <span class="badge bg-primary fs-6 shadow">
                                Rp {{ number_format($donation->amount) }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-3">{{ $donation->campaign->title }}</h5>
                        
                        <div class="donation-details mb-4">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="far fa-calendar-alt me-2"></i>
                                        <span>{{ $donation->created_at->format('d M Y H:i') }}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="message-box bg-light p-3 rounded-3">
                                        <small class="text-muted d-block mb-1">Pesan Donasi:</small>
                                        <p class="mb-0">{{ $donation->message ?? 'Tidak ada pesan' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-auto">
                            <div class="d-flex gap-2">
                                <a href="{{ route('donations.edit', $donation) }}" 
                                   class="btn btn-warning flex-grow-1">
                                    <i class="fas fa-edit me-1"></i>Edit Donasi
                                </a>
                                <form action="{{ route('donations.destroy', $donation) }}" 
                                      method="POST" 
                                      class="flex-grow-1"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100">
                                        <i class="fas fa-trash me-1"></i>Batal Donasi
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Card Styling */
    .card {
        transition: all 0.3s ease;
    }

    .hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    /* Badge Styling */
    .badge {
        padding: 0.5rem 1rem;
        font-weight: 500;
    }

    /* Button Styling */
    .btn {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-1px);
    }

    /* Message Box */
    .message-box {
        border-left: 4px solid #0d6efd;
    }

    /* Alert Styling */
    .alert {
        border: none;
        padding: 1rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .col-md-6 {
            padding: 0 0.5rem;
        }
        
        .card {
            margin-bottom: 1rem;
        }
    }
</style>
@endpush