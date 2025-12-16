@extends('landing.layout')

@section('title', 'Keunggulan - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'tentang';
    $activeMenu = 'keunggulan';
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
                                <span>Keunggulan</span>
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
                <h1 class="page-title">Keunggulan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card keunggulan-card h-100 text-center p-3">
                            <img src="{{ asset('fe_sicarsa/assets/C1.png') }}" class="keunggulan-icon mt-4" alt="">
                            <h5 class="text-keunggulan">Pendidikan Religius</h5>
                            <p class="small mb-4">
                                Pondok memberikan pendidikan agama yang membentuk santri beriman dan berakhlak mulia.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card keunggulan-card h-100 text-center p-3">
                            <img src="{{ asset('fe_sicarsa/assets/C2.png') }}" class="keunggulan-icon mt-4" alt="">
                            <h5 class="text-keunggulan">Lingkungan Disiplin</h5>
                            <p class="small mb-4">
                                Santri dibiasakan hidup tertib dan taat aturan, menciptakan karakter yang tangguh dan bertanggung jawab
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card keunggulan-card h-100 text-center p-3">
                            <img src="{{ asset('fe_sicarsa/assets/C3.png') }}" class="keunggulan-icon mt-4" alt="">
                            <h5 class="text-keunggulan">Fasilitas Optimal</h5>
                            <p class="small mb-4">
                                Sarana belajar dan tempat ibadah disediakan secara lengkap untuk menunjang kegiatan akademik dan keagamaan para santri 
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card keunggulan-card h-100 text-center p-3">
                            <img src="{{ asset('fe_sicarsa/assets/C4.png') }}" class="keunggulan-icon mt-4" alt="">
                            <h5 class="text-keunggulan">Hafalan Qur'an</h5>
                            <p class="small mb-4">
                                Program tahfidz menjadi salah satu keunggulan dengan pembimbing berkompeten di bidangnya
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card keunggulan-card h-100 text-center p-3">
                            <img src="{{ asset('fe_sicarsa/assets/C5.png') }}" class="keunggulan-icon mt-4" alt="">
                            <h5 class="text-keunggulan">Kehidupan Terarah</h5>
                            <p class="small mb-4">
                                Kehidupan sehari-hari di pesantren dibangun dengan nilai disiplin, kemandirian, dan kebersamaan yang mendidik
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card keunggulan-card h-100 text-center p-3">
                            <img src="{{ asset('fe_sicarsa/assets/C6.png') }}" class="keunggulan-icon mt-4" alt="">
                            <h5 class="text-keunggulan">Pengembangan Diri</h5>
                            <p class="small mb-4">
                                Santri dilatih untuk mengasah potensi melalui kegiatan ekstrakurikuler dan pelatihan keterampilan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


