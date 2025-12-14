<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing.index') }}">
            <img src="{{ asset('fe_sicarsa/assets/logo.png') }}" class="logo-img" alt="Logo Pondok">
            <span class="title">Pondok Pesantren Al-Falah</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('landing.index') ? 'active' : '' }}" href="{{ route('landing.index') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-1 {{ request()->routeIs('landing.tentang.*') ? 'active' : '' }}" 
                    href="#" id="tentangDropdown" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Tentang Kami
                        <i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="tentangDropdown">
                        <li><a class="dropdown-item" href="{{ route('landing.tentang.sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.tentang.visi-misi') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.tentang.pendiri-institusi') }}">Pendiri Institusi</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.tentang.keunggulan') }}">Keunggulan</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.tentang.fasilitas') }}">Fasilitas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-1 {{ request()->routeIs('landing.pembinaan.*') ? 'active' : '' }}" 
                    href="#" id="pembinaanDropdown" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Pembinaan Santri
                        <i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pembinaanDropdown">
                        <li><a class="dropdown-item" href="{{ route('landing.pembinaan.kegiatan-harian') }}">Kegiatan Harian</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pembinaan.kegiatan-tahunan') }}">Kegiatan Tahunan</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pembinaan.ekstrakurikuler') }}">Ekstrakurikuler</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pembinaan.pembelajaran') }}">Program Pembelajaran</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-1 {{ request()->routeIs('landing.pendidikan.*') ? 'active' : '' }}" 
                    href="#" id="pendidikanDropdown" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Pendidikan
                        <i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pendidikanDropdown">
                        <li><a class="dropdown-item" href="{{ route('landing.pendidikan.pondok-tahfidzul') }}">Pondok Tahfidzul Qur'an</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pendidikan.pondok-putra') }}">Pondok Putra</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pendidikan.pondok-putri') }}">Pondok Putri</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pendidikan.madrasah-diniyyah') }}">Madrasah Diniyyah</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pendidikan.madrasah-qiroati') }}">Madrasah Qiro'ati</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pendidikan.madrasah-ibtidaiyyah') }}">Madrasah Ibtidaiyyah</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pendidikan.madrasah-tsanawiyah') }}">Madrasah Tsanawiyyah</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.pendidikan.madrasah-aliyah') }}">Madrasah Aliyah</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-1 {{ request()->routeIs('landing.publikasi.*') ? 'active' : '' }}" 
                    href="#" id="publikasiDropdown" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                        Publikasi
                        <i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="publikasiDropdown">
                        <li><a class="dropdown-item" href="{{ route('landing.publikasi.berita') }}">Berita Pesantren</a></li>
                        <li><a class="dropdown-item" href="{{ route('landing.publikasi.galeri') }}">Galeri Pesantren</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
