<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pondok Pesantren Salafiyah Al-Falah Putak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
            <a class="navbar-brand" href="{{ route('landing.index') }}">
                <img src="{{ asset('fe_sicarsa/assets/logo.png') }}" class="logo-img" alt="Logo Pondok">
                <span class="title">Pondok Pesantren Al-Falah</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('landing.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" 
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
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" 
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
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" 
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
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" 
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

    <section class="hero">
      <div class="section-container">
        <div class="col-lg-12 mb-3">
          <div class="social-icons d-flex gap-4 mb-3">
            <a href="https://www.facebook.com/ponpesalfalahputak/" aria-label="Facebook" target="_blank" rel="noopener"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/alfalah_putak" aria-label="Instagram" target="_blank" rel="noopener"><i class="bi bi-instagram"></i></a>
            <a href="https://www.tiktok.com/@alfalahputak" target="_blank" rel="noopener" aria-label="Tiktok"><i class="bi bi-tiktok"></i></a>
          </div>
          <h1>Pondok Pesantren Salafiyah <br>Al-Falah Putak</h1>
          <p class="text-hero mt-3 mb-4 pe-lg-5">
            Pondok Pesantren Al-Falah Putak menggabungkan kurikulum salafiyah, Kementerian Agama, dan Dinas Pendidikan untuk memberikan <br>pembelajaran yang lengkap kepada para santri. Melalui perpaduan ini, santri dibekali dengan pemahaman agama yang kuat sekaligus pengetahuan umum yang relevan, sehingga mampu berkembang secara seimbang dalam kehidupan sehari-hari maupun di masa depan.
          </p>
          <div class="d-flex flex-wrap gap-3 mb-5 mt-4">
            <a class="btn btn-primary" href="{{ route('register') }}">Daftar Sekarang</a>
            <a class="btn btn-secondary" href="#tentang">Selengkapnya</a>
          </div>
        </div>
      </div>
    </section>

    <div class="floating-stats-wrapper">
      <div class="floating-stats-container">
        <div class="container">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="stat-card">
                <img src="{{ asset('fe_sicarsa/assets/icon-hero.png') }}" class="stat-icon" alt="">
                <div>
                  <h3 class="stat-number">444</h3>
                  <p class="stat-label">Siswa</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <img src="{{ asset('fe_sicarsa/assets/icon-hero.png') }}" class="stat-icon" alt="">
                <div>
                  <h3 class="stat-number">40</h3>
                  <p class="stat-label">Pengajar</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <img src="{{ asset('fe_sicarsa/assets/icon-hero.png') }}" class="stat-icon" alt="">
                <div>
                  <h3 class="stat-number">12</h3>
                  <p class="stat-label">Staff</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section id="tentang" class="py-0">
      <div class="section-container">
        <div class="row align-items-center g-4">
          <div class="col-lg-6">
            <p class="accent-badge mb-3">About Us</p>
            <h2 class="section-title mb-3">Sekilas Tentang Pesantren</h2>
            <p class="mb-4 text-justify">
                Pondok Pesantren Salafiyah Al-Falah Putak adalah lembaga pendidikan Islam di Sumatra Selatan 
                yang mengintegrasikan kurikulum formal dan nonformal. Pesantren menyediakan pembelajaran kitab kuning 
                dan berbagai jenjang pendidikan. Terletak di lingkungan yang tenang dan asri, Al-Falah Putak menjadi 
                tempat yang tepat untuk memperdalam ilmu agama dan pengetahuan umum.
            </p>
            </div>
          <div class="col-lg-6">
            <div class="content-card">
              <div class="video-wrapper rounded-4 mb-3">
              <iframe 
                src="https://www.youtube.com/embed/2i9aufgz98Q?si=FtXPpB-pcTveHuWX" 
                title="YouTube video"
                allowfullscreen
                loading="lazy">
              </iframe>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="pendaftaran" class="color-section py-5">
        <div class="section-container">
          <div class="row g-5 align-items-center">
            <div class="col-lg-6">
              <p class="accent-badge mb-3">REGISTRATION</p>
              <h2 class="section-title mb-3">Pendaftaran Santri Baru Telah Dibuka, Ayo Bergabung!</h2>
              <p class="mb-4 text-muted">
                Raih kesempatan belajar ilmu agama dan umum di lingkungan yang islami dan disiplin. Bergabunglah bersama kami untuk membentuk generasi berilmu dan berakhlak mulia.
              </p>
              <div class="d-flex flex-wrap gap-3">
                <a class="btn btn-primary" href="{{ route('register') }}">
                  Daftar Sekarang
                </a>
                <a class="btn btn-poster" href="{{ asset('fe_sicarsa/assets/poster-pendaftaran.jpeg') }}" download>
                  Brosur Pendaftaran
                </a>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="accordion" id="registrationAccordion">
                <div class="accordion-item rounded-4 shadow-sm mb-3 border-0">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed rounded-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse1">
                      <i class="bi bi-file-earmark-check me-2"></i>
                      Alur dan Syarat Pendaftaran
                    </button>
                  </h2>
                  <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#registrationAccordion">
                    <div class="accordion-body">
                      <ul class="mb-0">
                        <li>Mengisi formulir pendaftaran online secara lengkap</li>
                        <li>Melengkapi dokumen yang diperlukan</li>
                        <li>Verifikasi dokumen secara offline/online</li>
                        <li>Menunggu pengumuman hasil seleksi</li>
                        <li>Daftar ulang & pembayaran</li>
                        <li>Membawa dokumen asli saat verifikasi</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="accordion-item rounded-4 shadow-sm mb-3 border-0">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed rounded-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse2">
                      <i class="bi bi-calendar3 me-2"></i>
                      Jadwal Pendaftaran dan Seleksi
                    </button>
                  </h2>
                  <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#registrationAccordion">
                    <div class="accordion-body">
                      <ul class="mb-0">
                        <li>Pendaftaran Online: 20 – 30 Oktober 2025</li>
                        <li>Pengumuman Pendaftaran: 5 November 2025</li>
                        <li>Daftar Ulang: 7 November 2025</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="accordion-item rounded-4 shadow-sm border-0">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed rounded-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse3">
                      <i class="bi bi-credit-card me-2"></i>
                      Biaya Pendidikan
                    </button>
                  </h2>
                  <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#registrationAccordion">
                    <div class="accordion-body">
                      <ul class="mb-0">
                        <li><strong>Biaya Pendaftaran:</strong> Rp 100.000</li>
                        <li><strong>Biaya Pembangunan:</strong> Rp 1.500.000</li>
                        <li><strong>SPP Bulanan:</strong> Rp 250.000</li>
                        <li><strong>Makan Harian:</strong> Rp 30.000</li>
                        <li><strong>Seragam:</strong> Rp 500.000</li>
                        <li>Beasiswa tersedia untuk santri berprestasi & kurang mampu</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5">
        <div class="section-container">
          <div class="mb-4">
            <p class="accent-badge mb-3">WHY CHOOSE US</p>
            <h2 class="section-title mb-3">Mengapa Kami Pilihan Terbaik?</h2>
            <p class="lead text-muted">
              Pesantren Al-Falah Putak menawarkan lingkungan belajar yang mendukung perkembangan spiritual dan intelektual santri dengan kurikulum terintegrasi dan tenaga pengajar berpengalaman.
            </p>
          </div>

          <div class="row g-4">
            <div class="col-md-6 col-lg-4">
              <div class="card keunggulan-card h-100 text-center p-3">
                  <img src="{{ asset('fe_sicarsa/assets/C1.png') }}" class="keunggulan-icon mt-4" alt="">
                  <h4 class="text-keunggulan">Pendidikan Religius</h4>
                  <p class="small mb-4">
                  Pesantren Al-Falah Putak memberikan pendidikan agama yang mendalam untuk membentuk santri beriman dan berakhlak mulia
                  </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card keunggulan-card h-100 text-center p-3">
                  <img src="{{ asset('fe_sicarsa/assets/C2.png') }}" class="keunggulan-icon mt-4" alt="">
                  <h4 class="text-keunggulan">Lingkungan Disiplin</h4>
                  <p class="small mb-4">
                  Santri dibiasakan hidup tertib dan taat aturan, menciptakan karakter yang tangguh dan bertanggung jawab
                  </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card keunggulan-card h-100 text-center p-3">
                  <img src="{{ asset('fe_sicarsa/assets/C3.png') }}" class="keunggulan-icon mt-4" alt="">
                  <h4 class="text-keunggulan">Fasilitas Optimal</h4>
                  <p class="small mb-4">
                  Sarana belajar dan tempat ibadah disediakan secara lengkap untuk menunjang kegiatan akademik dan keagamaan para santri 
                  </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card keunggulan-card h-100 text-center p-3">
                  <img src="{{ asset('fe_sicarsa/assets/C4.png') }}" class="keunggulan-icon mt-4" alt="">
                  <h4 class="text-keunggulan">Hafalan Qur'an</h4>
                  <p class="small mb-4">
                  Program tahfidz menjadi salah satu <br>
                  keunggulan dengan pembimbing <br>berkompeten di bidangnya
                  </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card keunggulan-card h-100 text-center p-3">
                  <img src="{{ asset('fe_sicarsa/assets/C5.png') }}" class="keunggulan-icon mt-4" alt="">
                  <h4 class="text-keunggulan">Kehidupan Terarah</h4>
                  <p class="small mb-4">
                  Kehidupan sehari-hari di pesantren dibangun dengan nilai disiplin, kemandirian, dan kebersamaan yang mendidik
                  </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card keunggulan-card h-100 text-center p-3">
                  <img src="{{ asset('fe_sicarsa/assets/C6.png') }}" class="keunggulan-icon mt-4" alt="">
                  <h4 class="text-keunggulan">Pengembangan Diri</h4>
                  <p class="small mb-4">
                  Santri dilatih untuk mengasah potensi <br> melalui kegiatan ekstrakurikuler dan pelatihan keterampilan
                  </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="color-section py-4">
        <div class="section-container">
          <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
            <div>
              <p class="accent-badge mb-3">OUR FACILITIES</p>
              <h2 class="section-title mb-1">Fasilitas Yang Kami Tawarkan</h2>
            </div>
            <a class="btn btn-primary" href="#">Lihat Selengkapnya</a>
          </div>
          <div class="row g-4">
            <div class="col-md-6 col-lg-4">
              <div class="facility-card h-100">
                <div class="facility-image-wrapper">
                  <img src="{{ asset('fe_sicarsa/assets/f-1.png') }}" alt="Asrama Santri Putri">
                </div>
                <div class="facility-body">
                  <h4>Asrama Santri Putri</h4>
                  <hr>
                  <p>
                    Asrama santri putri memiliki suasana yang hangat dan terjaga kebersihannya. Dilengkapi dengan fasilitas memadai dan lingkungan yang tertib, tempat ini membuat para santri betah beristirahat dan beraktivitas sehari-hari.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="facility-card h-100">
                <div class="facility-image-wrapper">
                  <img src="{{ asset('fe_sicarsa/assets/f-2.png') }}" alt="Gedung Madrasah">
                </div>
                <div class="facility-body">
                  <h4>Gedung Madrasah</h4>
                  <hr>
                  <p>
                    Gedung sekolah yang nyaman bagi santri putra dan santri putri, dengan ruang belajar yang bersih dan tertata rapi. Lingkungannya sejuk, aman, dan mendukung suasana belajar yang tenang serta menyenangkan.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="facility-card h-100">
                <div class="facility-image-wrapper">
                  <img src="{{ asset('fe_sicarsa/assets/f-3.png') }}" alt="Mushola Santri Putra">
                </div>
                <div class="facility-body">
                  <h4>Mushola Santri Putra</h4>
                  <hr>
                  <p>
                    Mushola santri putra dibuat dengan suasana yang tenang dan nyaman untuk beribadah. Tempatnya nyaman, bersih, serta dilengkapi dengan fasilitas wudhu yang tertata rapi agar kegiatan ibadah berjalan khusyuk.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5">
        <div class="section-container gallery-section">
          <div class="d-flex justify-content-between flex-wrap align-items-center mb-4">
            <div>
              <p class="accent-badge mb-3">OUR GALLERY</p>
              <h2 class="section-title mb-1">Dokumentasi Kegiatan Santri</h2>
            </div>
            <a class="btn btn-primary" href="{{ route('landing.publikasi.galeri') }}">Lihat Selengkapnya</a>
          </div>
          <div class="row g-3">
            <div class="col-lg-6">
              <div class="gallery-main-img rounded-2 overflow-hidden">
                <img src="{{ asset('fe_sicarsa/assets/gallery-1.png') }}" alt="Kegiatan besar">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row g-3">
                <div class="col-6">
                  <div class="gallery-card rounded-2 overflow-hidden">
                    <img src="{{ asset('fe_sicarsa/assets/gallery-2.png') }}" alt="foto">
                  </div>
                </div>
                <div class="col-6">
                  <div class="gallery-card rounded-2 overflow-hidden">
                    <img src="{{ asset('fe_sicarsa/assets/gallery-3.png') }}" alt="foto">
                  </div>
                </div>
                <div class="col-6">
                  <div class="gallery-card rounded-2 overflow-hidden">
                    <img src="{{ asset('fe_sicarsa/assets/gallery-4.png') }}" alt="foto">
                  </div>
                </div>
                <div class="col-6">
                  <div class="gallery-card rounded-2 overflow-hidden">
                    <img src="{{ asset('fe_sicarsa/assets/gallery-5.png') }}" alt="foto">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @if($beritaTerbaru->count() > 0)
      <section class="py-5 color-section">
        <div class="section-container">
          <div class="mb-4">
            <p class="accent-badge mb-2">BERITA TERBARU</p>
            <h2 class="section-title">Berita Pesantren</h2>
          </div>
          <div class="row g-4">
            @foreach($beritaTerbaru->take(3) as $berita)
            <div class="col-md-4">
              <div class="card h-100 border-0 shadow-sm">
                @if($berita->gambar)
                <img src="{{ Storage::url($berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ \Illuminate\Support\Str::limit($berita->judul, 50) }}</h5>
                  <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100) }}</p>
                  <a href="{{ route('landing.publikasi.berita-detail', $berita->slug) }}" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif

      <section class="py-5 color-section">
        <div class="section-container">
          <div class="mb-4">
            <p class="accent-badge mb-2">Feedback</p>
            <h2 class="section-title">Cerita Mereka Bersama Kami</h2>
          </div>
          <div class="row g-4">
            <div class="col-md-6">
              <div class="testimonial-card">
                <div class="testimonial-rating">
                  <div class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="score">5.0</div>
                </div>
                <h3 class="fw-bold mb-3 mt-4">Saya sangat bersyukur</h3>
                <p class="mb-5 text-muted fs-6">
                  Sebagai wali santri, saya sangat bersyukur anak saya belajar di Pesantren Al Falah Putak karena lingkungannya bersih dan para ustaz-ustazahnya sangat peduli. Anak saya kini lebih disiplin, mandiri, dan semangat dalam menuntut ilmu.
                </p>
                <div class="mt-5 testimonial-avatar">
                  <img src="{{ asset('fe_sicarsa/assets/ws-1.jpg') }}" alt="Siti Nur Hamimah" class="rounded-circle" />
                  <div>
                    <h5 class="mb-2 fw-bold">Siti Nur Hamimah</h5>
                    <small class="text-muted">Ibu Rumah Tangga, Wali Santri</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="testimonial-card">
                <div class="testimonial-rating">
                  <div class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                  </div>
                  <div class="score">4.0</div>
                </div>
                <h3 class="fw-bold mb-3 mt-4">Nyaman dan Berkesan</h3>
                <p class="mb-5 text-muted fs-6">
                  Belajar di Pesantren Al Falah Putak sangat menyenangkan karena lingkungan dan teman-temannya mendukung. Saya merasa lebih dekat dengan agama, lebih disiplin, dan termotivasi untuk terus belajar.
                </p>
                <div class="mt-5 testimonial-avatar">
                  <img src="{{ asset('fe_sicarsa/assets/ws-2.jpg') }}" alt="Slamet Musyafa'" class="rounded-circle" />
                  <div>
                    <h5 class="mb-2 fw-bold">Slamet Musyafa'</h5>
                    <small class="text-muted">Wiraswasta, Wali Santri</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5">
        <div class="section-container">
        <div class="help-section d-flex flex-column flex-lg-row align-items-center gap-4">
          <div>
            <p class="accent-badge mb-2">Need Help?</p>
            <h1 class="section-title mb-3">Butuh Bantuan? Kami Siap Membantu!</h1>
            <p class="fs-5 mb-4">
              Jika Anda memiliki pertanyaan atau ingin mengajak anak untuk bergabung, kami siap membantu dengan senang hati.
            </p>
            <a class="btn btn-primary" href="mailto:info@alfalahputak.sch.id">Hubungi Segera</a>
          </div>
          <img class="help-illustration img-fluid" src="{{ asset('fe_sicarsa/assets/G1.png') }}" alt="Ilustrasi Santri" />
        </div>
        </div>
      </section>

    <!-- Footer -->
    <footer>
        <div class="section-container">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="logo-circle"><img src="{{ asset('fe_sicarsa/assets/logo.png') }}" class="logo-img" alt="Logo Pondok"></div>
                        <div>
                            <h6 class="mb-0">Pondok Pesantren Al-Falah Putak</h6>
                        </div>
                    </div>
                    <p class="mb-3">
                        RF4P+F89, Putak, Kec. Gelumbang, Kabupaten Muara Enim, Sumatera Selatan 31171
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <a href="#" aria-label="WhatsApp"><i class="bi bi-telephone-fill footer-icon"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram footer-icon"></i></a>
                        <a href="#" aria-label="Email"><i class="bi bi-envelope-fill footer-icon"></i></a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <h6>Navigasi</h6>
                    <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('landing.tentang.sejarah') }}">Tentang Kami</a></li>
                    <li class="mb-2"><a href="{{ route('landing.pembinaan.kegiatan-harian') }}">Pembinaan Santri</a></li>
                    <li class="mb-2"><a href="{{ route('landing.pendidikan.pondok-tahfidzul') }}">Pendidikan</a></li>
                    <li class="mb-2"><a href="{{ route('landing.publikasi.berita') }}">Publikasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h6>Pendaftaran Santri Baru</h6>
                    <p class="mb-3">
                        Bergabunglah bersama kami dan jadilah bagian dari lingkungan pendidikan yang berkualitas di Pondok Pesantren Al-Falah Putak.
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-register">Daftar Sekarang</a>
                </div>
            </div>
        </div>
        <div class="border-top border-light mt-4 pt-3 text-center">
          <small>© 2025 Pondok Pesantren Al-Falah Putak. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.dropdown').forEach(function(dropdown) {
            dropdown.addEventListener('mouseenter', function() {
                const dropdownMenu = this.querySelector('.dropdown-menu');
                if (dropdownMenu) {
                    dropdownMenu.classList.add('show');
                }
            });
            dropdown.addEventListener('mouseleave', function() {
                const dropdownMenu = this.querySelector('.dropdown-menu');
                if (dropdownMenu) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
  </body>
</html>
