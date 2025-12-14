<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaPesantren;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $beritas = BeritaPesantren::with('user')
            ->latest()
            ->paginate(15);
        
        return view('admin.berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['user_id'] = Auth::id();

        BeritaPesantren::create($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BeritaPesantren $berita): View
    {
        $berita->load('user');
        
        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BeritaPesantren $berita): View
    {
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BeritaPesantren $berita): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        } else {
            // Preserve existing image if no new image uploaded
            unset($validated['gambar']);
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeritaPesantren $berita): RedirectResponse
    {
        // Delete image if exists
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
