@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Zakat</h2>
    <form action="{{ route('zakat.update', $zakat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $zakat->nama) }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Penghasilan -->
        <div class="form-group">
            <label for="penghasilan">Penghasilan</label>
            <input type="number" name="penghasilan" id="penghasilan" class="form-control" value="{{ old('penghasilan', $zakat->penghasilan) }}" required>
            @error('penghasilan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Thr Bonus -->
        <div class="form-group">
            <label for="thr_bonus">Thr/Bonus</label>
            <input type="number" name="thr_bonus" id="thr_bonus" class="form-control" value="{{ old('thr_bonus', $zakat->thr_bonus) }}">
            @error('thr_bonus')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Utang -->
        <div class="form-group">
            <label for="utang">Utang</label>
            <input type="number" name="utang" id="utang" class="form-control" value="{{ old('utang', $zakat->utang) }}">
            @error('utang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Cicilan -->
        <div class="form-group">
            <label for="cicilan">Cicilan</label>
            <input type="number" name="cicilan" id="cicilan" class="form-control" value="{{ old('cicilan', $zakat->cicilan) }}">
            @error('cicilan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Zakat</button>
        <a href="{{ route('zakat.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
