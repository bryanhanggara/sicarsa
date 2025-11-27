<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $periodes = Periode::with('riwayatPenerimaans')
            ->orderBy('tahun_periode_penerimaan', 'desc')
            ->paginate(15);
        
        return view('admin.periode.index', compact('periodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tahun_periode_penerimaan' => ['required', 'string', 'max:255', 'unique:periodes,tahun_periode_penerimaan'],
            'kuota_penerimaan' => ['required', 'integer', 'min:1'],
        ]);

        Periode::create($validated);

        return redirect()->route('admin.periode.index')
            ->with('success', 'Periode berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode): View
    {
        $periode->load('riwayatPenerimaans.admin');
        
        return view('admin.periode.show', compact('periode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode): View
    {
        return view('admin.periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode): RedirectResponse
    {
        $validated = $request->validate([
            'tahun_periode_penerimaan' => ['required', 'string', 'max:255', 'unique:periodes,tahun_periode_penerimaan,' . $periode->id],
            'kuota_penerimaan' => ['required', 'integer', 'min:1'],
        ]);

        $periode->update($validated);

        return redirect()->route('admin.periode.index')
            ->with('success', 'Periode berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode): RedirectResponse
    {
        // Check if periode has riwayat penerimaan
        if ($periode->riwayatPenerimaans()->count() > 0) {
            return redirect()->route('admin.periode.index')
                ->with('error', 'Periode tidak dapat dihapus karena sudah memiliki riwayat penerimaan.');
        }

        $periode->delete();

        return redirect()->route('admin.periode.index')
            ->with('success', 'Periode berhasil dihapus.');
    }
}
