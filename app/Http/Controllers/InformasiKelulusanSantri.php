<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiodataSantri;

class InformasiKelulusanSantri extends Controller
{
    public function index()
    {
        $biodata = BiodataSantri::where('user_id', auth()->id())
            ->with('pendaftaran')
            ->first();

        // Jika belum pernah daftar
        if (!$biodata || !$biodata->pendaftaran) {
            $status = 'belum';
        } else {
            $status = $biodata->pendaftaran->status; // diterima, pending, ditolak, dll
        }

        return view('santri.kelulusan', compact('biodata', 'status'));
    }

}
