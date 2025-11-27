<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiodataSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminVerifikasiController extends Controller
{
    /**
     * Display unverified applicants per jenjang.
     */
    public function index(Request $request)
    {
        $jenjang = $request->query('jenjang', 'mi');

        if (!in_array($jenjang, ['mi', 'mts', 'ma'])) {
            $jenjang = 'mi';
        }

        $jenjangLabels = [
            'mi' => 'Madrasah Ibtidaiyyah',
            'mts' => 'Madrasah Tsanawiyyah',
            'ma' => 'Madrasah Aliyah',
        ];

        $search = $request->query('search', '');

        $santri = BiodataSantri::where('status', 'unverified')
            ->where(function ($query) use ($jenjang) {
                $query->whereRaw('LOWER(tujuan_jenjang_pendidikan) LIKE ?', ['%' . Str::lower($jenjang) . '%'])
                    ->orWhereRaw('LOWER(tujuan_jenjang_pendidikan) LIKE ?', ['%' . $this->getJenjangFullName($jenjang) . '%']);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nama_lengkap', 'like', "%{$search}%")
                        ->orWhere('nik_calon_santri', 'like', "%{$search}%")
                        ->orWhere('tempat_lahir', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('admin.verifikasi.index', [
            'santri' => $santri,
            'jenjang' => $jenjang,
            'jenjangLabel' => $jenjangLabels[$jenjang],
            'search' => $search,
        ]);
    }

    /**
     * Approve selected biodata as verified.
     */
    public function approve(Request $request)
    {
        $validated = $request->validate([
            'biodata_ids' => ['required', 'array'],
            'biodata_ids.*' => ['exists:biodata_santris,id'],
        ]);

        BiodataSantri::whereIn('id', $validated['biodata_ids'])
            ->update(['status' => 'verified']);

        return back()->with('success', 'Data santri berhasil diverifikasi.');
    }

    private function getJenjangFullName(string $jenjang): string
    {
        $map = [
            'mi' => 'madrasah ibtidaiyyah',
            'mts' => 'madrasah tsanawiyah',
            'ma' => 'madrasah aliyah',
        ];

        return $map[$jenjang] ?? 'mi';
    }
}
