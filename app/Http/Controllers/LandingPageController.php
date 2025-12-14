<?php

namespace App\Http\Controllers;

use App\Models\BeritaPesantren;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        $beritaTerbaru = BeritaPesantren::where('status', 'published')
            ->latest()
            ->take(6)
            ->get();

        return view('landing.index', [
            'beritaTerbaru' => $beritaTerbaru,
        ]);
    }

    // Tentang Kami
    public function sejarah(): View { return view('landing.tentang.sejarah'); }
    public function visiMisi(): View { return view('landing.tentang.visi-misi'); }
    public function pendiriInstitusi(): View { return view('landing.tentang.pendiri-institusi'); }
    public function keunggulan(): View { return view('landing.tentang.keunggulan'); }
    public function fasilitas(): View { return view('landing.tentang.fasilitas'); }

    // Pembinaan Santri
    public function kegiatanHarian(): View { return view('landing.pembinaan.k-harian'); }
    public function kegiatanTahunan(): View { return view('landing.pembinaan.k-tahunan'); }
    public function ekstrakurikuler(): View { return view('landing.pembinaan.ekstrakurikuler'); }
    public function pembelajaran(): View { return view('landing.pembinaan.pembelajaran'); }

    // Pendidikan
    public function pondokTahfidzul(): View { return view('landing.pendidikan.pondok-tahfidzul'); }
    public function pondokPutra(): View { return view('landing.pendidikan.pondok-putra'); }
    public function pondokPutri(): View { return view('landing.pendidikan.pondok-putri'); }
    public function madrasahDiniyyah(): View { return view('landing.pendidikan.madrasah-diniyyah'); }
    public function madrasahQiroati(): View { return view('landing.pendidikan.madrasah-qiroati'); }
    public function madrasahIbtidaiyyah(): View { return view('landing.pendidikan.madrasah-ibtidaiyyah'); }
    public function madrasahTsanawiyah(): View { return view('landing.pendidikan.madrasah-tsanawiyah'); }
    public function madrasahAliyah(): View { return view('landing.pendidikan.madrasah-aliyah'); }

    // Publikasi
    public function berita(): View 
    { 
        $beritas = BeritaPesantren::where('status', 'published')
            ->latest()
            ->paginate(9);
        return view('landing.publikasi.berita', compact('beritas')); 
    }
    public function beritaDetail($slug): View 
    { 
        $berita = BeritaPesantren::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
            
        $beritaLainnya = BeritaPesantren::where('status', 'published')
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(3)
            ->get();
        return view('landing.publikasi.berita-detail', compact('berita', 'beritaLainnya')); 
    }
    public function galeri(): View { return view('landing.publikasi.galeri'); }
}
