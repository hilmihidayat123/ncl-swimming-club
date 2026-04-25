<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CtaController extends Controller
{
    public function index()
    {
        $ctas = Cta::orderBy('id', 'desc')->get();
        return view('admin.ctas.index', compact('ctas'));
    }

    public function create()
    {
        return view('admin.ctas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('cta', 'public');
        }

        Cta::create($data);

        return redirect()->route('admin.ctas.index')
            ->with('success', 'CTA berhasil ditambahkan');
    }

    public function edit(Cta $cta)
    {
        return view('admin.ctas.edit', compact('cta'));
    }

    public function update(Request $request, Cta $cta)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            if ($cta->image && Storage::disk('public')->exists($cta->image)) {
                Storage::disk('public')->delete($cta->image);
            }

            $data['image'] = $request->file('image')->store('cta', 'public');
        }

        $cta->update($data);

        return redirect()->route('admin.ctas.index')
            ->with('success', 'CTA berhasil diupdate');
    }

    public function destroy(Cta $cta)
    {
        if ($cta->image && Storage::disk('public')->exists($cta->image)) {
            Storage::disk('public')->delete($cta->image);
        }

        $cta->delete();

        return redirect()->route('admin.ctas.index')
            ->with('success', 'CTA berhasil dihapus');
    }
}
