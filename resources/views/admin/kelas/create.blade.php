@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-xl">

    <h1 class="text-3xl font-bold mb-8 text-gray-800">
        Tambah Kelas
    </h1>

    <form action="{{ route('admin.kelas.store') }}"
          method="POST"
          class="bg-white shadow-xl rounded-2xl p-8 space-y-5 border border-gray-100">
        @csrf

        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Nama Kelas
            </label>
            <input type="text" name="nama"
                placeholder="Contoh: Kelas Pemula"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                required>
        </div>

        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Deskripsi
            </label>
            <textarea name="deskripsi"
                rows="4"
                placeholder="Deskripsi kelas..."
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                required></textarea>
        </div>

        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Harga
            </label>
            {{-- Harga Reguler --}}
<div>
    <label class="block mb-2 text-sm font-semibold text-gray-600">
        Harga Reguler
    </label>
    <input type="text" name="harga_1"
        placeholder="Contoh: Reguler : Rp 200.000 / 8 pertemuan"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 
               focus:outline-none focus:ring-2 focus:ring-blue-500 
               focus:border-blue-500 transition"
        required>
</div>

{{-- Harga Privat --}}
<div>
    <label class="block mb-2 text-sm font-semibold text-gray-600">
        Harga Privat
    </label>
    <input type="text" name="harga_2"
        placeholder="Contoh: Privat : Rp 800.000 / 8 pertemuan"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 
               focus:outline-none focus:ring-2 focus:ring-blue-500 
               focus:border-blue-500 transition"
        required>
</div>
        </div>

        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Sort Order
            </label>
            <input type="number" name="sort_order"
                value="0"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>

        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-600">
                Status
            </label>
            <select name="is_active"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                <option value="1">Active</option>
                <option value="0">Nonaktif</option>
            </select>
        </div>

        <button
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transform hover:scale-[1.02] transition-all duration-300">
            Simpan Kelas
        </button>
        <div class="mb-6">
    <a href="{{ route('admin.kelas.index') }}"
       class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg transition">
        
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="h-5 w-5" 
             fill="none" 
             viewBox="0 0 24 24" 
             stroke="currentColor" 
             stroke-width="2">
            <path stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M15 19l-7-7 7-7" />
        </svg>

        Kembali
    </a>
</div>


    </form>

</div>
@endsection
