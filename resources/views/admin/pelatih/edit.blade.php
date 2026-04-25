@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Edit Pelatih
        </h2>

        {{-- ERROR VALIDATION --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4 shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelatih.update', $pelatih->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4">

            @csrf
            @method('PUT')

            <input type="text"
                   name="nama_pelatih"
                   value="{{ old('nama_pelatih', $pelatih->nama_pelatih) }}"
                   placeholder="Nama Pelatih"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="text"
                   name="title"
                   value="{{ old('title', $pelatih->title) }}"
                   placeholder="Title"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <textarea name="keterangan"
                      rows="3"
                      placeholder="Keterangan"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('keterangan', $pelatih->keterangan) }}</textarea>

            {{-- Current Image --}}
            @if($pelatih->image)
                <div>
                    <p class="text-sm text-gray-600 mb-2">Foto Saat Ini</p>
                    <img src="{{ asset('storage/' . $pelatih->image) }}"
                         class="w-32 h-32 object-cover rounded-lg shadow-md">
                </div>
            @endif

            <input type="file"
                   name="image"
                   class="w-full px-4 py-2 border rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">

            <input type="text"
                   name="nomor_hp"
                   value="{{ old('nomor_hp', $pelatih->nomor_hp) }}"
                   placeholder="Nomor HP"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <div class="flex justify-between mt-4">
                <a href="{{ route('pelatih.index') }}"
                   class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg shadow-md transition-all duration-200">
                    Kembali
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md transition-all duration-200">
                    Update Data
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
