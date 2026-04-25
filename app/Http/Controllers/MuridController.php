<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    // Tampilkan semua murid
    public function index()
    {
        $murids = Murid::latest()->get();
        return view('admin.murid.index', compact('murids'));
    }

    // Form tambah manual
    public function create()
    {
        return view('admin.murid.create');
    }

    // Simpan murid manual
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'umur' => 'required|integer',
            'no_hp' => 'required',
            'email' => 'required|email',
            'layanan' => 'required',
            'tipe_kelas' => 'required'
        ]);

        Murid::create($request->all());

        return redirect()->route('murid.index')
            ->with('success', 'Murid berhasil ditambahkan!');
    }

    // Edit
    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        return view('admin.murid.edit', compact('murid'));
    }

    // Update
   public function update(Request $request, $id)
{
   $request->validate([
    'tipe_kelas' => 'required',
    'status' => 'required|in:aktif,tidak_aktif,selesai',
], [
    'tipe_kelas.required' => 'Tipe kelas wajib dipilih.',
    'status.required' => 'Status wajib dipilih.',
    'status.in' => 'Status tidak valid.',
]);

    try {
        $murid = Murid::findOrFail($id);

       $murid->update([
    'nama_lengkap' => $request->nama_lengkap,
    'umur' => $request->umur,
    'no_hp' => $request->no_hp,
    'email' => $request->email,
    'layanan' => $request->layanan,
    'tipe_kelas' => $request->tipe_kelas,
    'status' => $request->status,
]);

        return redirect()->route('murid.index')
            ->with('success', 'Data murid berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan saat memperbarui data.');
    }
}


    // Hapus
    public function destroy($id)
    {
        Murid::findOrFail($id)->delete();

        return redirect()->route('murid.index')
            ->with('success', 'Murid dihapus!');
    }
}
