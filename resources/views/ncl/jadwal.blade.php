@extends('layouts.app')

@section('content')

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<section class="bg-gray-50 min-h-screen py-16">
<div class="max-w-6xl mx-auto px-6">

<!-- Title -->
 <div class="text-center mb-14">
 <h2 class="text-4xl font-bold text-blue-700 tracking-tight">
                Jadwal Latihan
            </h2>
            <p class="text-slate-500 mt-3 text-sm">
        Jadwal Resmi Latihan NCL Swimming Club
    </p>

    
</div>

<!-- Search -->
<div class="mb-10 flex justify-center">
<div class="relative w-full max-w-md">

<input 
type="text" 
id="searchJadwal"
placeholder="Cari kelas, pelatih, atau lokasi..."
class="w-full border border-gray-200 rounded-xl px-4 py-3 pl-10 focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm"
>

<div class="absolute left-3 top-3 text-gray-400">
    <svg xmlns="http://www.w3.org/2000/svg" 
        class="w-5 h-5" 
        fill="none" 
        viewBox="0 0 24 24" 
        stroke="currentColor">

        <path stroke-linecap="round" 
        stroke-linejoin="round" 
        stroke-width="2" 
        d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>

    </svg>
</div>

</div>
</div>

<!-- Grid Jadwal -->
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

@forelse($jadwals as $jadwal)

<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden jadwal-card">

<div class="p-6 space-y-4">

<!-- Hari + Waktu -->
<div class="flex items-center justify-between">

<span class="text-sm font-medium bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
{{ $jadwal->day }}
</span>

<span class="flex items-center text-sm text-gray-500 gap-1">

<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>

{{ $jadwal->start_time }} - {{ $jadwal->end_time }}

</span>

</div>

<!-- Judul -->
<h3 class="text-lg font-semibold text-gray-800">
{{ $jadwal->title }}
</h3>

<!-- Pelatih -->
<p class="flex items-center gap-2 text-gray-500 text-sm">

<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500"
fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

</svg>

Pelatih:
<span class="font-medium text-gray-700">
{{ $jadwal->coach_name }}
</span>

</p>

<!-- Lokasi -->
<p class="flex items-center gap-2 text-gray-500 text-sm">

<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500"
fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657A8 8 0 1117.657 16.657z"/>

<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

</svg>

Lokasi:
<span class="font-medium text-gray-700">
{{ $jadwal->location }}
</span>

</p>

</div>

</div>

@empty

<div class="col-span-3 text-center text-gray-500">
Belum ada jadwal tersedia.
</div>

@endforelse

</div>

</div>
</section>

@endsection
<script>

document.addEventListener("DOMContentLoaded", function(){

    const searchInput = document.getElementById("searchJadwal");
    const cards = document.querySelectorAll(".jadwal-card");

    searchInput.addEventListener("keyup", function(){

        const keyword = this.value.toLowerCase();

        cards.forEach(card => {

            const text = card.innerText.toLowerCase();

            if(text.includes(keyword)){
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }

        });

    });

});

</script>