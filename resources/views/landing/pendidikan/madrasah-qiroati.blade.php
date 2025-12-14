@extends('landing.layout')

@section('title', 'Madrasah Qiro\'ati - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pendidikan';
    $activeMenu = 'madrasah-qiroati';
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
                                <span>Madrasah Qiro'ati</span>
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
                <h1 class="page-title">Madrasah Qiro'ati</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/Qiro\'ati.png') }}"
                     alt="Madrasah Qiro'ati" 
                     class="img-fluid content-image mb-4">
                <div class="content-text">
                    <p class="mb-3">
                        Lembaga ini memiliki tanggung jawab utama dalam mengelola seluruh kegiatan pendidikan santri putra dan putri yang menempuh pembelajaran <strong>Al-Qur'an dengan metode Qiro'ati.</strong> Melalui metode ini, santri dibimbing untuk membaca Al-Qur'an dengan tartil, memahami tajwid secara benar, serta menanamkan kecintaan terhadap Al-Qur'an sejak dini.
                    </p>
                    <p class="mb-3">
                        Selain fokus pada pembelajaran membaca, lembaga ini juga berperan dalam membentuk kedisiplinan, kesabaran, dan ketelatenan santri selama proses belajar. Setiap santri didampingi oleh pengajar yang kompeten dan berpengalaman dalam metode Qiro'ati, sehingga proses pembelajaran berlangsung terarah, efektif, dan menyenangkan.
                    </p>
                    <p class="mb-0">
                        Tidak hanya itu, lembaga ini turut menanamkan nilai-nilai spiritual dan akhlak dalam setiap kegiatan pembelajaran. Tujuannya agar para santri tidak hanya mahir membaca Al-Qur'an, tetapi juga mampu <strong>mengamalkan ajarannya dalam kehidupan sehari-hari</strong>, menjadi pribadi yang berilmu, beriman, dan berakhlakul karimah.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
