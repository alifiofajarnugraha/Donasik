@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Zakat</h1>

    <div class="mb-3">
        <strong>Nama:</strong> {{ $zakat->nama }}
    </div>
    <div class="mb-3">
        <strong>Penghasilan per Bulan:</strong> {{ number_format($zakat->penghasilan, 2) }}
    </div>
    <div class="mb-3">
        <strong>THR/Bonus:</strong> {{ number_format($zakat->thr_bonus, 2) }}
    </div>
    <div class="mb-3">
        <strong>Utang:</strong> {{ number_format($zakat->utang, 2) }}
    </div>
    <div class="mb-3">
        <strong>Cicilan:</strong> {{ number_format($zakat->cicilan, 2) }}
    </div>
    <div class="mb-3">
        <strong>Zakat yang harus dibayar:</strong> {{ number_format($zakat->zakat, 2) }}
    </div>
    <div class="mb-3">
        <strong>Panti Asuhan:</strong> {{ $zakat->pantiAsuhan->name ?? 'Tidak ada' }}
    </div>
    <div class="mb-3">
        <strong>Status Pembayaran:</strong> {{ $zakat->is_paid ? 'Sudah Dibayar' : 'Belum Dibayar' }}
    </div>

    <a href="{{ route('zakat.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
