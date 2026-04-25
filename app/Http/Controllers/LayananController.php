<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    // Tampilkan Form
    public function create()
    {
        return view('ncl.layanan');
    }

    // Simpan dan redirect ke WhatsApp
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:100',
            'email' => 'required|email|max:100',
            'no_wa' => 'required|max:20',
            'pertanyaan' => 'required'
        ]);

        // Simpan ke database
        Layanan::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'kategori' => $request->kategori,
            'pertanyaan' => $request->pertanyaan,
            'status' => 'Masuk'
        ]);

        // Format pesan WhatsApp
        $pesan = "Halo Admin NCL, saya ingin bertanya nih..
Berikut adalah biodata saya:
Nama: ".$request->nama_lengkap."
Email: ".$request->email."
No WA: ".$request->no_wa."
Kategori: ".$request->kategori."

Pertanyaan:
".$request->pertanyaan;

        $nomorAdmin = "+62 8 21 8467 3030"; // GANTI dengan nomor admin

        $linkWA = "https://wa.me/".$nomorAdmin."?text=".urlencode($pesan);

        return redirect($linkWA);
    }
}
