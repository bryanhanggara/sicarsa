@extends('landing.layout')

@section('title', 'Kegiatan Tahunan - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pembinaan';
    $activeMenu = 'kegiatan-tahunan';
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
                                <span>Kegiatan Tahunan</span>
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
                <h1 class="page-title">Kegiatan Tahunan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pembinaan Santri</li>
                    </ol>
                </nav>
                <p>Kegiatan tahunan di Pondok Pesantren Al-Falah Putak menjadi momen penting dalam memperkuat kebersamaan, semangat keagamaan, serta pengembangan diri santri. Setiap kegiatan dirancang untuk menumbuhkan nilai-nilai islami, sosial, dan kepemimpinan.</p>
                <div class="row g-3 mt-2">
                    @php
                        $activities = [
                            ['img' => 'kt-1.png', 'title' => 'Pengajian Minggu Pahing', 'desc' => 'Pengajian bulanan memperdalam agama dan mempererat ukhuwah antar warga pondok'],
                            ['img' => 'kt-2.png', 'title' => 'Ibadah Qurban', 'desc' => 'Pelaksanaan ibadah qurban pada Hari Raya Idul Adha sebagai pengamalan ajaran Islam'],
                            ['img' => 'kt-3.png', 'title' => 'Musyawarah Santri', 'desc' => 'Forum musyawarah santri untuk menumbuhkan tanggung jawab dan jiwa kepemimpinan'],
                            ['img' => 'kt-4.png', 'title' => 'Maulid Nabi', 'desc' => 'Peringatan kelahiran Nabi Muhammad SAW dengan ceramah dan sholawat bersama'],
                            ['img' => 'kt-5.png', 'title' => 'Hari Kemerdekaan', 'desc' => 'Upacara kemerdekaan dan lomba seru untuk memperingati Hari Nasional'],
                            ['img' => 'kt-6.png', 'title' => 'Peringatan Hari Santri', 'desc' => 'Upacara nasional yang menumbuhkan semangat perjuangan dan nilai keislaman'],
                            ['img' => 'kt-7.png', 'title' => 'Manasik Haji', 'desc' => 'Simulasi tata cara pelaksanaan ibadah haji bagi seluruh santri pondok'],
                            ['img' => 'kt-8.png', 'title' => 'Kegiatan Ramadhan', 'desc' => 'Kajian kitab kuning dan tadarus Al-Qur\'an selama bulan suci ramadhan per tahun'],
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
