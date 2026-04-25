@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Pengumuman</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-5">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="nama_alert" placeholder="Nama Alert" 
                   value="{{ old('nama_alert', $pengumuman->nama_alert) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="text" name="judul_pengumuman" placeholder="Judul Pengumuman" 
                   value="{{ old('judul_pengumuman', $pengumuman->judul_pengumuman) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="date" name="tanggal" 
                   value="{{ old('tanggal', $pengumuman->tanggal) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <textarea name="keterangan" rows="4" placeholder="Keterangan"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('keterangan', $pengumuman->keterangan) }}</textarea>

            <input type="text" name="nomor_hp" placeholder="Nomor HP"
                   value="{{ old('nomor_hp', $pengumuman->nomor_hp) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <div class="flex justify-between mt-4">
                <a href="{{ route('pengumuman.index') }}" 
                   class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg shadow-md transition-all duration-200">
                    Kembali
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md transition-all duration-200">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>

@endsection
