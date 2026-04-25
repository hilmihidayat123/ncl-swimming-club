<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function frontend()
{
    $jadwals = Jadwal::latest()->get();
    return view('ncl.jadwal', compact('jadwals'));
}

    public function index()
{
    $jadwals = Jadwal::orderBy('day')
                     ->orderBy('start_time')
                     ->get();

    return view('admin.jadwal.index', compact('jadwals'));
}

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'coach_name' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'location' => 'required'
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')
                         ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'coach_name' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'location' => 'required'
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')
                         ->with('success', 'Jadwal berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal berhasil dihapus!');
    }
}