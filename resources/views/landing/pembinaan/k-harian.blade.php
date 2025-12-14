@extends('landing.layout')

@section('title', 'Kegiatan Harian - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pembinaan';
    $activeMenu = 'kegiatan-harian';
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
                                <span>Kegiatan Harian</span>
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
                                <a href="{{ route('landing.pembinaan.pembelajaran') }}">Program Pembelajaran</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Kegiatan Harian</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pembinaan Santri</li>
                    </ol>
                </nav>
                <p>Kegiatan harian di Pondok Pesantren Al-Falah Putak dirancang untuk membentuk keseimbangan antara ilmu, ibadah, dan kedisiplinan santri. Setiap aktivitas memiliki nilai pembelajaran yang memperkuat karakter dan semangat kebersamaan</p>
                <div class="row g-3 mt-2">
                    @php
                        $activities = [
                            ['img' => 'kh-1.png', 'title' => 'Salat Berjamaah', 'desc' => 'Kegiatan wajib bagi seluruh santri yang dilaksanakan lima waktu di masjid pondok'],
                            ['img' => 'kh-2.png', 'title' => 'Ngaji Al-Qur\'an', 'desc' => 'Santri membaca, memahami, dan memperbaiki bacaan Al-Qur\'an setiap hari'],
                            ['img' => 'kh-3.png', 'title' => 'Sekolah Formal', 'desc' => 'Proses belajar mengajar sesuai kurikulum nasional untuk menambah wawasan akademik'],
                            ['img' => 'kh-4.png', 'title' => 'Ngaji Kitab Kuning', 'desc' => 'Pembelajaran kitab berbahasa Arab yang memperdalam ilmu agama dan fiqih'],
                            ['img' => 'kh-5.png', 'title' => 'Sekolah Diniyyah', 'desc' => 'Pendidikan agama tambahan untuk memperkuat dasar-dasar syariat Islam'],
                            ['img' => 'kh-6.png', 'title' => 'Setoran Hafalan Kitab', 'desc' => 'Santri menyetorkan hafalan teks kitab kepada guru sebagai bentuk evaluasi rutin'],
                            ['img' => 'kh-7.png', 'title' => 'Tahfidzul Qur\'an', 'desc' => 'Program menghafal Al-Qur\'an secara bertahap dengan bimbingan ustadz/ustadzah'],
                            ['img' => 'kh-8.png', 'title' => 'Praktikum Komputer', 'desc' => 'Kegiatan belajar teknologi dan keterampilan digital untuk mendukung era modern'],
                            ['img' => 'kh-9.png', 'title' => 'Gotong Royong', 'desc' => 'Membersihkan lingkungan pondok secara bersama sebagai wujud tanggung jawab dan kebersamaan'],
                            ['img' => 'kh-10.png', 'title' => 'Kegiatan Malam Jum\'at', 'desc' => 'Pengajian dan dzikir bersama untuk memperkuat spiritualitas santri'],
                            ['img' => 'kh-11.png', 'title' => 'Senam Pagi', 'desc' => 'Olahraga rutin untuk menjaga kebugaran dan semangat belajar para santri'],
                            ['img' => 'kh-12.png', 'title' => 'Makan Bersama', 'desc' => 'Kegiatan makan bersama untuk mempererat ukhuwah dan kebersamaan santri'],
                        ];
                    @endphp
                    @foreach($activities as $activity)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card activities-card border-0 shadow-sm h-100">
                            <img src="{{ asset('fe_sicarsa/assets/' . $activity['img']) }}" class="card-img-top rounded-top" alt="{{ $activity['title'] }}">
                            <div class="card-body p-3">
                                <p class="fw-bold mb-1 activities-title">{{ $activity['title'] }}</p>
                                <p class="activities-desc mb-0">{{ $activity['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
