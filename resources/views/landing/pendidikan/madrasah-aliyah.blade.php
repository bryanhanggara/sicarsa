@extends('landing.layout')

@section('title', 'Madrasah Aliyah - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pendidikan';
    $activeMenu = 'madrasah-aliyah';
@endphp

@section('content')
<main class="py-5">
    <div class="container">
        <div class="row gx-6 py-2">
            <div class="col-lg-4">
                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="card-title text-teal mb-4"><strong>Lembaga Pendidikan</strong></h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item {{ $activeMenu === 'pondok-tahfidzul' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pendidikan.pondok-tahfidzul') }}">Pondok Tahfidzul Qur'an</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'pondok-putra' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pendidikan.pondok-putra') }}">Pondok Putra</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'pondok-putri' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pendidikan.pondok-putri') }}">Pondok Putri</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'madrasah-diniyyah' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pendidikan.madrasah-diniyyah') }}">Madrasah Diniyyah</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'madrasah-qiroati' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pendidikan.madrasah-qiroati') }}">Madrasah Qiro'ati</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'madrasah-ibtidaiyyah' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pendidikan.madrasah-ibtidaiyyah') }}">Madrasah Ibtidaiyyah</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'madrasah-tsanawiyah' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pendidikan.madrasah-tsanawiyah') }}">Madrasah Tsanawiyyah</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'madrasah-aliyah' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <span>Madrasah Aliyah</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Madrasah Aliyah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/MA.png') }}"
                     alt="Madrasah Aliyah" 
                     class="img-fluid content-image mb-4">
                <div class="content-text">
                    <p class="mb-3">
                        Lembaga ini memiliki tanggung jawab utama dalam mengelola dan mengawasi seluruh kegiatan pendidikan bagi siswa-siswi yang sedang menempuh <strong>pendidikan formal tingkat atas.</strong> Segala bentuk proses pembelajaran, administrasi akademik, hingga pengembangan karakter peserta didik menjadi fokus utama agar kualitas pendidikan terus meningkat dari waktu ke waktu.
                    </p>
                    <p class="mb-3">
                        Selain berperan dalam kegiatan akademik, lembaga ini juga berupaya menciptakan lingkungan belajar yang kondusif dan mendukung <strong>perkembangan potensi siswa</strong> secara menyeluruh. Melalui bimbingan para pendidik dan pengasuh yang berkompeten, siswa diarahkan untuk mencapai keseimbangan antara pengetahuan umum, nilai-nilai keagamaan, serta kedisiplinan dalam kehidupan sehari-hari.
                    </p>
                    <p class="mb-0">
                        Dengan adanya lembaga ini, diharapkan setiap siswa tidak hanya unggul dalam bidang akademik, tetapi juga memiliki akhlak mulia dan tanggung jawab sosial yang tinggi. Pembinaan yang berkelanjutan serta penerapan nilai-nilai Islami menjadi pondasi utama dalam membentuk generasi yang siap berkontribusi bagi masyarakat dan bangsa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


