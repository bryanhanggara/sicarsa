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


// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Biodata Santri Routes
    Route::get('/', [BiodataSantriController::class, 'index'])->name('biodata-santri.index');
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
    });

require __DIR__.'/auth.php';
