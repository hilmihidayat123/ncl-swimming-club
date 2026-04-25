<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::orderBy('sort_order', 'asc')->get();
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'experience_years' => 'nullable|integer',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $imagePath = $request->file('image')->store('about', 'public');

        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'experience_years' => $request->experience_years ?? 0,
            'is_active' => $request->is_active,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.about.index')
            ->with('success', 'Data About berhasil ditambahkan 🚀');
    }

    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'experience_years' => 'nullable|integer',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {

            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }

            $imagePath = $request->file('image')->store('about', 'public');
            $about->image = $imagePath;
        }

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'experience_years' => $request->experience_years ?? 0,
            'is_active' => $request->is_active,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.about.index')
            ->with('success', 'Data About berhasil diupdate 🔥');
    }

    public function destroy(About $about)
    {
        if ($about->image && Storage::disk('public')->exists($about->image)) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();

        return redirect()->route('admin.about.index')
            ->with('success', 'Data About berhasil dihapus 🗑️');
    }
}
