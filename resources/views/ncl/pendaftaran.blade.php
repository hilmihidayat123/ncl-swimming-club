@extends('layouts.app')

@section('title', 'Pendaftaran - NCL Swimming Club')

@section('content')
<meta charset="UTF-8">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.tailwindcss.com"></script>

{{-- POPUP ALUR PENDAFTARAN --}}
<div id="popupAlur" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

    <div class="bg-white rounded-3xl p-10 max-w-lg w-full shadow-2xl text-center">

        <h2 class="text-3xl font-bold text-blue-800 mb-4">
            Alur Pendaftaran
        </h2>

        <div class="text-gray-700 space-y-4 text-left">

    <div class="flex gap-4 items-start">
        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-sm font-semibold shrink-0">1</div>
        <p class="leading-relaxed">Isi formulir pendaftaran dengan data lengkap.</p>
    </div>

    <div class="flex gap-4 items-start">
        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-sm font-semibold shrink-0">2</div>
        <p class="leading-relaxed">Halaman langsung diteruskan ke WhatsApp, lalu kirim ke Admin.</p>
    </div>

    <div class="flex gap-4 items-start">
        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-sm font-semibold shrink-0">3</div>
        <p class="leading-relaxed">Admin akan menghubungi melalui WhatsApp / Email.</p>
    </div>

    <div class="flex gap-4 items-start">
        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-sm font-semibold shrink-0">4</div>
        <p class="leading-relaxed">Lakukan pembayaran biaya kelas di WhatsApp sesuai petunjuk Admin.</p>
    </div>

    <div class="flex gap-4 items-start">
        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-600 text-white text-sm font-semibold shrink-0">5</div>
        <p class="leading-relaxed">Peserta resmi terdaftar dan bisa mulai latihan renang.</p>
    </div>

</div>
        <script>
function tutupPopup(){
    document.getElementById("popupAlur").style.display = "none";
}
</script>

        <button onclick="tutupPopup()" 
        class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition">
            Saya Mengerti
        </button>

    </div>

</div>

<div class="min-h-screen relative py-12 px-4 flex justify-center overflow-hidden
bg-gradient-to-br from-blue-50 via-white to-blue-100">

    {{-- TEXTURE NOISE (HALUS BANGET) --}}
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
        style="background-image: url('https://www.transparenttextures.com/patterns/noise.png');">
    </div>

    {{-- BLOB BLUR KIRI ATAS --}}
    <div class="absolute top-[-100px] left-[-100px] w-[300px] h-[300px] 
        bg-blue-300 opacity-30 blur-3xl rounded-full">
    </div>

    {{-- BLOB BLUR KANAN BAWAH --}}
    <div class="absolute bottom-[-120px] right-[-100px] w-[350px] h-[350px] 
        bg-indigo-300 opacity-30 blur-3xl rounded-full">
    </div>
    <div class="relative bg-white/80 backdrop-blur-xl rounded-3xl 
shadow-[0_10px_40px_rgba(0,0,0,0.1)] 
max-w-2xl w-full p-12 z-10 border border-white/50">

        <h2 class="text-3xl font-bold text-blue-800 mb-2">Form Pendaftaran</h2>
        <p class="text-gray-600 mb-6">Silakan isi data berikut untuk mendaftar kelas renang di NCL Swimming Club.</p>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="bg-teal-100 text-teal-700 p-4 rounded-lg mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/pendaftaran') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nama Lengkap --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                       class="w-full px-4 py-3 border rounded-xl border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('nama_lengkap')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Umur --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Umur</label>
                <input type="number" name="umur" value="{{ old('umur') }}"
                       class="w-full px-4 py-3 border rounded-xl border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('umur')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- No HP --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">No Hp</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                       class="w-full px-4 py-3 border rounded-xl border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('no_hp')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full px-4 py-3 border rounded-xl border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Layanan --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Pilih Layanan</label>
                <select name="layanan" class="w-full px-4 py-3 border rounded-xl border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option disabled selected>Pilih layanan</option>
                    <option value="pemula">Pemula</option>
                    <option value="lanjutan">Lanjutan</option>
                    <option value="casis">casis</option>
                    <option value="atlet">Atlet</option>
                    <option value="kelas_malam">kelas malam</option>
                </select>
                @error('layanan')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tipe_kelas --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Pilih Tipe Kelas</label>
                <select name="tipe_kelas" class="w-full px-4 py-3 border rounded-xl border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option disabled selected>Pilih Tipe kelas</option>
                    <option value="reguler">Reguler</option>
                    <option value="privat">Privat</option>
                    
                </select>
                @error('tipe_kelas')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Catatan --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Catatan</label>
                <textarea name="catatan" rows="4"
                          class="w-full px-4 py-3 border rounded-xl border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('catatan') }}</textarea>
            </div>

            {{-- Submit --}}
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white font-semibold py-3 rounded-full hover:shadow-xl transition-all">
                Kirim Pendaftaran
            </button>
        </form>

        {{-- Tanyakan Admin --}}
        <a href="{{ route('layanan.create') }}" 
           class="mt-5 block w-full text-center bg-gray-200 text-gray-800 py-3 rounded-xl font-semibold hover:bg-gray-300 transition">
            Ragu ingin mendaftar? Tanyakan admin dahulu
        </a>
    </div>
</div>
@endsection
