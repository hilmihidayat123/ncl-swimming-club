<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function index()
    {
        // Jika admin sudah ada, tidak boleh akses halaman register
        if (Admin::count() > 0) {
            return redirect()->route('admin.login')
                ->with('error', 'Registrasi admin sudah ditutup.');
        }

        return view('admin.register');
    }

    public function store(Request $request)
    {
        // Double check supaya tidak bisa bypass
        if (Admin::count() > 0) {
            return redirect()->route('admin.login')
                ->with('error', 'Admin sudah terdaftar.');
        }

        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.login')
            ->with('success', 'Admin berhasil dibuat. Silakan login.');
    }
}