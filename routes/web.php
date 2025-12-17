<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BiodataSantriController;
use App\Http\Controllers\InformasiKelulusanSantri;
use App\Http\Controllers\PembayaranSantriController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKelulusanController;
use App\Http\Controllers\Admin\AdminVerifikasiController;
use App\Http\Controllers\Admin\AdminPendaftaranController;
use App\Http\Controllers\Admin\AdminSantriDetailController;
use App\Http\Controllers\Admin\PeriodeController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\LandingPageController;


// Landing Page Route
Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');

// Tentang Kami Routes
Route::prefix('tentang')->name('landing.tentang.')->group(function () {
    Route::get('/sejarah', [LandingPageController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [LandingPageController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/pendiri-institusi', [LandingPageController::class, 'pendiriInstitusi'])->name('pendiri-institusi');
    Route::get('/keunggulan', [LandingPageController::class, 'keunggulan'])->name('keunggulan');
    Route::get('/fasilitas', [LandingPageController::class, 'fasilitas'])->name('fasilitas');
});

// Pembinaan Santri Routes
Route::prefix('pembinaan')->name('landing.pembinaan.')->group(function () {
    Route::get('/kegiatan-harian', [LandingPageController::class, 'kegiatanHarian'])->name('kegiatan-harian');
    Route::get('/kegiatan-tahunan', [LandingPageController::class, 'kegiatanTahunan'])->name('kegiatan-tahunan');
    Route::get('/ekstrakurikuler', [LandingPageController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
    Route::get('/pembelajaran', [LandingPageController::class, 'pembelajaran'])->name('pembelajaran');
});

// Pendidikan Routes
Route::prefix('pendidikan')->name('landing.pendidikan.')->group(function () {
    Route::get('/pondok-tahfidzul', [LandingPageController::class, 'pondokTahfidzul'])->name('pondok-tahfidzul');
    Route::get('/pondok-putra', [LandingPageController::class, 'pondokPutra'])->name('pondok-putra');
    Route::get('/pondok-putri', [LandingPageController::class, 'pondokPutri'])->name('pondok-putri');
    Route::get('/madrasah-diniyyah', [LandingPageController::class, 'madrasahDiniyyah'])->name('madrasah-diniyyah');
    Route::get('/madrasah-qiroati', [LandingPageController::class, 'madrasahQiroati'])->name('madrasah-qiroati');
    Route::get('/madrasah-ibtidaiyyah', [LandingPageController::class, 'madrasahIbtidaiyyah'])->name('madrasah-ibtidaiyyah');
    Route::get('/madrasah-tsanawiyah', [LandingPageController::class, 'madrasahTsanawiyah'])->name('madrasah-tsanawiyah');
    Route::get('/madrasah-aliyah', [LandingPageController::class, 'madrasahAliyah'])->name('madrasah-aliyah');
});

// Publikasi Routes
Route::prefix('publikasi')->name('landing.publikasi.')->group(function () {
    Route::get('/berita', [LandingPageController::class, 'berita'])->name('berita');
    Route::get('/berita/{slug}', [LandingPageController::class, 'beritaDetail'])->name('berita-detail');
    Route::get('/galeri', [LandingPageController::class, 'galeri'])->name('galeri');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Biodata Calon Santri Routes
    Route::get('/dashboard', [BiodataSantriController::class, 'index'])->name('biodata-santri.index');
    Route::post('/biodata-santri', [BiodataSantriController::class, 'store'])->name('biodata-santri.store');
    Route::get('/pembayaran', [PembayaranSantriController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran', [PembayaranSantriController::class, 'store'])->name('pembayaran.store');

    Route::get('/informasi-kelulusan', [InformasiKelulusanSantri::class, 'index'])
    ->name('santri.kelulusan');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
        Route::get('/verifikasi', [AdminVerifikasiController::class, 'index'])->name('verifikasi.index');
        Route::post('/verifikasi/approve', [AdminVerifikasiController::class, 'approve'])->name('verifikasi.approve');
        Route::get('/pendaftaran', [AdminPendaftaranController::class, 'index'])->name('pendaftaran.index');
        Route::get('/pendaftaran/admins', [AdminPendaftaranController::class, 'getAdmins'])->name('pendaftaran.admins');
        Route::post('/pendaftaran/process', [AdminPendaftaranController::class, 'processPenerimaan'])->name('pendaftaran.process');
        Route::get('/kelulusan', [AdminKelulusanController::class, 'index'])->name('kelulusan.index');
        Route::get('/kelulusan/{riwayatPenerimaan}', [AdminKelulusanController::class, 'show'])->name('kelulusan.show');
        Route::get('/santri/{biodataSantri}', [AdminSantriDetailController::class, 'show'])->name('santri.show');
        
        // Periode CRUD Routes
        Route::resource('periode', PeriodeController::class);
        
        // Berita CRUD Routes
        Route::resource('berita', AdminBeritaController::class)
            ->parameters(['berita' => 'berita']);
    });

require __DIR__.'/auth.php';
