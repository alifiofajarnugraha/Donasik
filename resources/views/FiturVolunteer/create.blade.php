@extends('layouts.app')

@section('title', 'Form Pendaftaran Volunteer')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Form Pendaftaran Volunteer</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('volunteer.store') }}" method="POST">
                        @csrf
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Masukkan nomor telepon Anda" required>
                        </div>

                        <!-- Skills -->
                        <div class="mb-3">
                            <label for="skills" class="form-label">Keahlian (Skills)</label>
                            <textarea name="skills" id="skills" class="form-control" rows="4" placeholder="Tuliskan keahlian Anda, misalnya: medis, logistik, komunikasi, dll." required></textarea>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection