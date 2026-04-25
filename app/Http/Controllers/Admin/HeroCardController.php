<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroCard;
use Illuminate\Http\Request;

class HeroCardController extends Controller
{
    public function index()
    {
        $cards = HeroCard::latest()->get();
        return view('admin.herocard.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.herocard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alert' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        HeroCard::create([
            'alert' => $request->alert,
            'keterangan' => $request->keterangan,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.herocard.index')->with('success','Data berhasil ditambah');
    }

    public function edit($id)
    {
        $card = HeroCard::findOrFail($id);
        return view('admin.herocard.edit', compact('card'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alert' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $card = HeroCard::findOrFail($id);

        $card->update([
            'alert' => $request->alert,
            'keterangan' => $request->keterangan,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.herocard.index')->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $card = HeroCard::findOrFail($id);
        $card->delete();

        return redirect()->route('admin.herocard.index')->with('success','Data berhasil dihapus');
    }
}