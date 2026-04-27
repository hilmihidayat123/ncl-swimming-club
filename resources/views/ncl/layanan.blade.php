<!DOCTYPE html>
<html lang="id">
<head>
      <link rel="stylesheet" href="{{ asset('build/assets/app-BmAVGTu2.css') }}">
<script src="{{ asset('build/assets/app-CKl8NZMC.js') }}" defer></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pertanyaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center px-4">

<div class="w-full max-w-2xl bg-white p-6 sm:p-8 rounded-2xl shadow-xl">

    <h2 class="text-xl sm:text-2xl font-bold text-center mb-2">
        Bingung atau Ragu Soal Pendaftaran?
    </h2>
    <p class="text-center text-gray-500 text-sm sm:text-base mb-6">
        Tanyakan langsung ke admin, kami siap membantu.
    </p>

    <form action="{{ route('layanan.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium text-sm sm:text-base">Nama Lengkap</label>
            <input type="text" name="nama_lengkap"
                class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                required>
        </div>

        <div>
            <label class="block font-medium text-sm sm:text-base">Email</label>
            <input type="email" name="email"
                class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                required>
        </div>

        <div>
            <label class="block font-medium text-sm sm:text-base">Nomor WhatsApp</label>
            <input type="text" name="no_wa"
                class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                placeholder="628xxxxxxxxxx"
                required>
        </div>

        <div>
            <label class="block font-medium text-sm sm:text-base">Kategori</label>
            <select name="kategori"
                class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base">
                <option value="Biaya">Biaya</option>
                <option value="Jadwal">Jadwal</option>
                <option value="Syarat">Syarat</option>
                <option value="Program">Program</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>

        <div>
            <label class="block font-medium text-sm sm:text-base">Pertanyaan</label>
            <textarea name="pertanyaan" rows="4"
                class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base"
                required></textarea>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition active:scale-95">
            Kirim & Chat Admin
        </button>

        <a href="{{ route('home') }}"
            class="block w-full text-center bg-gray-300 text-gray-800 py-3 rounded-lg font-semibold hover:bg-gray-400 transition active:scale-95">
            ← Kembali
        </a>

    </form>

</div>

</body>
</html>
