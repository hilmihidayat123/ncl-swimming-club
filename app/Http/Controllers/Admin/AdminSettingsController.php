<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminSettingsController extends Controller
{

    public function index()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.settings', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = auth()->guard('admin')->user();

        $request->validate([
            'name' => 'required|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('admins','email')->ignore($admin->id)
            ],
            'password' => 'nullable|min:6|confirmed'
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return back()->with('success','Pengaturan berhasil diperbarui');
    }

}