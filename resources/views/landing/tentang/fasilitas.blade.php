@extends('landing.layout')

@section('title', 'Fasilitas - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'tentang';
    $activeMenu = 'fasilitas';
@endphp

@section('content')
<main class="py-5">
    <div class="container">
        <div class="row gx-6 py-2">
            <div class="col-lg-4">
                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="card-title text-teal mb-4"><strong>Tentang Kami</strong></h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item {{ $activeMenu === 'sejarah' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.tentang.sejarah') }}">Sejarah</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'visi-misi' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.tentang.visi-misi') }}">Visi dan Misi</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'pendiri-institusi' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.tentang.pendiri-institusi') }}">Pendiri Institusi</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'keunggulan' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.tentang.keunggulan') }}">Keunggulan</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'fasilitas' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <span>Fasilitas</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Fasilitas</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
                <div class="row g-3 mt-2">
                    @for($i = 1; $i <= 14; $i++)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card facility-card border-0 shadow-sm">
                            <img src="{{ asset('fe_sicarsa/assets/fasilitas' . $i . '.png') }}" class="card-img-top rounded" alt="Fasilitas {{ $i }}">
                            <div class="card-body p-2">
                                @php
                                    $facilities = [
                                        1 => 'Mushola Santri Putra',
                                        2 => 'Masjid',
                                        3 => 'Gedung Madrasah',
                                        4 => 'Asrama Santri Putri',
                                        5 => 'Asrama Santri Putra',
                                        6 => 'Lapangan Bola Voli',
                                        7 => 'Lapangan Bola Kaki',
                                        8 => 'Lapangan Basket',
                                        9 => 'Koperasi',
                                        10 => 'Lab Komputer',
                                        11 => 'Perpustakaan',
                                        12 => 'Aula',
                                        13 => 'Ruang Kelas',
                                        14 => 'MCK/Sanitasi'
                                    ];
                                @endphp
                                <p class="card-title mt-2 mb-2 text-center fw-bold facility-title">{{ $facilities[$i] ?? 'Fasilitas ' . $i }}</p>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


