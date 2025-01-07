@extends('layouts.app')

@section('title', 'Berita Volunteer')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Berita Volunteer Tanggap Bencana</h1>
    <p class="text-center">Mari bergabung bersama kami untuk membantu masyarakat yang terdampak bencana. Berikut adalah beberapa peluang untuk menjadi relawan:</p>

    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/images/bajir jakarta.jpeg" class="card-img-top" alt="Banjir Jakarta">
                <div class="card-body">
                    <h5 class="card-title">Banjir di Jakarta</h5>
                    <p class="card-text">Bantu kami memberikan bantuan kepada masyarakat yang terdampak banjir di Jakarta.</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('volunteer.create') }}" class="btn btn-primary">Daftar Sebagai Relawan</a>
                        <a href="{{ route('volunteer.show', ['volunteer' =>1]) }}" class="btn btn-success">Lihat Relawan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/images/gempa.jpeg" class="card-img-top" alt="Gempa Sulawesi">
                <div class="card-body">
                    <h5 class="card-title">Gempa di Sulawesi</h5>
                    <p class="card-text">Bergabunglah untuk membantu korban gempa yang terjadi di Sulawesi.</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('volunteer.create') }}" class="btn btn-primary">Daftar Sebagai Relawan</a>
                        <a href="{{ route('volunteer.show', ['volunteer' => 2]) }}" class="btn btn-success">Lihat Relawan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/images/tsunamiaceh2.jpeg" class="card-img-top" alt="Tsunami Aceh">
                <div class="card-body">
                    <h5 class="card-title">Tsunami di Aceh</h5>
                    <p class="card-text">Dukung upaya kami untuk membangun kembali komunitas yang terdampak tsunami di Aceh.</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('volunteer.create') }}" class="btn btn-primary">Daftar Sebagai Relawan</a>
                        <a href="{{ route('volunteer.show', ['volunteer' => 3]) }}" class="btn btn-success">Lihat Relawan</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection