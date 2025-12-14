@extends('landing.layout')

@section('title', 'Madrasah Ibtidaiyyah - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pendidikan';
    $activeMenu = 'madrasah-ibtidaiyyah';
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
                                <span>Madrasah Ibtidaiyyah</span>
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
                <h1 class="page-title">Madrasah Ibtidaiyah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/MI.png') }}"
                     alt="Madrasah Ibtidaiyah" 
                     class="img-fluid content-image mb-4">
                <div class="content-text">
                    <p class="mb-3">
                        Lembaga ini berperan penting dalam mengatur dan menyelenggarakan proses pendidikan bagi seluruh siswa-siswi yang sedang menempuh <strong>pendidikan formal di tingkat dasar</strong>. Fokus utamanya adalah memastikan bahwa setiap peserta didik mendapatkan layanan pendidikan yang merata, berkualitas, dan sesuai dengan kurikulum yang telah ditetapkan oleh pemerintah.
                    </p>
                    <p class="mb-3">
                        Selain menjalankan fungsi administratif, lembaga ini juga berkomitmen untuk menciptakan lingkungan belajar yang <strong>aman, nyaman, dan mendukung</strong> perkembangan karakter anak. Melalui kegiatan pembelajaran yang interaktif dan pembinaan yang berkelanjutan, siswa diharapkan mampu mengembangkan potensi akademik maupun kepribadian secara seimbang.
                    </p>
                    <p class="mb-0">
                        Tidak hanya itu, lembaga ini turut bekerja sama dengan guru, orang tua, dan masyarakat dalam membangun sinergi pendidikan yang holistik. Dengan dukungan berbagai pihak, pendidikan dasar diharapkan menjadi pondasi yang kuat bagi anak-anak dalam menghadapi jenjang pendidikan berikutnya dan tantangan kehidupan di masa depan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
