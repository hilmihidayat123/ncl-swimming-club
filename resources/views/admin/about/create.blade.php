@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gray-100/80 p-6 font-sans">

    <div class="bg-white shadow-xl p-6 max-w-2xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-700">
                Tambah About
            </h2>
        </div>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 shadow-sm">
                <ul class="text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.about.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4">

            @csrf

            {{-- TITLE --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Title</label>
                <input type="text"
                       name="title"
                       required
                       class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            {{-- DESCRIPTION --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                <textarea name="description"
                          rows="4"
                          required
                          class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"></textarea>
            </div>

            {{-- IMAGE --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Image</label>
                <input type="file"
                       name="image"
                       required
                       class="w-full border shadow-sm px-3 py-2 text-sm file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
            </div>

            {{-- EXPERIENCE --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Experience Years</label>
                <input type="number"
                       name="experience_years"
                       class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            {{-- SORT ORDER --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Sort Order</label>
                <input type="number"
                       name="sort_order"
                       value="0"
                       class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            {{-- ACTIVE --}}
            <div class="flex items-center gap-2">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       class="h-4 w-4 text-blue-600 border-gray-300">
                <span class="text-sm text-gray-600">Aktifkan About</span>
            </div>

            {{-- BUTTONS --}}
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('admin.about.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 shadow text-sm transition duration-200">
                    Kembali
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 shadow text-sm transition duration-200">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
