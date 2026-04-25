@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Edit Data Lokasi
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

        <form action="{{ route('admin.lokasi.update',$lokasi->id) }}"
              method="POST"
              class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text"
                   name="title"
                   value="{{ old('title', $lokasi->title) }}"
                   placeholder="Judul Lokasi"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <textarea name="description"
                      placeholder="Deskripsi"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                      rows="3">{{ old('description', $lokasi->description) }}</textarea>

            <textarea name="map_embed"
                      placeholder="Embed Map (iframe)"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                      rows="4">{{ old('map_embed', $lokasi->map_embed) }}</textarea>

            <input type="number"
                   name="sort_order"
                   value="{{ old('sort_order', $lokasi->sort_order) }}"
                   placeholder="Urutan"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <div class="flex items-center gap-2">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       {{ old('is_active', $lokasi->is_active) ? 'checked' : '' }}
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <span class="text-sm text-gray-600">Aktifkan Lokasi</span>
            </div>

            <div class="flex justify-between mt-4">
                <a href="{{ route('admin.lokasi.index') }}"
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
