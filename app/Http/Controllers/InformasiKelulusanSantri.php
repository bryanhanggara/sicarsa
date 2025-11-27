<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiodataSantri;

class InformasiKelulusanSantri extends Controller
{
    public function index()
    {
        $biodata = BiodataSantri::where('user_id', auth()->id())->first();

        // Jika belum pernah daftar atau belum ada status penerimaan
        if (!$biodata || !$biodata->status_penerimaan) {
            $status = 'belum';
        } else {
            $status = $biodata->status_penerimaan; // diterima, ditolak
        }

        return view('santri.kelulusan', compact('biodata', 'status'));
    }

}
