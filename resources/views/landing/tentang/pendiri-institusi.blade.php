@extends('landing.layout')

@section('title', 'Pendiri Institusi - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'tentang';
    $activeMenu = 'pendiri-institusi';
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
                                <span>Pendiri Institusi</span>
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
                <h1 class="page-title">Pendiri Pesantren</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/pendiri-institusi.png') }}"
                     alt="Pendiri Institusi" 
                     class="img-fluid content-image mb-4">

                <div class="content-text">
                    <h4><strong><center>Kyai Haji Mursyidi</center></strong></h4>
                    <p class="mb-3 mt-3">
                        Pondok Pesantren Al-Falah Putak didirikan oleh KH. Mursyidi, seorang ulama yang memiliki perjalanan panjang dalam menuntut ilmu di berbagai pesantren terkemuka di Indonesia. Beliau merupakan alumni <strong>Pondok Pesantren Al-Falah di Desa Sumber Mulyo, Kecamatan Buay Madang Timur, Kabupaten OKU Timur,</strong>  dan juga pernah memperdalam pengetahuan agama di Pondok Pesantren Hidayatul Mubtadi'in Lirboyo yang dikenal dengan tradisi keilmuannya yang kuat. Berbekal pengalaman belajar dan pengabdian yang mendalam terhadap dunia pesantren, KH. Mursyidi terdorong untuk mendirikan sebuah lembaga pendidikan Islam yang tidak hanya menekankan pada penguasaan ilmu agama, tetapi juga pembentukan karakter dan akhlak mulia bagi para santrinya.
                    </p>
                    <p class="mb-3">
                        Perjalanan dakwah beliau dimulai ketika pindah ke Desa Putak bersama sang istri, Ny. Hj. Aniswatuzzuhriyah, dan tiga santri putri pertama, yaitu Siti Maslikhah, Siti Asiyah, dan Umi Latifah. Dari langkah kecil inilah, KH. Mursyidi mulai menanamkan nilai-nilai keislaman dan semangat keilmuan yang menjadi fondasi utama berdirinya Pondok Pesantren Al-Falah Putak hingga berkembang seperti sekarang.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
