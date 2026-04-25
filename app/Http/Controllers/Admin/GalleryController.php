<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order', 'asc')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'nullable|string',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'image' => $imagePath,
            'keterangan' => $request->keterangan,
            'is_active' => $request->is_active,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery berhasil ditambahkan 🔥');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'nullable|string',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $imagePath = $request->file('image')->store('gallery', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->update([
            'title' => $request->title,
            'keterangan' => $request->keterangan,
            'is_active' => $request->is_active,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery berhasil diupdate 🚀');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery berhasil dihapus 🗑️');
    }
}
