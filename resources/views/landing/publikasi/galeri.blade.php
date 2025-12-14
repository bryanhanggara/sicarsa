@extends('landing.layout')

@section('title', 'Galeri Pesantren - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'publikasi';
    $activeMenu = 'galeri';
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
                                <span>Galeri Pesantren</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <h1 class="page-title">Galeri Pesantren</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Publikasi</li>
                    </ol>
                </nav>
                <p class="text-justify mb-4">Kegiatan santri di Pondok Pesantren Al-Falah Putak berlangsung dengan penuh semangat dan kebersamaan, menjadi wadah pembelajaran serta pengembangan karakter dalam suasana islami yang menyenangkan. Berikut ini adalah dokumentasi berbagai aktivitas santri dalam menimba ilmu dan memperkuat ukhuwah di lingkungan pesantren:</p>
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-target="all" href="#">Semua Foto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-target="santri" href="#">Kegiatan Santri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-target="wisuda" href="#">Wisuda Akbar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="gallery-scroll gallery-content" id="all">
                            <div class="row row-cols-1 row-cols-md-3 g-2">
                                @php
                                    $allImages = ['g-1.JPG', 'g-2.jpg', 'wisuda_1.JPG', 'wisuda_2.jpg', 'g-3.JPG', 'g-4.JPG', 'g-5.JPG', 'wisuda_3.jpg', 'g-6.jpg', 'g-7.jpg', 'g-8.jpg', 'g-9.jpg', 'wisuda_4.jpg', 'gk-10.jpg', 'gk-1.JPG', 'gk-2.JPG', 'gk-3.jpg', 'gk-4.JPG', 'gk-5.JPG', 'gk-6.JPG', 'gk-7.JPG', 'gk-8.jpg', 'gk-9.jpg', 'gk-11.jpg', 'gk-12.jpg', 'gk-13.jpg', 'gk-14.jpg', 'gk-16.jpg', 'g-10.jpg', 'g-11.jpg'];
                                @endphp
                                @foreach($allImages as $img)
                                <div class="col">
                                    <img src="{{ asset('fe_sicarsa/assets/' . $img) }}" alt="Galeri" class="card-img-gallery">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="gallery-scroll gallery-content d-none" id="santri">
                            <div class="row row-cols-1 row-cols-md-3 g-2">
                                @php
                                    $santriImages = ['gk-1.JPG', 'gk-2.JPG', 'gk-3.jpg', 'gk-4.JPG', 'gk-5.JPG', 'gk-6.JPG', 'gk-7.JPG', 'gk-8.jpg', 'gk-9.jpg', 'gk-10.jpg', 'gk-11.jpg', 'gk-12.jpg', 'gk-13.jpg', 'gk-14.jpg', 'gk-16.jpg'];
                                @endphp
                                @foreach($santriImages as $img)
                                <div class="col">
                                    <img src="{{ asset('fe_sicarsa/assets/' . $img) }}" alt="Kegiatan Santri" class="card-img-gallery">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="gallery-scroll gallery-content d-none" id="wisuda">
                            <div class="row row-cols-1 row-cols-md-3 g-2">
                                @php
                                    $wisudaImages = ['wisuda_1.JPG', 'wisuda_2.jpg', 'wisuda_3.jpg', 'wisuda_4.jpg'];
                                @endphp
                                @foreach($wisudaImages as $img)
                                <div class="col">
                                    <img src="{{ asset('fe_sicarsa/assets/' . $img) }}" alt="Wisuda" class="card-img-gallery">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.nav-link[data-target]').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = this.getAttribute('data-target');
            
            // Remove active from all nav links
            document.querySelectorAll('.nav-link[data-target]').forEach(function(l) {
                l.classList.remove('active');
            });
            this.classList.add('active');
            
            // Hide all gallery content
            document.querySelectorAll('.gallery-content').forEach(function(content) {
                content.classList.add('d-none');
            });
            
            // Show selected gallery content
            document.getElementById(target).classList.remove('d-none');
        });
    });
</script>
@endpush
