<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use App\Models\Murid;

class PendaftarController extends Controller
{
    // Tampilkan form
    public function create()
    {
    return view('ncl.pendaftaran', [
        'kelas' => $request->kelas ?? null,
        'harga' => $request->harga ?? null
    ]);
}

    // Simpan data
   public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|max:255',
        'umur' => 'required|integer',
        'no_hp' => 'required',
        'email' => 'required|email',
        'layanan' => 'required|in:pemula,lanjutan,casis,atlet,kelas_malam',
        'tipe_kelas' => 'required|in:reguler,privat',
        'catatan' => 'required|max:255'
    ]);

    $pendaftar = Pendaftar::create([
        'nama_lengkap' => $request->nama_lengkap,
        'umur' => $request->umur,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'layanan' => $request->layanan,
        'tipe_kelas' => $request->tipe_kelas,
        'catatan' => $request->catatan,
        'tanggal_mendaftar' => now(),
        'status' => 'pending',
        'is_read' => 0
    ]);

    // Nomor admin WA
    $nomorAdmin = "6282184673030";

    // Pesan otomatis
    $pesan = urlencode(
        "Halo Admin NCL Swimming Club\n\n".
        "Ada pendaftaran baru:\n".
        "Nama: {$pendaftar->nama_lengkap}\n".
        "Umur: {$pendaftar->umur}\n".
        "No HP: {$pendaftar->no_hp}\n".
        "Email: {$pendaftar->email}\n".
        "Layanan: {$pendaftar->layanan}\n".
        "Tipe Kelas: {$pendaftar->tipe_kelas}\n".
        "Catatan: {$pendaftar->catatan}"
    );

    return redirect("https://wa.me/$nomorAdmin?text=$pesan");
}

    // Dashboard admin
    public function index()
    {
        $pendaftars = Pendaftar::latest()->get();

        // 🔥 Tandai semua pending yang belum dibaca sebagai sudah dibaca
        Pendaftar::where('status', 'pending')
            ->where('is_read', 0)
            ->update(['is_read' => 1]);

        return view('admin.pendaftar', compact('pendaftars'));
    }

    // Update status
   public function updateStatus($id, $status)
{
    $pendaftar = Pendaftar::findOrFail($id);

    if (!in_array($status, ['diterima', 'ditolak'])) {
        return redirect()->back();
    }

    $pendaftar->status = $status;
    $pendaftar->save();

    // Jika diterima
    if ($status === 'diterima') {

        $cekMurid = Murid::where('email', $pendaftar->email)->first();

        if (!$cekMurid) {
            Murid::create([
                'nama_lengkap' => $pendaftar->nama_lengkap,
                'umur' => $pendaftar->umur,
                'no_hp' => $pendaftar->no_hp,
                'email' => $pendaftar->email,
                'layanan' => $pendaftar->layanan,
                'tipe_kelas' => $pendaftar->tipe_kelas,
                'catatan' => $pendaftar->catatan,
                'status' => 'aktif'
            ]);
        }

        return redirect()->back()
            ->with('success', 'ACC berhasil! Murid sudah masuk ke daftar murid.');
    }

    // Jika ditolak
    return redirect()->back()
        ->with('success', 'Pendaftaran telah ditolak.');
}


}
