@extends('landing.layout')

@section('title', 'Madrasah Diniyyah - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pendidikan';
    $activeMenu = 'madrasah-diniyyah';
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
                                <span>Madrasah Diniyyah</span>
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
                <h1 class="page-title">Madrasah Diniyyah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/Diniyyah.png') }}"
                     alt="Madrasah Diniyyah" 
                     class="img-fluid content-image mb-4">
                <div class="content-text">
                    <p class="mb-3">
                        Lembaga ini memiliki tanggung jawab utama dalam mengatur dan mengelola seluruh kegiatan pendidikan Diniyyah bagi para santri, baik putra maupun putri. Seluruh proses pembelajaran disusun dengan tujuan untuk <strong> memperdalam pemahaman santri terhadap ilmu agama</strong>, mulai dari dasar-dasar keislaman hingga kajian kitab klasik yang menjadi ciri khas pesantren.
                    </p>
                    <p class="mb-3">
                        Dalam pelaksanaannya, lembaga ini memastikan setiap santri mendapatkan bimbingan yang menyeluruh dari para ustaz dan ustazah yang berkompeten. Kegiatan belajar tidak hanya berfokus pada aspek teori, tetapi juga diimbangi dengan praktik ibadah dan pembinaan akhlak agar nilai-nilai keislaman benar-benar tertanam dalam kehidupan sehari-hari.
                    </p>
                    <p class="mb-0">
                        Selain itu, lembaga pendidikan Diniyyah juga berperan penting dalam menumbuhkan semangat cinta ilmu dan tanggung jawab moral pada diri santri. Melalui pendekatan yang terarah dan penuh keteladanan, lembaga ini berkomitmen untuk mencetak generasi yang berilmu, beriman, dan mampu menjadi teladan di tengah masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


