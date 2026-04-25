<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use Illuminate\Http\Request;

class PelatihController extends Controller
{
    public function nclPelatih()
{
    $pelatih = Pelatih::latest()->get();
    return view('ncl.pelatih', compact('pelatih'));
}

    public function index()
    {
        $pelatih = Pelatih::latest()->get();
        return view('admin.pelatih.index', compact('pelatih'));
    }

    public function create()
    {
        return view('admin.pelatih.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelatih' => 'required',
            'title' => 'required',
            'keterangan' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nomor_hp' => 'nullable|string|max:20'

        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pelatih', 'public');
        }

        Pelatih::create($data);

        return redirect()->route('pelatih.index')
            ->with('success', 'Data pelatih berhasil ditambahkan.');
    }

    public function show(Pelatih $pelatih)
    {
        return view('admin.pelatih.show', compact('pelatih'));
    }

    public function edit(Pelatih $pelatih)
    {
        return view('admin.pelatih.edit', compact('pelatih'));
    }

    public function update(Request $request, Pelatih $pelatih)
    {
        $request->validate([
            'nama_pelatih' => 'required',
            'title' => 'required',
            'keterangan' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nomor_hp' => 'nullable|string|max:20'

        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pelatih', 'public');
        }

        $pelatih->update($data);

        return redirect()->route('pelatih.index')
            ->with('success', 'Data pelatih berhasil diupdate.');
    }

    public function destroy(Pelatih $pelatih)
    {
        $pelatih->delete();

        return redirect()->route('pelatih.index')
            ->with('success', 'Data pelatih berhasil dihapus.');
    }
}
