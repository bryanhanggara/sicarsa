@extends('landing.layout')

@section('title', 'Ekstrakurikuler - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pembinaan';
    $activeMenu = 'ekstrakurikuler';
@endphp

@section('content')
<main class="py-5">
    <div class="container">
        <div class="row gx-6 py-2">
            <div class="col-lg-4">
                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="card-title text-teal mb-4"><strong>Pembinaan Santri</strong></h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item {{ $activeMenu === 'kegiatan-harian' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pembinaan.kegiatan-harian') }}">Kegiatan Harian</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'kegiatan-tahunan' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pembinaan.kegiatan-tahunan') }}">Kegiatan Tahunan</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'ekstrakurikuler' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <span>Ekstrakurikuler</span>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'pembelajaran' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pembinaan.pembelajaran') }}">Program Pembelajaran</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Ekstrakurikuler</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pembinaan Santri</li>
                    </ol>
                </nav>
                <p>Fasilitas yang mendukung pengembangan minat dan bakat santri di luar kegiatan belajar utama, bertujuan untuk menumbuhkan kreativitas, semangat kerja sama, serta rasa tanggung jawab dalam diri setiap santri. Berikut beberapa ekstrakurikuler yang ada di pesantren Al-Falah Putak adalah sebagai berikut:</p>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('fe_sicarsa/assets/ekst-1.jpg') }}" class="d-block w-100 carousel-img" alt="Ekstrakurikuler">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('fe_sicarsa/assets/ekst-2.jpg') }}" class="d-block w-100 carousel-img" alt="Ekstrakurikuler">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('fe_sicarsa/assets/ekst-3.jpg') }}" class="d-block w-100 carousel-img" alt="Ekstrakurikuler">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('fe_sicarsa/assets/ekst-4.jpg') }}" class="d-block w-100 carousel-img" alt="Ekstrakurikuler">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('fe_sicarsa/assets/ekst-7.JPG') }}" class="d-block w-100 carousel-img" alt="Ekstrakurikuler">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('fe_sicarsa/assets/ekst-8.JPG') }}" class="d-block w-100 carousel-img" alt="Ekstrakurikuler">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <h4 class="section-title-colored mt-4 mb-4 fw-bold">Daftar Ekstrakurikuler di Pesantren Al-Falah Putak</h4>
                <div class="content-text mt-4">
                    <h5 class="mb-4">1. Kursus Bahasa Inggris</h5>
                    <h5 class="mb-4">2. Khitobah (Belajar Berpidato)</h5>
                    <h5 class="mb-4">3. Bola Kaki, Basket, dan lainnya</h5>
                    <h5 class="mb-4">4. Praktek pertukangan dan perkebunan</h5>
                    <h5 class="mb-4">5. Kursus Nahwu Shorof Awal dengan metode Al-Miftah</h5>
                    <h5 class="mb-4">6. Seni Sholawat Hadroh</h5>
                    <h5 class="mb-4">7. Tilawatil Qur'an</h5>
                    <h5 class="mb-4">8. Kegiatan Pramuka</h5>
                    <h5 class="mb-4">9. Marching Band</h5>
                    <h5 class="mb-4">10. Kursus Risalatul Mahidh dan Tazhijul Mayyit</h5>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
