<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('sort_order', 'asc')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga_1' => 'required|string|max:255',
            'harga_2' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        Kelas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga_1' => $request->harga_1,
            'harga_2' => $request->harga_2,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan 🚀');
    }

    public function edit(Kelas $kela)
    {
        return view('admin.kelas.edit', compact('kela'));
    }

    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga_1' => 'required|string|max:255',
            'harga_2' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        $kela->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga_1' => $request->harga_1,
            'harga_2' => $request->harga_2,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil diupdate 🔥');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil dihapus 🗑️');
    }
}