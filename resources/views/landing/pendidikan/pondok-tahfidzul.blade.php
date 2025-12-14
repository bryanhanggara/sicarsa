@extends('landing.layout')

@section('title', 'Pondok Tahfidzul Qur\'an - Pondok Pesantren Al-Falah')

@php
    $subNavCss = 'pendidikan';
    $activeMenu = 'pondok-tahfidzul';
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
                                <span>Pondok Tahfidzul Qur'an</span>
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
                <h1 class="page-title">Pondok Tahfidzul Qur'an Pesantren Al-Falah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
                    </ol>
                </nav>
                <img src="{{ asset('fe_sicarsa/assets/pondoktahfidzul.png') }}"
                     alt="Pondok Tahfidzul" 
                     class="img-fluid content-image mb-4">
                <div class="content-text">
                    <p class="mb-3">
                        Lembaga ini memiliki peran penting dalam mengelola seluruh kegiatan santri putra dan putri yang mengikuti program <strong>Tahfidz Al-Qur'an di Pondok Pesantren Al-Falah Putak. </strong> Setiap santri yang tergabung dalam program ini mendapatkan pembinaan yang terarah agar mampu menghafal Al-Qur'an dengan baik dan benar sesuai dengan kaidah tajwid. Proses hafalan dilakukan secara bertahap dan berkelanjutan, dengan bimbingan langsung dari para ustaz dan ustazah yang berpengalaman di bidang tahfidz.
                    </p>
                    <p class="mb-3">
                        Selain fokus pada hafalan, lembaga ini juga memberikan perhatian terhadap <strong>pemahaman dan pengamalan isi Al-Qur'an</strong> dalam kehidupan sehari-hari. Santri diajarkan untuk memahami makna ayat yang dihafalkan sehingga tidak hanya menguasai secara lisan, tetapi juga mampu meneladani nilai-nilai yang terkandung di dalamnya. Dengan demikian, para santri diharapkan tumbuh menjadi pribadi yang berilmu, berakhlak mulia, dan memiliki kepekaan sosial yang tinggi.
                    </p>
                    <p class="mb-3">
                        Kegiatan pembelajaran di lembaga Tahfidz Al-Qur'an dilaksanakan dengan jadwal yang teratur, mulai dari setoran hafalan, murojaah, hingga pelatihan tartil dan tahsin. Santri juga didorong untuk mengikuti berbagai <strong>kompetisi tahfidz dan tilawah</strong> baik di tingkat lokal maupun nasional, sebagai upaya menumbuhkan semangat berprestasi dan meningkatkan rasa percaya diri. Fasilitas belajar yang nyaman serta suasana pesantren yang kondusif turut mendukung proses menghafal agar berjalan dengan optimal.
                    </p>
                    <p class="mb-0">
                        Melalui lembaga ini, Pondok Pesantren Al-Falah Putak berkomitmen untuk mencetak <strong>generasi penghafal Al-Qur'an</strong> yang tidak hanya fasih dalam bacaan, tetapi juga memahami esensinya sebagai pedoman hidup. Setiap santri dibina untuk menjadi teladan bagi masyarakat, membawa nilai-nilai Al-Qur'an dalam sikap, tutur kata, dan perbuatan. Dengan pembinaan yang berkesinambungan, lembaga ini menjadi salah satu pilar utama dalam mewujudkan visi pesantren untuk mencetak generasi Qurani yang berilmu dan berakhlak.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
