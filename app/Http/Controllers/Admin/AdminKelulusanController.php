<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPenerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminKelulusanController extends Controller
{
    /**
     * Display riwayat penerimaan per jenjang.
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

        // Query riwayat penerimaan yang memiliki detail dengan biodata sesuai jenjang
        $query = RiwayatPenerimaan::with(['admin', 'details.biodataSantri'])
            ->whereHas('details', function ($detailQ) use ($jenjang) {
                $detailQ->whereHas('biodataSantri', function ($q) use ($jenjang) {
                    $q->where(function ($subQ) use ($jenjang) {
                        $subQ->whereRaw('LOWER(tujuan_jenjang_pendidikan) LIKE ?', ['%' . Str::lower($jenjang) . '%'])
                             ->orWhereRaw('LOWER(tujuan_jenjang_pendidikan) LIKE ?', ['%' . $this->getJenjangFullName($jenjang) . '%']);
                    });
                });
            });

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('admin', function ($adminQ) use ($search) {
                    $adminQ->where('name', 'like', "%{$search}%");
                });
            });
        }

        // Paginate results
        $riwayat = $query->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('admin.kelulusan.index', [
            'riwayat' => $riwayat,
            'jenjang' => $jenjang,
            'jenjangLabel' => $jenjangLabel,
            'search' => $request->query('search', ''),
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
     * Display detail riwayat penerimaan.
     */
    public function show(RiwayatPenerimaan $riwayatPenerimaan, Request $request)
    {
        $riwayatPenerimaan->load([
            'admin',
            'details.biodataSantri'
        ]);

        // Get jenjang from first detail's biodata (for breadcrumb/filter)
        $jenjang = 'mi';
        $jenjangLabels = [
            'mi' => 'Madrasah Ibtidaiyyah',
            'mts' => 'Madrasah Tsanawiyyah',
            'ma' => 'Madrasah Aliyah',
        ];

        if ($riwayatPenerimaan->details->isNotEmpty()) {
            $firstBiodata = $riwayatPenerimaan->details->first()->biodataSantri ?? null;
            if ($firstBiodata && $firstBiodata->tujuan_jenjang_pendidikan) {
                $tujuan = Str::lower($firstBiodata->tujuan_jenjang_pendidikan);
                if (Str::contains($tujuan, 'mi') || Str::contains($tujuan, 'ibtidaiyyah')) {
                    $jenjang = 'mi';
                } elseif (Str::contains($tujuan, 'mts') || Str::contains($tujuan, 'tsanawiyah')) {
                    $jenjang = 'mts';
                } elseif (Str::contains($tujuan, 'ma') || Str::contains($tujuan, 'aliyah')) {
                    $jenjang = 'ma';
                }
            }
        }

        $jenjangLabel = $jenjangLabels[$jenjang];

        // Search functionality
        $search = $request->query('search', '');
        $details = $riwayatPenerimaan->details;

        if ($search) {
            $details = $details->filter(function ($detail) use ($search) {
                $biodata = $detail->biodataSantri ?? null;
                if (!$biodata) return false;
                
                return Str::contains(Str::lower($biodata->nama_lengkap ?? ''), Str::lower($search))
                    || Str::contains($biodata->nik_calon_santri ?? '', $search)
                    || Str::contains(Str::lower($biodata->tempat_lahir ?? ''), Str::lower($search));
            });
        }

        return view('admin.kelulusan.show', [
            'riwayat' => $riwayatPenerimaan,
            'details' => $details,
            'jenjang' => $jenjang,
            'jenjangLabel' => $jenjangLabel,
            'search' => $search,
        ]);
    }
}

