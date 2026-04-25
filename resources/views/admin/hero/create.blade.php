@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hero</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100/80 p-6 font-sans">

<div class="bg-white shadow-xl p-6 max-w-2xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-700">
            Tambah Hero
        </h2>
    </div>

    <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Title</label>
            <input type="text" name="title" required
                class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Subtitle</label>
            <textarea name="subtitle" rows="4"
                class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Button Text</label>
            <input type="text" name="button_text"
                class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Button Link</label>
            <input type="text" name="button_link"
                class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Image</label>
            <input type="file" name="image"
                class="w-full border shadow-sm px-3 py-2 text-sm file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active"
                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
            <span class="text-sm text-gray-600">Active</span>
        </div>

        {{-- BUTTON --}}
        <div class="flex justify-end gap-3 pt-4">

            <a href="{{ route('hero.index') }}"
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

</body>
</html>
@endsection
