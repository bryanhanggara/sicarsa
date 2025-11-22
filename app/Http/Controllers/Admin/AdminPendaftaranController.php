<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\RiwayatPenerimaan;
use App\Models\DetailRiwayatPenerimaan;
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

        // Query pendaftaran with biodataSantri relationship and filter by jenjang
        // Only show pendaftaran that haven't been processed (status is null)
        $query = Pendaftaran::with('biodataSantri')
            ->whereNull('status')
            ->whereHas('biodataSantri', function ($q) use ($jenjang) {
                $q->where(function ($subQ) use ($jenjang) {
                    $subQ->whereRaw('LOWER(tujuan_jenjang_pendidikan) LIKE ?', ['%' . $jenjang . '%'])
                         ->orWhereRaw('LOWER(tujuan_jenjang_pendidikan) LIKE ?', ['%' . $this->getJenjangFullName($jenjang) . '%']);
                });
            });

        // Search functionality - search through biodataSantri relationship
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('biodataSantri', function ($q) use ($search) {
                $q->where(function ($subQ) use ($search) {
                    $subQ->where('nama_lengkap', 'like', "%{$search}%")
                         ->orWhere('nik_calon_santri', 'like', "%{$search}%")
                         ->orWhere('tempat_lahir', 'like', "%{$search}%");
                });
            });
        }

        // Paginate results
        $pendaftarans = $query->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        $admins = User::where('role', 'admin')->get(['id', 'name']);

        return view('admin.pendaftaran.index', [
            'pendaftarans' => $pendaftarans,
            'jenjang' => $jenjang,
            'jenjangLabel' => $jenjangLabel,
            'search' => $request->query('search', ''),
            'admins' => $admins,
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
            'pendaftaran_ids' => 'required|array',
            'pendaftaran_ids.*' => 'exists:pendaftarans,id',
            'action' => 'required|in:diterima,ditolak',
        ]);

        $adminId = $request->admin_id;
        $pendaftaranIds = $request->pendaftaran_ids;
        $action = $request->action;

        // Count diterima and ditolak
        $totalDiterima = $action === 'diterima' ? count($pendaftaranIds) : 0;
        $totalDitolak = $action === 'ditolak' ? count($pendaftaranIds) : 0;

        // Create riwayat penerimaan
        $riwayat = RiwayatPenerimaan::create([
            'admin_id' => $adminId,
            'total_diterima' => $totalDiterima,
            'total_ditolak' => $totalDitolak,
        ]);

        // Update status pendaftaran and create detail
        foreach ($pendaftaranIds as $pendaftaranId) {
            Pendaftaran::where('id', $pendaftaranId)->update([
                'status' => $action,
            ]);

            DetailRiwayatPenerimaan::create([
                'riwayat_penerimaan_id' => $riwayat->id_penerimaan,
                'id_pendaftaran' => $pendaftaranId,
            ]);
        }

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diupdate.');
    }
}

