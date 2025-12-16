@extends('landing.layout')

@section('title', 'Program Pembelajaran - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pembinaan';
    $activeMenu = 'pembelajaran';
@endphp

@section('content')
<main class="py-5">
    <div class="container">
        <div class="row gx-6 py-2">
            <div class="col-lg-4">
                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="card-title text-teal mb-4"><strong>Pembinaan Santri</strong></h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item {{ $activeMenu === 'kegiatan-harian' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pembinaan.kegiatan-harian') }}">Kegiatan Harian</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'kegiatan-tahunan' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pembinaan.kegiatan-tahunan') }}">Kegiatan Tahunan</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'ekstrakurikuler' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pembinaan.ekstrakurikuler') }}">Ekstrakurikuler</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'pembelajaran' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <span>Program Pembelajaran</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Program Pembelajaran</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pembinaan Santri</li>
                    </ol>
                </nav>
                <p class="text-justify">
                    Berfokus pada kegiatan pendidikan non-formal yang memperkuat pemahaman agama dan praktik ilmu,
                    seperti tahfidzul Qur'an, setoran hafalan kitab kuning, rutinitas pengajian Minggu Pahing, dan
                    forum musyawarah antar santri. Program ini menjadi wadah pembentukan karakter dan kecerdasan spiritual.
                </p>
                <h4 class="section-title">I. Pesantren Salafiyah</h4>
                <div class="grid-2col">
                    <div>
                        <p class="sub-title">A. Fan Tasawwuf</p>
                        <ul>
                            <li>Ihya' Ulumuddin</li>
                            <li>Al Hikam Ibnu 'Athillah</li>
                            <li>Siroq Al Tholibin</li>
                            <li>Minhajul Abidin</li>
                        </ul>
                        <p class="sub-title">B. Fan Tafsir & Hadist</p>
                        <ul>
                            <li>Tafsir Al-Jalalain</li>
                            <li>Tafsir Al-Ahkam</li>
                            <li>Mukhtashor Ahadis</li>
                            <li>Buhgutu Marom</li>
                            <li>Tamhidul Ghofilin</li>
                        </ul>
                    </div>
                    <div>
                        <p class="sub-title">C. Fan Fiqih</p>
                        <ul>
                            <li>Fathul Qorib</li>
                            <li>Risalatul Jama'ah</li>
                        </ul>
                        <p class="sub-title">D. Fan Aqidah & Akhlak</p>
                        <ul>
                            <li>Kifayatul Atqiya'</li>
                            <li>Risalatul Mauwanah</li>
                            <li>Maqshud</li>
                            <li>Baqolyatul Akhbar</li>
                            <li>Tijan Durori</li>
                            <li>Ta'lim Al Mut'aulim</li>
                            <li>Ayyuhal Walad</li>
                        </ul>
                    </div>
                </div>
                <h4 class="section-title">II. Madrasah Diniyah</h4>
                <div class="grid-2col">
                    <div>
                        <p class="sub-title">A. Fan Nahwu</p>
                        <ul>
                            <li>Sarbrow</li>
                            <li>Al-Jurumiyah</li>
                            <li>Al-Imrithi</li>
                            <li>Alfiyah Ibnu Malik</li>
                        </ul>
                        <p class="sub-title">B. Fan Shorof</p>
                        <ul>
                            <li>Amsilah Tasrifiyah</li>
                            <li>Gowaidul Shorfiyah</li>
                            <li>Maqsud</li>
                        </ul>
                        <p class="sub-title">C. Fan Tajwid</p>
                        <ul>
                            <li>Hidayatus Shibyan</li>
                            <li>Tuhfatul Athfal</li>
                            <li>Jazariyah</li>
                        </ul>
                        <p class="sub-title">D. Fan Akhlak</p>
                        <ul>
                            <li>Alala</li>
                            <li>Akhlaqu Lil Banin</li>
                            <li>Tambihul Muta'allim</li>
                        </ul>
                    </div>
                    <div>
                        <p class="sub-title">E. Fan Aqidah</p>
                        <ul>
                            <li>Khoridatul Bahiyah</li>
                            <li>Aqidatul 'Awwam</li>
                            <li>Tijan Durori</li>
                        </ul>
                        <p class="sub-title">F. Fan Tarikh / Sejarah</p>
                        <ul>
                            <li>Khulasoh Nurul Yaqin</li>
                        </ul>
                        <p class="sub-title">G. Fan Fiqih</p>
                        <ul>
                            <li>Mabadi' Fiqhiyah</li>
                            <li>Sulam Munajat</li>
                            <li>Sulam Taufiq</li>
                            <li>Fathul Qorib</li>
                            <li>Fathul Mu'in</li>
                        </ul>
                        <p class="sub-title">H. Fan Ushul Fiqih</p>
                        <ul>
                            <li>Mabadi' Ushul Fiqih</li>
                            <li>Farodlul Bahiyah</li>
                        </ul>
                        <p class="sub-title">I. Fan Balaghah</p>
                        <ul>
                            <li>Jauharul Maknun</li>
                        </ul>
                    </div>
                </div>
                <h4 class="section-title">III. Tahfidz Al-Qur'an dan Qiro'ati</h4>
                <ul>
                    <li>Tahfidz Al-Qur'an 30 Juz</li>
                    <li>Sorogan Binadzor</li>
                    <li>Sema'an Al-Qur'an Bil Ghoib</li>
                    <li>Baca Tulis Al-Qur'an Metode QIROATI</li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection


