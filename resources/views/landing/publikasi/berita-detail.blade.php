@extends('landing.layout')

@section('title', $berita->judul . ' - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'publikasi';
    $activeMenu = 'berita';
@endphp

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
                                <a href="{{ route('landing.publikasi.berita') }}">Berita Pesantren</a>
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
                <h1 class="page-title">{{ $berita->judul }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('landing.publikasi.berita') }}">Publikasi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita Detail</li>
                    </ol>
                </nav>
                @if($berita->gambar)
                <img src="{{ Storage::url($berita->gambar) }}"
                     alt="{{ $berita->judul }}" 
                     class="img-fluid content-image mb-4">
                @endif
                <div class="content-text">
                    <p class="text-muted small mb-3">
                        <i class="bi bi-calendar3 me-1"></i>{{ $berita->created_at->format('d F Y') }} | 
                        <i class="bi bi-person me-1"></i>{{ $berita->user->name }}
                    </p>
                    <div class="mb-4">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>
                </div>

                @if($beritaLainnya->count() > 0)
                <h4 class="mt-5 mb-4 text-cyan"><strong>Berita Lainnya</strong></h4>
                <div class="row g-3">
                    @foreach($beritaLainnya as $beritaLain)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            @if($beritaLain->gambar)
                                <img src="{{ Storage::url($beritaLain->gambar) }}" class="card-img-top" alt="{{ $beritaLain->judul }}" style="height: 150px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h6 class="card-title fw-bold">{{ \Illuminate\Support\Str::limit($beritaLain->judul, 50) }}</h6>
                                <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit(strip_tags($beritaLain->isi), 80) }}</p>
                                <a href="{{ route('landing.publikasi.berita-detail', $beritaLain->slug) }}" class="btn btn-sm btn-teal rounded-2 px-2">Baca</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection


