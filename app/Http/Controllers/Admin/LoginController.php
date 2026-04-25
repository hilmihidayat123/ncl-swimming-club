<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // FORM LOGIN
    public function loginForm()
    {
        // jika belum ada admin, arahkan ke register
        if(!Admin::exists()){
            return redirect()->route('admin.register');
        }

        return view('admin.login');
    }

   

public function login(Request $request)
{
    // 🔍 cek dulu apakah admin ada
    if(Admin::count() == 0){
        return redirect()
            ->route('admin.register.form')
            ->with('error','Belum ada admin. Silakan buat akun admin dulu.');
    }

    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->with('error', 'Email atau password salah');
}

    // FORM REGISTER
    public function registerForm()
    {
        // jika admin sudah ada, tidak boleh register lagi
        if(Admin::exists()){
            return redirect()->route('admin.login');
        }

        return view('admin.register');
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        // jika admin sudah ada
        if(Admin::exists()){
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name'     => 'required|max:100',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|min:6'
        ]);

        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.login')
            ->with('success','Admin berhasil didaftarkan');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}