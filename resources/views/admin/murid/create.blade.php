@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah Murid</h2>

        <form action="{{ route('murid.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama --}}
            <div>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                @error('nama_lengkap')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Umur --}}
            <div>
                <input type="number" name="umur" value="{{ old('umur') }}" placeholder="Umur"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                @error('umur')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- No HP --}}
            <div>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="No HP"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                @error('no_hp')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Layanan --}}
            <div>
                <input type="text" name="layanan" value="{{ old('layanan') }}" placeholder="Layanan"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                @error('layanan')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tipe Kelas --}}
            <div>
                <input type="text" name="tipe_kelas" value="{{ old('tipe_kelas') }}" placeholder="Tipe Kelas"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                @error('tipe_kelas')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <select name="status"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak_aktif" {{ old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button --}}
            <div class="flex justify-between mt-4">
                <a href="{{ route('murid.index') }}"
                    class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg shadow-md">
                    Kembali
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>

@endsection