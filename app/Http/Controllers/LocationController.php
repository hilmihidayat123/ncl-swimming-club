<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // ADMIN - List
    public function index()
    {
        $locations = Location::orderBy('sort_order')->get();
        return view('admin.lokasi.index', compact('locations'));
    }

    // ADMIN - Form tambah
    public function create()
    {
        return view('admin.lokasi.create');
    }

    // ADMIN - Simpan
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'map_embed' => 'required'
        ]);

        Location::create([
            'title' => $request->title,
            'description' => $request->description,
            'map_embed' => $request->map_embed,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('lokasi.index')
            ->with('success','Lokasi berhasil ditambahkan');
    }

    // ADMIN - Edit
    public function edit(Location $lokasi)
    {
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    // ADMIN - Update
    public function update(Request $request, Location $lokasi)
    {
        $lokasi->update([
            'title' => $request->title,
            'description' => $request->description,
            'map_embed' => $request->map_embed,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.lokasi.index')
            ->with('success','Lokasi berhasil diupdate');
    }

    // ADMIN - Hapus
    public function destroy(Location $lokasi)
    {
        $lokasi->delete();

        return redirect()->route('lokasi.index')
            ->with('success','Lokasi berhasil dihapus');
    }

    // FRONTEND
    public function frontend()
    {
        $locations = Location::where('is_active',1)
            ->orderBy('sort_order')
            ->get();

        return view('ncl.lokasi', compact('locations'));
    }
}
