@extends('landing.layout')

@section('title', 'Pondok Putri - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pendidikan';
    $activeMenu = 'pondok-putri';
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
                                <span>Pondok Putri</span>
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
                                <a href="{{ route('landing.pendidikan.madrasah-aliyah') }}">Madrasah Aliyah</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Pondok Putri Pesantren Al-Falah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/pondokputri.png') }}"
                     alt="Pondok Putri" 
                     class="img-fluid content-image mb-4">
                <div class="content-text">
                    <p class="mb-3">
                        Lembaga ini bertanggung jawab dalam mengelola berbagai aspek yang berkaitan dengan kehidupan <strong>santri putri</strong>, mulai dari fasilitas dan sarana belajar, pembinaan pendidikan, hingga menjaga keamanan dan ketertiban di lingkungan pesantren. Seluruh kegiatan diarahkan agar menciptakan suasana yang nyaman, teratur, dan mendukung proses pendidikan yang Islami.
                    </p>
                    <p class="mb-3">
                        Selain fokus pada pemenuhan kebutuhan fisik dan lingkungan belajar, lembaga ini juga berperan dalam membentuk kedisiplinan dan tanggung jawab santri putri. Pengawasan dilakukan dengan pendekatan yang bijak dan penuh perhatian agar setiap santri merasa aman serta mampu menyesuaikan diri dengan budaya pesantren.
                    </p>
                    <p class="mb-0">
                        Dalam bidang pembinaan, lembaga ini turut mendukung kegiatan pengembangan diri melalui kegiatan keagamaan, keterampilan, dan sosial. Dengan bimbingan yang berkelanjutan, diharapkan santri putri dapat tumbuh menjadi generasi yang berilmu, berakhlak, dan siap berkontribusi positif di masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


