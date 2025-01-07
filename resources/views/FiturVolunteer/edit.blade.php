@extends('layouts.app')

@section('title', 'Edit Volunteer')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Volunteer</h1>
    <form action="{{ route('volunteer.update', $volunteer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $volunteer->name) }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $volunteer->email) }}" required>
        </div>

        <!-- Telepon -->
        <div class="mb-3">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $volunteer->phone) }}" required>
        </div>

        <!-- Keahlian -->
        <div class="mb-3">
            <label for="skills" class="form-label">Keahlian</label>
            <textarea class="form-control" id="skills" name="skills" rows="3" required>{{ old('skills', $volunteer->skills) }}</textarea>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('volunteer.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection