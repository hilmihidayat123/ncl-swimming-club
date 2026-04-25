@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Data Murid</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4 shadow-sm">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('murid.update', $murid->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <input type="text" name="nama_lengkap"
                value="{{ old('nama_lengkap', $murid->nama_lengkap) }}"
                placeholder="Nama Lengkap"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">

            {{-- Umur --}}
            <input type="number" name="umur"
                value="{{ old('umur', $murid->umur) }}"
                placeholder="Umur"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">

            {{-- No HP --}}
            <input type="text" name="no_hp"
                value="{{ old('no_hp', $murid->no_hp) }}"
                placeholder="No HP"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">

            {{-- Email --}}
            <input type="email" name="email"
                value="{{ old('email', $murid->email) }}"
                placeholder="Email"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">

            {{-- Layanan --}}
            <input type="text" name="layanan"
                value="{{ old('layanan', $murid->layanan) }}"
                placeholder="Layanan"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">

            {{-- Tipe Kelas --}}
            <input type="text" name="tipe_kelas"
                value="{{ old('tipe_kelas', $murid->tipe_kelas) }}"
                placeholder="Tipe Kelas"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">

            {{-- Status --}}
            <select name="status"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                <option value="aktif" {{ old('status', $murid->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ old('status', $murid->status) == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                <option value="selesai" {{ old('status', $murid->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            {{-- Button --}}
            <div class="flex justify-between mt-4">
                <a href="{{ route('murid.index') }}"
                    class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg shadow-md">
                    Kembali
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md">
                    Update Data
                </button>
            </div>

        </form>

    </div>
</div>

@endsection