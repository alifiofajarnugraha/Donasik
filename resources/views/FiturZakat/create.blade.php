@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('zakat.index') }}">Data Zakat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Zakat</li>
        </ol>
    </nav>

    <h1>Tambah Data Zakat</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('zakat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="penghasilan" class="form-label">Penghasilan per Bulan</label>
            <input type="number" class="form-control" id="penghasilan" name="penghasilan" step="0.01" placeholder="Masukkan penghasilan per bulan" required>
        </div>
        <div class="mb-3">
            <label for="thr_bonus" class="form-label">THR/Bonus</label>
            <input type="number" class="form-control" id="thr_bonus" name="thr_bonus" step="0.01" value="0">
        </div>
        <div class="mb-3">
            <label for="utang" class="form-label">Utang</label>
            <input type="number" class="form-control" id="utang" name="utang" step="0.01" value="0">
        </div>
        <div class="mb-3">
            <label for="cicilan" class="form-label">Cicilan</label>
            <input type="number" class="form-control" id="cicilan" name="cicilan" step="0.01" value="0">
        </div>

        

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
