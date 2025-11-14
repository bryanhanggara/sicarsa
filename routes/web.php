<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BiodataSantriController;
use App\Http\Controllers\PembayaranSantriController;


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
});

require __DIR__.'/auth.php';
