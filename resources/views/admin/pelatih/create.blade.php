@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Tambah Pelatih
        </h2>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded">
                <ul class="text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelatih.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4">
            @csrf

            <input type="text"
                   name="nama_pelatih"
                   placeholder="Nama Pelatih"
                   value="{{ old('nama_pelatih') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="text"
                   name="title"
                   placeholder="Title"
                   value="{{ old('title') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <textarea name="keterangan"
                      placeholder="Keterangan"
                      rows="3"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('keterangan') }}</textarea>

            <input type="file"
                   name="image"
                   class="w-full px-4 py-2 border rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">

            <input type="text"
                   name="nomor_hp"
                   placeholder="Nomor HP"
                   value="{{ old('nomor_hp') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <div class="flex justify-between mt-4">
                <a href="{{ route('pelatih.index') }}"
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
