@extends('layouts.app')

@section('content')

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<section class="py-16 bg-slate-50">
    <div class="max-w-6xl mx-auto px-6">

        {{-- JUDUL --}}
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-blue-700 tracking-tight">
                Lokasi
            </h2>
            <p class="text-slate-500 mt-3 text-sm">
                Temukan lokasi latihan terbaik kami
            </p>
        </div>

       {{-- TAB LOKASI (UPGRADE) --}}
<div class="flex justify-center mb-12">
    <div class="flex flex-wrap gap-2 bg-white p-2 rounded-full shadow-md border">

        <button onclick="filterLokasi('all', this)" 
        class="tab-btn px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 
        bg-blue-600 text-white shadow">
            Semua
        </button>

        @foreach($locations as $loc)
        <button onclick="filterLokasi('loc{{ $loc->id }}', this)" 
        class="tab-btn px-5 py-2 rounded-full text-sm font-medium text-slate-600 
        hover:bg-blue-50 transition-all duration-300">
            {{ $loc->title }}
        </button>
        @endforeach

    </div>
</div>

        {{-- LIST LOKASI --}}
        @if($locations->count() > 0)

        <div class="space-y-12">

            @foreach($locations as $loc)
            <div class="lokasi-item loc{{ $loc->id }}">

                <div class="bg-white shadow-xl rounded-2xl overflow-hidden transition hover:shadow-2xl">

                    <div class="p-6">

                        <div class="flex items-center gap-3 mb-2">

                            <div class="bg-blue-100 p-2 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-blue-600"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243A8 8 0 1117.657 16.657z"/>

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>

                            <h3 class="text-2xl font-semibold text-slate-800">
                                {{ $loc->title }}
                            </h3>

                        </div>

                        <div class="w-16 h-1 bg-blue-500 rounded-full mb-3"></div>

                        @if($loc->description)
                        <p class="text-slate-600">
                            {{ $loc->description }}
                        </p>
                        @endif

                    </div>

                    {{-- MAP --}}
                    <div class="w-full h-[400px]">
                        {!! $loc->map_embed !!}
                    </div>

                </div>

            </div>
            @endforeach

        </div>

        @else

        <div class="text-center text-slate-500">
            Belum ada lokasi tersedia.
        </div>

        @endif

    </div>
</section>

{{-- SCRIPT --}}
<script>
function filterLokasi(kategori, el) {
    let items = document.querySelectorAll('.lokasi-item');

    items.forEach(item => {
        if (kategori === 'all') {
            item.style.display = 'block';
        } else {
            item.style.display = item.classList.contains(kategori) ? 'block' : 'none';
        }
    });

    // reset semua tab
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('bg-blue-600','text-white','shadow');
    });

    // aktifkan tab yg dipilih
    el.classList.add('bg-blue-600','text-white','shadow');
}
</script>

@endsection