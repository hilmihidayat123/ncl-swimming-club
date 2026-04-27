@extends('layouts.app')

@section('content')
<head>
      <link rel="stylesheet" href="{{ asset('build/assets/app-BmAVGTu2.css') }}">
<script src="{{ asset('build/assets/app-CKl8NZMC.js') }}" defer></script>

    <meta charset="UTF-8">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>



{{-- BACKGROUND --}}
<div class="relative overflow-hidden bg-white">

    {{-- GRADIENT SUPER HALUS --}}
    <div class="absolute inset-0"
        style="background: linear-gradient(135deg, #f8fafc, #ffffff, #f1f5f9);">
    </div>

    {{-- TEXTURE HALUS --}}
    <div class="absolute inset-0 opacity-5 pointer-events-none"
        style="background-image: url('https://www.transparenttextures.com/patterns/noise.png');">
    </div>

    {{-- BLOB SAMAR --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-200 rounded-full blur-3xl opacity-20"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-indigo-200 rounded-full blur-3xl opacity-20"></div>

    {{-- CONTENT --}}
    <section class="relative z-10 py-16">
        <div class="max-w-6xl mx-auto px-6">

            {{-- HEADER --}}
            <div class="text-center mb-14">

                <h2 class="text-3xl md:text-4xl font-bold 
                bg-gradient-to-r from-blue-700 to-blue-500 
                bg-clip-text text-transparent tracking-tight">
                    Tim Pelatih Kami
                </h2>

                <div class="w-20 h-1 bg-blue-500 mx-auto rounded-full mt-4 mb-4"></div>

                <p class="text-gray-600 text-lg max-w-xl mx-auto leading-relaxed">
                    Berpengalaman, profesional, dan berdedikasi dalam membimbing 
                    setiap atlet untuk berkembang dan mencapai potensi terbaiknya.
                </p>

            </div>
            {{-- TAB FILTER KELAS --}}
<div class="flex justify-center mb-12">
    <div class="flex flex-wrap gap-2 bg-white/80 backdrop-blur p-2 rounded-full shadow border border-white/50">

        <button onclick="filterPelatih('all', this)"
        class="tab-pelatih px-5 py-2 rounded-full text-sm font-medium bg-blue-600 text-white shadow">
            Semua
        </button>

        <button onclick="filterPelatih('pemula', this)"
        class="tab-pelatih px-5 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            Pemula
        </button>

        <button onclick="filterPelatih('lanjutan', this)"
        class="tab-pelatih px-5 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            Lanjutan
        </button>

        <button onclick="filterPelatih('casis', this)"
        class="tab-pelatih px-5 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            Casis
        </button>

        <button onclick="filterPelatih('atlet', this)"
        class="tab-pelatih px-5 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            Atlet
        </button>

        <button onclick="filterPelatih('malam', this)"
        class="tab-pelatih px-5 py-2 rounded-full text-sm text-slate-600 hover:bg-blue-50 transition">
            Malam
        </button>

    </div>
</div>

            {{-- GRID --}}
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
               @foreach($pelatih as $item)

@php
    $kelas = explode(',', $item->title); // contoh: pemula,lanjutan,casis
@endphp

<div class="pelatih-item 
@foreach($kelas as $k)
    {{ Str::slug(trim($k)) }}
@endforeach
bg-white/80 backdrop-blur-lg rounded-2xl shadow-lg p-6 text-center 
transition duration-300 hover:shadow-2xl hover:-translate-y-2 border border-white/50">

                    {{-- IMAGE --}}
                    @if($item->image)
                    <div class="overflow-hidden rounded-xl mb-5">
                        <img src="{{ asset('storage/'.$item->image) }}"
                            class="w-full h-64 object-cover transition duration-300 hover:scale-105">
                    </div>
                    @endif

                    {{-- NAME --}}
                    <h5 class="text-xl font-bold text-gray-800">
                        {{ $item->nama_pelatih }}
                    </h5>

                    {{-- TITLE --}}
                    <p class="text-blue-700 font-medium mb-2">
                        {{ $item->title }}
                    </p>

                    {{-- DESC --}}
                    <p class="text-gray-500 text-sm mb-4">
                        {{ $item->keterangan }}
                    </p>

                    {{-- BUTTON --}}
                    @if($item->nomor_hp)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->nomor_hp) }}"
                        target="_blank"
                        class="inline-block bg-gradient-to-r from-green-500 to-green-400 
                        text-white text-sm font-semibold px-5 py-2 rounded-full 
                        transition duration-300 hover:scale-105 hover:shadow-lg">
                        Hubungi via WhatsApp
                    </a>
                    @endif

                </div>

                @endforeach
            </div>

        </div>
    </section>

</div>
<script>
function filterPelatih(kategori, el) {
    let items = document.querySelectorAll('.pelatih-item');

    items.forEach(item => {
        if (kategori === 'all') {
            item.style.display = 'block';
        } else {
            item.style.display = item.classList.contains(kategori) ? 'block' : 'none';
        }
    });

    document.querySelectorAll('.tab-pelatih').forEach(btn => {
        btn.classList.remove('bg-blue-600','text-white','shadow');
    });

    el.classList.add('bg-blue-600','text-white','shadow');
}
</script>

@endsection
