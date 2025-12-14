@extends('landing.layout')

@section('title', 'Madrasah Tsanawiyyah - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pendidikan';
    $activeMenu = 'madrasah-tsanawiyah';
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
                                <a href="{{ route('landing.pendidikan.madrasah-qiroati') }}">Madrasah Qiro'ati</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'madrasah-ibtidaiyyah' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <a href="{{ route('landing.pendidikan.madrasah-ibtidaiyyah') }}">Madrasah Ibtidaiyyah</a>
                            </li>
                            <li class="list-group-item {{ $activeMenu === 'madrasah-tsanawiyah' ? 'active' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                                <span>Madrasah Tsanawiyyah</span>
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
                <h1 class="page-title">Madrasah Tsanawiyyah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/MTS.png') }}"
                     alt="Madrasah Tsanawiyyah" 
                     class="img-fluid content-image mb-4">
                <div class="content-text">
                    <p class="mb-3">
                        Lembaga ini memiliki peran penting dalam mengelola dan mengawasi seluruh kegiatan pendidikan bagi para siswa-siswi yang sedang menempuh <strong>pendidikan formal tingkat menengah.</strong> Fokus utamanya adalah memastikan proses belajar mengajar berjalan dengan baik, terarah, dan sesuai dengan kurikulum yang telah ditetapkan oleh pemerintah maupun pihak pesantren.
                    </p>
                    <p class="mb-3">
                        Selain itu, lembaga ini juga berperan dalam membimbing siswa agar tidak hanya unggul secara akademik, tetapi juga memiliki sikap <strong>disiplin, tanggung jawab, serta semangat belajar</strong> yang tinggi. Pendekatan yang digunakan tidak hanya melalui pembelajaran di kelas, tetapi juga melalui kegiatan pembinaan karakter, keagamaan, dan sosial yang menunjang perkembangan kepribadian siswa secara menyeluruh.
                    </p>
                    <p class="mb-0">
                        Dengan dukungan tenaga pendidik yang kompeten dan lingkungan belajar yang kondusif, lembaga ini berkomitmen mencetak generasi muda yang berilmu, berakhlak, serta siap menghadapi tantangan di jenjang pendidikan berikutnya maupun dalam kehidupan bermasyarakat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
