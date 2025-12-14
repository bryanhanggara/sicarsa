<footer>
    <div class="container">
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
