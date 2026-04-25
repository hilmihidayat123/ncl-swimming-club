<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function pengumuman()
{
    $pengumuman = Pengumuman::latest()->get();
    return view('ncl.pengumuman', compact('pengumuman'));
}
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alert' => 'required',
            'judul_pengumuman' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'nomor_hp' => 'nullable|string|max:20'
        ]);

        Pengumuman::create($request->all());

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alert' => 'required',
            'judul_pengumuman' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'nomor_hp' => 'nullable|string|max:20'
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($request->all());

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}
