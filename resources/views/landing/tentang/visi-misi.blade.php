@extends('landing.layout')

@section('title', 'Visi & Misi - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'tentang';
    $activeMenu = 'visi-misi';
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
                                <span>Visi dan Misi</span>
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
                                <a href="{{ route('landing.tentang.fasilitas') }}">Fasilitas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Visi dan Misi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/visi-misi.png') }}"
                     alt="Visi dan Misi" 
                     class="img-fluid content-image mb-4">

                <div class="content-text">
                    <h4><strong>Visi</strong></h4>
                    <p class="mt-3">
                        Berprestasi dalam IPTEK (Ilmu Pengetahuan dan Teknologi) dan IMTAQ (Iman dan Taqwa) serta berawasan lingkungan.
                    </p>

                    <h4 class="mt-4 mb-4"><strong>Misi</strong></h4>
                    <div class="mission-item">
                        <span class="mission-number">1.</span><p class="mission-text">
                            Melaksanakan pengembangan dan bimbingan secara efektif dan efisien sesuai dengan potensi peserta didik.
                        </p>
                    </div>

                    <div class="mission-item">
                        <span class="mission-number">2.</span><p class="mission-text">
                            Menumbuhkan semangat untuk belajar menghayati dan mengamalkan ajaran agama islam juga budaya bangsa sehingga menjadikan sumber kearifan dalam beribadah.
                        </p>
                    </div>

                    <div class="mission-item">
                        <span class="mission-number">3.</span><p class="mission-text">
                            Bekerjasama dengan masyarakat (Stakeholder) untuk mencapai tujuan sekolah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
