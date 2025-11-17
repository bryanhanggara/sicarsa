<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBiodataSantriRequest;
use App\Models\BiodataSantri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BiodataSantriController extends Controller
{
    /**
     * Display the biodata form.
     */
    public function index(): View
    {
        $biodata = Auth::user()->biodataSantri;
        
        return view('biodata-santri.index', [
            'biodata' => $biodata,
        ]);
    }

    /**
     * Store biodata santri.
     */
    public function store(StoreBiodataSantriRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $data = $request->validated();

        // Handle file uploads - must be done before preserving existing files
        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($user->biodataSantri && $user->biodataSantri->foto) {
                Storage::disk('public')->delete($user->biodataSantri->foto);
            }
            $data['foto'] = $request->file('foto')->store('biodata/foto', 'public');
        }

        if ($request->hasFile('kartu_keluarga')) {
            // Delete old file if exists
            if ($user->biodataSantri && $user->biodataSantri->kartu_keluarga) {
                Storage::disk('public')->delete($user->biodataSantri->kartu_keluarga);
            }
            $data['kartu_keluarga'] = $request->file('kartu_keluarga')->store('biodata/dokumen', 'public');
        }

        if ($request->hasFile('akte_kelahiran')) {
            // Delete old file if exists
            if ($user->biodataSantri && $user->biodataSantri->akte_kelahiran) {
                Storage::disk('public')->delete($user->biodataSantri->akte_kelahiran);
            }
            $data['akte_kelahiran'] = $request->file('akte_kelahiran')->store('biodata/dokumen', 'public');
        }

        if ($request->hasFile('surat_pernyataan_santri')) {
            // Delete old file if exists
            if ($user->biodataSantri && $user->biodataSantri->surat_pernyataan_santri) {
                Storage::disk('public')->delete($user->biodataSantri->surat_pernyataan_santri);
            }
            $data['surat_pernyataan_santri'] = $request->file('surat_pernyataan_santri')->store('biodata/dokumen', 'public');
        }

        if ($request->hasFile('kartu_indonesia_pintar')) {
            // Delete old file if exists
            if ($user->biodataSantri && $user->biodataSantri->kartu_indonesia_pintar) {
                Storage::disk('public')->delete($user->biodataSantri->kartu_indonesia_pintar);
            }
            $data['kartu_indonesia_pintar'] = $request->file('kartu_indonesia_pintar')->store('biodata/dokumen', 'public');
        }

        $data['user_id'] = $user->id;

        // Set status to unverified if creating new biodata (not updating)
        if (!$user->biodataSantri) {
            $data['status'] = 'unverified';
        } else {
            // Preserve status when updating (don't reset to unverified)
            if (!isset($data['status'])) {
                $data['status'] = $user->biodataSantri->status ?? 'unverified';
            }
        }

        // Preserve existing file paths if no new file is uploaded
        if ($user->biodataSantri) {
            if (!isset($data['foto']) && $user->biodataSantri->foto) {
                $data['foto'] = $user->biodataSantri->foto;
            }
            if (!isset($data['kartu_keluarga']) && $user->biodataSantri->kartu_keluarga) {
                $data['kartu_keluarga'] = $user->biodataSantri->kartu_keluarga;
            }
            if (!isset($data['akte_kelahiran']) && $user->biodataSantri->akte_kelahiran) {
                $data['akte_kelahiran'] = $user->biodataSantri->akte_kelahiran;
            }
            if (!isset($data['surat_pernyataan_santri']) && $user->biodataSantri->surat_pernyataan_santri) {
                $data['surat_pernyataan_santri'] = $user->biodataSantri->surat_pernyataan_santri;
            }
            if (!isset($data['kartu_indonesia_pintar']) && $user->biodataSantri->kartu_indonesia_pintar) {
                $data['kartu_indonesia_pintar'] = $user->biodataSantri->kartu_indonesia_pintar;
            }
        }

        // Update or create biodata
        $biodata = BiodataSantri::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        // Refresh the relationship to ensure fresh data
        $user->refresh();

        return redirect()->route('biodata-santri.index')
            ->with('success', 'Biodata berhasil disimpan.');
    }
}
