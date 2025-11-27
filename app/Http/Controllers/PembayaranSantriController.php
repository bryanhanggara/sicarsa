<?php

namespace App\Http\Controllers;

use App\Models\BiodataSantri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PembayaranSantriController extends Controller
{
    /**
     * Display the santri payment information screen.
     */
    public function index(): View
    {
        $user = Auth::user();
        $biodata = $user->biodataSantri;
        
        // Check if biodata exists and is verified
        $isVerified = $biodata && $biodata->status === 'verified';
        $biaya = [
            [
                'jenis' => 'Pendaftaran',
                'khusus_mondok' => 50000,
                'mi_mondok' => 50000,
                'mts_mondok' => 50000,
                'ma_mondok' => 50000,
            ],
            [
                'jenis' => 'Infaq Bangunan',
                'khusus_mondok' => 800000,
                'mi_mondok' => 250000,
                'mts_mondok' => 800000,
                'ma_mondok' => 800000,
            ],
            [
                'jenis' => 'Peraga Qiroati',
                'khusus_mondok' => null,
                'mi_mondok' => null,
                'mts_mondok' => 100000,
                'ma_mondok' => 100000,
            ],
            [
                'jenis' => 'UKS Semester I',
                'khusus_mondok' => null,
                'mi_mondok' => null,
                'mts_mondok' => 155000,
                'ma_mondok' => 180000,
            ],
            [
                'jenis' => 'Tabungan Minimal Pertahun',
                'khusus_mondok' => 75000,
                'mi_mondok' => 50000,
                'mts_mondok' => 75000,
                'ma_mondok' => 75000,
            ],
            [
                'jenis' => 'Seragam Olahraga',
                'khusus_mondok' => null,
                'mi_mondok' => 125000,
                'mts_mondok' => 155000,
                'ma_mondok' => 185000,
            ],
            [
                'jenis' => 'Baju Batik',
                'khusus_mondok' => null,
                'mi_mondok' => 85000,
                'mts_mondok' => 90000,
                'ma_mondok' => 105000,
            ],
            [
                'jenis' => 'Kas Makan Pertahun',
                'khusus_mondok' => 400000,
                'mi_mondok' => 400000,
                'mts_mondok' => 400000,
                'ma_mondok' => 400000,
            ],
            [
                'jenis' => 'Syahriyah Pertahun',
                'khusus_mondok' => 100000,
                'mi_mondok' => 100000,
                'mts_mondok' => 100000,
                'ma_mondok' => 100000,
            ],
            [
                'jenis' => 'Almamater',
                'khusus_mondok' => 210000,
                'mi_mondok' => null,
                'mts_mondok' => 180000,
                'ma_mondok' => 210000,
            ],
            [
                'jenis' => 'Lemari',
                'khusus_mondok' => 625000,
                'mi_mondok' => 625000,
                'mts_mondok' => 625000,
                'ma_mondok' => 625000,
            ],
            [
                'jenis' => 'Seragam Sarung (3 Potong)',
                'khusus_mondok' => 250000,
                'mi_mondok' => null,
                'mts_mondok' => 250000,
                'ma_mondok' => 250000,
            ],
            [
                'jenis' => 'Londry (Tidak Wajib)',
                'khusus_mondok' => 130000,
                'mi_mondok' => 140000,
                'mts_mondok' => 130000,
                'ma_mondok' => 130000,
            ],
            [
                'jenis' => 'Kas Diniyah, Qiroati, & Asrama',
                'khusus_mondok' => 20000,
                'mi_mondok' => 20000,
                'mts_mondok' => 20000,
                'ma_mondok' => 20000,
            ],
            [
                'jenis' => 'Buku Panduan Ubudiyah',
                'khusus_mondok' => 20000,
                'mi_mondok' => null,
                'mts_mondok' => 20000,
                'ma_mondok' => 20000,
            ],
        ];

        $totalBiaya = [
            'khusus_mondok' => 2780000,
            'mi_mondok' => 1845000,
            'mts_mondok' => 3150000,
            'ma_mondok' => 3250000,
        ];

        $catatan = [
            'Biaya kos makan dan syahriyah khusus bagi santri yang menetap (mukim) di pondok.',
            'Bagi siswa yang berdomisili di luar desa Putak, diwajibkan mukim/menetap di pondok kecuali yang masih MI.',
        ];

        if (!$biodata) {
            $statusMessage = 'Silakan lengkapi biodata terlebih dahulu sebelum melakukan pembayaran.';
        } elseif (!$isVerified) {
            $statusMessage = 'Admin belum melakukan konfirmasi data diri anda, mohon tunggu sejenak untuk melakukan pembayaran.';
        } else {
            $statusMessage = null; // No message if verified
        }

        return view('pembayaran.index', compact('biaya', 'totalBiaya', 'catatan', 'statusMessage', 'isVerified', 'biodata'));
    }

    /**
     * Store payment proof.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'bukti_pembayaran' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ]);

        $user = Auth::user();
        $biodata = $user->biodataSantri;

        if (!$biodata || $biodata->status !== 'verified') {
            return redirect()->route('pembayaran.index')
                ->with('error', 'Anda tidak memiliki akses untuk melakukan pembayaran.');
        }

        // Delete old file if exists
        if ($biodata->bukti_pembayaran) {
            Storage::disk('public')->delete($biodata->bukti_pembayaran);
        }

        // Store new file
        $buktiPembayaran = $request->file('bukti_pembayaran')->store('pembayaran/bukti', 'public');

        // Update biodata
        $biodata->update([
            'bukti_pembayaran' => $buktiPembayaran,
        ]);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}


