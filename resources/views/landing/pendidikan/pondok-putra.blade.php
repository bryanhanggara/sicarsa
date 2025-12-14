@extends('landing.layout')

@section('title', 'Pondok Putra - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pendidikan';
    $activeMenu = 'pondok-putra';
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
                                <span>Pondok Putra</span>
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
                                <a href="{{ route('landing.pendidikan.madrasah-aliyah') }}">Madrasah Aliyah</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Pondok Putra Pesantren Al-Falah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/pondokputra.png') }}"
                     alt="Pondok Putra" 
                     class="img-fluid content-image mb-4">
                <div class="content-text">
                    <p class="mb-3">
                        Lembaga ini memiliki tanggung jawab utama dalam mengelola seluruh kegiatan dan kebutuhan <strong>santri putra,</strong> mulai dari aspek sarana dan prasarana, pendidikan, hingga keamanan dan ketertiban di lingkungan pondok. Segala bentuk aktivitas santri putra diatur dan diawasi dengan sistem yang terstruktur agar tercipta lingkungan belajar yang kondusif, tertib, dan nyaman bagi seluruh santri.
                    </p>
                    <p class="mb-3">
                        Dalam bidang sarana dan prasarana, lembaga ini memastikan seluruh fasilitas penunjang kegiatan belajar dan kehidupan sehari-hari santri berada dalam kondisi baik dan layak digunakan. Mulai dari asrama, ruang belajar, tempat ibadah, hingga area kegiatan ekstrakurikuler, semuanya dirawat dengan baik demi menunjang kenyamanan serta efektivitas proses pembelajaran.
                    </p>
                    <p class="mb-0">
                        Sementara itu, dalam aspek pendidikan dan pembinaan karakter, lembaga turut berperan aktif dalam menanamkan nilai-nilai kedisiplinan, tanggung jawab, serta akhlak mulia kepada para santri. Melalui pengawasan yang terarah dan kegiatan yang positif, lembaga ini berupaya menciptakan generasi santri yang berilmu, beretika, dan mampu menjadi teladan baik di lingkungan pesantren maupun di masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
