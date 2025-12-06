<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiodataSantri;
use App\Models\RiwayatPenerimaan;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminPendaftaranController extends Controller
{
    /**
     * Display the registration data page by jenjang.
     */
    public function index(Request $request)
    {
        $jenjang = $request->query('jenjang', 'mi');
        
        // Validate jenjang
        if (!in_array($jenjang, ['mi', 'mts', 'ma'])) {
            $jenjang = 'mi';
        }

        $jenjangLabels = [
            'mi' => 'Madrasah Ibtidaiyyah',
            'mts' => 'Madrasah Tsanawiyyah',
            'ma' => 'Madrasah Aliyah',
        ];

        $jenjangLabel = $jenjangLabels[$jenjang];

        // Query biodata santri and filter by jenjang
        // Only show biodata that haven't been processed (status_penerimaan is null)
        $query = BiodataSantri::where('status','verified')
            ->where(function ($q) use ($jenjang) {
                $q->whereRaw('LOWER(tujuan_jenjang_pendidikan) LIKE ?', ['%' . $jenjang . '%'])
                  ->orWhereRaw('LOWER(tujuan_jenjang_pendidikan) LIKE ?', ['%' . $this->getJenjangFullName($jenjang) . '%']);
            });

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nik_calon_santri', 'like', "%{$search}%")
                  ->orWhere('tempat_lahir', 'like', "%{$search}%");
            });
        }

        // Paginate results
        $pendaftarans = $query->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        $admins = User::where('role', 'admin')->get(['id', 'name']);
        $periodes = Periode::orderBy('tahun_periode_penerimaan', 'desc')->get();

        return view('admin.pendaftaran.index', [
            'pendaftarans' => $pendaftarans,
            'jenjang' => $jenjang,
            'jenjangLabel' => $jenjangLabel,
            'search' => $request->query('search', ''),
            'admins' => $admins,
            'periodes' => $periodes,
        ]);
    }

    /**
     * Get full name of jenjang for matching.
     */
    private function getJenjangFullName(string $jenjang): string
    {
        $map = [
            'mi' => 'madrasah ibtidaiyyah',
            'mts' => 'madrasah tsanawiyah',
            'ma' => 'madrasah aliyah',
        ];

        return $map[$jenjang] ?? '';
    }

    /**
     * Get list of admin users for dropdown.
     */
    public function getAdmins()
    {
        $admins = User::where('role', 'admin')->get(['id', 'name']);
        return response()->json($admins);
    }

    /**
     * Process approval/rejection of registrations.
     */
    public function processPenerimaan(Request $request)
    {
        $request->validate([
            'admin_id' => 'required|exists:users,id',
            'periode_id' => 'required|exists:periodes,id',
            'pendaftaran_ids' => 'required|array',
            'pendaftaran_ids.*' => 'exists:biodata_santris,id',
            'action' => 'required|in:diterima,ditolak',
        ]);

        $adminId = $request->admin_id;
        $periodeId = $request->periode_id;
        $biodataIds = $request->pendaftaran_ids;
        $action = $request->action;

        // Validasi kuota jika action adalah diterima
        if ($action === 'diterima') {
            $periode = Periode::findOrFail($periodeId);
            $jumlahDiterima = count($biodataIds);
            
            // Hitung total yang sudah diterima di periode ini
            $sudahDiterima = BiodataSantri::whereHas('riwayatPenerimaan', function ($query) use ($periodeId) {
                    $query->where('periode_id', $periodeId);
                })
                ->where('status_penerimaan', 'diterima')
                ->count();

            // Validasi kuota
            if (($sudahDiterima + $jumlahDiterima) > $periode->kuota_penerimaan) {
                $kuotaTersisa = $periode->kuota_penerimaan - $sudahDiterima;
                return redirect()->back()
                    ->with('error', "Kuota penerimaan untuk periode {$periode->tahun_periode_penerimaan} tidak mencukupi. Kuota tersedia: {$kuotaTersisa}, yang dipilih: {$jumlahDiterima}")
                    ->withInput();
            }
        }

        // Count diterima and ditolak
        $totalDiterima = $action === 'diterima' ? count($biodataIds) : 0;
        $totalDitolak = $action === 'ditolak' ? count($biodataIds) : 0;

        // Create riwayat penerimaan
        $riwayat = RiwayatPenerimaan::create([
            'admin_id' => $adminId,
            'periode_id' => $periodeId,
            'total_diterima' => $totalDiterima,
            'total_ditolak' => $totalDitolak,
        ]);

        // Update status_penerimaan biodata and set riwayat_penerimaan_id
        foreach ($biodataIds as $biodataId) {
            BiodataSantri::where('id', $biodataId)->update([
                'status_penerimaan' => $action,
                'riwayat_penerimaan_id' => $riwayat->id_penerimaan,
            ]);
        }

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diupdate.');
    }
}

