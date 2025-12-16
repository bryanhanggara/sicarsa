@extends('landing.layout')

@section('title', 'Sejarah - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'tentang';
    $activeMenu = 'sejarah';
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
                                <span>Sejarah</span>
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
                                <a href="{{ route('landing.tentang.fasilitas') }}">Fasilitas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Sejarah Pesantren</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/sejarah.png') }}"
                     alt="Sejarah Pesantren" 
                     class="img-fluid content-image mb-4">
                     
                <div class="content-text">
                    <p class="mb-3">
                        Pondok Pesantren Salafiyah Al-Falah Putak berdiri pada <strong>10 Muharam atau 5 Maret 2005</strong> atas prakarsa KH. Mursyidi, alumni Pondok Pesantren Al-Falah Sumber Mulyo dan Hidayatul Mubtadi'in Lirboyo. Bersama istrinya, Ny. Hj. Aniswatuzzuhriyah, serta tiga santri putri pertama — Siti Maslikhah, Siti Asiyah, dan Umi Latifah — beliau memulai kegiatan pesantren di Desa Putak. Seiring berjalannya waktu, pada 29 September 2006 pondok ini resmi memperoleh izin operasional dari Kementerian Agama Kabupaten Muara Enim dengan nomor statistik dan akta notaris yang sah, menandai awal perkembangan resmi <strong>Pondok Pesantren Al-Falah Putak</strong> sebagai lembaga pendidikan Islam.
                    </p>
                    <p class="mb-3">
                        Dalam proses pembelajaran, kami menerapkan dua pendekatan utama, yaitu <strong>metode tradisional khas pesantren dan metode pembaruan.</strong> Metode tradisional seperti sorogan, bandongan, halaqah, dan hafalan digunakan untuk memperkuat penguasaan kitab kuning dan kedekatan santri dengan guru. Sementara itu, metode pembaruan seperti hiwar (dialog), bahtsul masa'il (pembahasan masalah keagamaan), qira'atul kutub (membaca kitab mandiri), dan majelis ta'lim (pengajian umum) kami gunakan untuk melatih kemampuan berpikir kritis, komunikasi, dan kemandirian belajar santri.
                    </p>
                    <p class="mb-3">
                        Pondok Pesantren Al-Falah Putak terus berkembang dari waktu ke waktu, baik dari segi jumlah santri, fasilitas pendidikan, maupun kualitas tenaga pendidik. Berbagai sarana dan prasarana belajar dibangun untuk mendukung proses pendidikan yang nyaman dan kondusif. Peran para kyai, ustadz, dan tenaga pengajar menjadi fondasi utama dalam menjaga mutu pembelajaran serta membentuk karakter santri yang berakhlakul karimah.
                    </p>
                    <p class="mb-0">
                        Selain kegiatan akademik, pondok juga menyelenggarakan berbagai kegiatan ekstrakurikuler seperti seni, olahraga, dan pelatihan kewirausahaan. Kegiatan tersebut menjadi wadah bagi santri untuk menyalurkan bakat dan mengasah keterampilan praktis yang bermanfaat bagi kehidupan bermasyarakat. Dengan semangat kebersamaan dan dedikasi seluruh keluarga besar pondok, Al-Falah Putak berkomitmen untuk mencetak generasi Qur'ani yang berilmu, berakhlak, dan siap berkontribusi bagi bangsa dan agama.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


