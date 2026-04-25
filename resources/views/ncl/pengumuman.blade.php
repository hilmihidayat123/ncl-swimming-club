@extends('layouts.app')

@section('content')

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <title>Pengumuman</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<section class="py-20 min-h-screen bg-white"
style="background: linear-gradient(180deg, #f8fafc, #ffffff);">

    <div class="max-w-4xl mx-auto px-6">

        {{-- JUDUL --}}
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-blue-700 tracking-tight">
                Pengumuman
            </h2>
            <p class="text-slate-500 mt-3">
                Informasi resmi dan update kegiatan NCL Swimming Club
            </p>
        </div>
        {{-- TAB FILTER WAKTU --}}
<div class="flex justify-center mb-10">
    <div class="flex gap-2 bg-white p-2 rounded-full shadow border">

        <button onclick="filterWaktu('all', this)" 
        class="tab-waktu px-4 py-2 rounded-full text-sm font-medium bg-blue-600 text-white shadow">
            Semua
        </button>

        <button onclick="filterWaktu('today', this)" 
        class="tab-waktu px-4 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            Hari Ini
        </button>

        <button onclick="filterWaktu('3day', this)" 
        class="tab-waktu px-4 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            3 Hari
        </button>

        <button onclick="filterWaktu('7day', this)" 
        class="tab-waktu px-4 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            7 Hari
        </button>

        <button onclick="filterWaktu('30day', this)" 
        class="tab-waktu px-4 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            1 Bulan
        </button>

    </div>
</div>

        @forelse($pengumuman as $item)

            @php
                $border = match($item->nama_alert) {
                    'success' => 'border-green-500',
                    'danger' => 'border-red-500',
                    'warning' => 'border-yellow-500',
                    'info' => 'border-blue-500',
                    default => 'border-gray-300'
                };

                $badge = match($item->nama_alert) {
                    'success' => 'bg-green-100 text-green-700',
                    'danger' => 'bg-red-100 text-red-700',
                    'warning' => 'bg-yellow-100 text-yellow-700',
                    'info' => 'bg-blue-100 text-blue-700',
                    default => 'bg-gray-100 text-gray-600'
                };

                $top = match($item->nama_alert) {
                    'success' => 'bg-green-400',
                    'danger' => 'bg-red-400',
                    'warning' => 'bg-yellow-400',
                    'info' => 'bg-blue-400',
                    default => 'bg-gray-300'
                };
            @endphp

            {{-- CARD --}}
           <div class="pengumuman-item relative bg-white border {{ $border }}
p-7 rounded-2xl shadow-sm mb-8
transition duration-300 hover:shadow-lg hover:-translate-y-1"
data-date="{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}">

                {{-- GARIS ATAS --}}
                <div class="absolute top-0 left-0 w-full h-1.5 bg-blue-500 rounded-t-2xl"></div>

                {{-- HEADER --}}
                <div class="flex justify-between items-start mb-3">

                    <div>
                        <h3 class="text-xl font-semibold text-slate-800 leading-tight">
                            {{ $item->judul_pengumuman }}
                        </h3>

                        <span class="inline-block mt-1 text-xs px-3 py-1 rounded-full {{ $badge }}">
                            {{ ucfirst($item->nama_alert) }}
                        </span>
                    </div>

                    <span class="text-sm text-slate-400 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </span>

                </div>

                {{-- ISI --}}
                <p class="text-slate-600 text-sm leading-relaxed mb-5">
                    {{ $item->keterangan }}
                </p>

                {{-- FOOTER --}}
                <div class="flex items-center justify-between">

                    <div class="text-sm text-slate-500">
                        Kontak
                    </div>

                    <span class="bg-slate-100 text-slate-700 text-xs font-medium px-3 py-1 rounded-full">
                        {{ $item->nomor_hp }}
                    </span>

                </div>

            </div>

        @empty

            <div class="text-center text-slate-500 bg-white p-10 rounded-xl shadow">
                Belum ada pengumuman tersedia.
            </div>

        @endforelse

    </div>

</section>
<script>
function filterWaktu(type, el) {
    let items = document.querySelectorAll('.pengumuman-item');
    let now = new Date();

    items.forEach(item => {
        let itemDate = new Date(item.dataset.date);
        let diffTime = now - itemDate;
        let diffDays = diffTime / (1000 * 60 * 60 * 24);

        let show = false;

        if (type === 'all') show = true;
        else if (type === 'today') show = diffDays < 1;
        else if (type === '3day') show = diffDays <= 3;
        else if (type === '7day') show = diffDays <= 7;
        else if (type === '30day') show = diffDays <= 30;

        item.style.display = show ? 'block' : 'none';
    });

    // ACTIVE STYLE
    document.querySelectorAll('.tab-waktu').forEach(btn => {
        btn.classList.remove('bg-blue-600','text-white','shadow');
    });

    el.classList.add('bg-blue-600','text-white','shadow');
}
</script>

@endsection