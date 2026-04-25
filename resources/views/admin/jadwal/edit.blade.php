@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Edit Jadwal
        </h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-5">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="title" placeholder="Judul Jadwal"
                   value="{{ old('title', $jadwal->title) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="text" name="coach_name" placeholder="Nama Pelatih"
                   value="{{ old('coach_name', $jadwal->coach_name) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input type="text" name="day" placeholder="Hari"
                   value="{{ old('day', $jadwal->day) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <div class="grid grid-cols-2 gap-4">
                <input type="time" name="start_time"
                       value="{{ old('start_time', $jadwal->start_time) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

                <input type="time" name="end_time"
                       value="{{ old('end_time', $jadwal->end_time) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <input type="text" name="location" placeholder="Lokasi"
                   value="{{ old('location', $jadwal->location) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

            <div class="flex justify-between mt-4">
                <a href="{{ route('jadwal.index') }}"
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