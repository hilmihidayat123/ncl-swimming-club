@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah Pengumuman</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pengumuman.store') }}" method="POST" class="space-y-4">
            @csrf

            <input type="text" name="nama_alert" placeholder="Nama Alert" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="text" name="judul_pengumuman" placeholder="Judul Pengumuman" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="date" name="tanggal" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <textarea name="keterangan" rows="4" placeholder="Keterangan" 
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>

            <input type="text" name="nomor_hp" placeholder="Nomor HP" 
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <div class="flex justify-between mt-4">
                <a href="{{ route('pengumuman.index') }}" 
                   class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg shadow-md transition-all duration-200">
                    Kembali
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md transition-all duration-200">
                    Simpan
                </button>
            </div>
        </form>

    </div>
</div>

@endsection
