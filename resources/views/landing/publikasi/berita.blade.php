@extends('landing.layout')

@section('title', 'Berita Pesantren - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'publikasi';
    $activeMenu = 'berita';
@endphp

@push('styles')
    <style>
        .hero-overlay {
            background: rgba(0, 0, 0, 0.45);
        }
    </style>
@endpush

@section('content')
<main class="py-5">
    <div class="container">
        <div class="row gx-6 py-2">
            <div class="col-lg-4">
                <div class="card border-0">
                    <div class="card-body">
                        <h3 class="card-title text-teal mb-4"><strong>Publikasi</strong></h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item {{ $activeMenu === 'berita' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <span>Berita Pesantren</span>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'galeri' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.publikasi.galeri') }}">Galeri Pesantren</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <h1 class="page-title">Berita Pesantren</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Publikasi</li>
                    </ol>
                </nav>

                @if($beritas->count() > 0)
                    @php
                        $beritaUtama = $beritas->first();
                    @endphp
                    <div class="card text-white mb-4 border-0">
                        @if($beritaUtama->gambar)
                            <img src="{{ Storage::url($beritaUtama->gambar) }}" class="card-img hero-news-img" alt="{{ $beritaUtama->judul }}">
                        @else
                            <img src="{{ asset('fe_sicarsa/assets/berita-hero.png') }}" class="card-img hero-news-img" alt="Berita">
                        @endif
                        <div class="card-img-overlay p-4 hero-overlay">
                            <span class="badge-utama mt-1">Berita Utama</span>
                            <h2 class="fw-bold justify-text mt-4">{{ $beritaUtama->judul }}</h2>
                            <p class="mt-4 mb-0 text-hero-news">{{ \Illuminate\Support\Str::limit(strip_tags($beritaUtama->isi), 200) }}</p>
                            <a href="{{ route('landing.publikasi.berita-detail', $beritaUtama->slug) }}" class="btn btn-hero-news rounded-2 px-2 mt-4">Lihat Selengkapnya</a>
                        </div>
                    </div>

                    <h4 class="mt-4 mb-4 text-cyan"><strong>Berita Terbaru</strong></h4>
                    <div class="row g-3">
                        @foreach($beritas->skip(1)->take(3) as $berita)
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100">
                                @if($berita->gambar)
                                    <img src="{{ Storage::url($berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ \Illuminate\Support\Str::limit($berita->judul, 50) }}</h5>
                                    <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100) }}</p>
                                    <p class="text-muted small mb-2">{{ $berita->created_at->format('H:i | d F Y') }}</p>
                                    <a href="{{ route('landing.publikasi.berita-detail', $berita->slug) }}" class="btn btn-teal rounded-2 px-2 btn-sm">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <h4 class="mt-4 mb-4 text-cyan"><strong>Berita Lainnya</strong></h4>
                    <div class="row g-1">
                        @foreach($beritas->skip(4) as $berita)
                        <div class="card border-0">
                            <div class="row mb-3 g-3">
                                <div class="col-4">
                                    @if($berita->gambar)
                                        <img src="{{ Storage::url($berita->gambar) }}" class="news-img" alt="{{ $berita->judul }}">
                                    @else
                                        <img src="{{ asset('fe_sicarsa/assets/b4.png') }}" class="news-img" alt="Berita">
                                    @endif
                                </div>
                                <div class="col-8 flex-column justify-content-between">
                                    <h5 class="fw-bold">{{ \Illuminate\Support\Str::limit($berita->judul, 60) }}</h5>
                                    <p class="text-news">{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 150) }}</p>
                                    <p class="text-muted small mb-2">{{ $berita->created_at->format('H:i | d F Y') }}</p>
                                    <a href="{{ route('landing.publikasi.berita-detail', $berita->slug) }}" class="btn btn-teal rounded-2 px-2">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if($beritas->hasPages())
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center gap-2 mt-5 mb-5">
                                {{ $beritas->links() }}
                            </ul>
                        </nav>
                    @endif
                @else
                    <div class="alert alert-info">
                        <p class="mb-0">Belum ada berita yang dipublikasikan.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

