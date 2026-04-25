@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-6 max-w-xl">

    <h1 class="text-2xl font-bold text-slate-800 mb-6">Edit Kelas</h1>

    <form action="{{ route('admin.kelas.update', $kela->id) }}"
          method="POST"
          class="bg-white shadow-lg rounded-2xl p-6 space-y-5 border border-slate-100">
        @csrf
        @method('PUT')

        {{-- Nama --}}
<div>
    <label class="block mb-2 text-sm font-semibold text-gray-600">
        Nama Kelas
    </label>
    <input type="text" name="nama"
           value="{{ $kela->nama }}"
           class="w-full border border-slate-300 rounded-lg px-4 py-2 
                  focus:ring-2 focus:ring-blue-500 focus:outline-none"
           required>
</div>

{{-- Deskripsi --}}
<div>
    <label class="block mb-2 text-sm font-semibold text-gray-600">
        Deskripsi
    </label>
    <textarea name="deskripsi"
              rows="4"
              class="w-full border border-slate-300 rounded-lg px-4 py-2 
                     focus:ring-2 focus:ring-blue-500 focus:outline-none"
              required>{{ $kela->deskripsi }}</textarea>
</div>

{{-- Harga Reguler --}}
<div>
    <label class="block mb-2 text-sm font-semibold text-gray-600">
        Harga Reguler
    </label>
    <input type="text" name="harga_1"
           value="{{ $kela->harga_1 }}"
           class="w-full border border-slate-300 rounded-lg px-4 py-2 
                  focus:ring-2 focus:ring-blue-500 focus:outline-none"
           required>
</div>

{{-- Harga Privat --}}
<div>
    <label class="block mb-2 text-sm font-semibold text-gray-600">
        Harga Privat
    </label>
    <input type="text" name="harga_2"
           value="{{ $kela->harga_2 }}"
           class="w-full border border-slate-300 rounded-lg px-4 py-2 
                  focus:ring-2 focus:ring-blue-500 focus:outline-none"
           required>
</div>

{{-- Sort Order --}}
<div>
    <label class="block mb-2 text-sm font-semibold text-gray-600">
        Sort Order
    </label>
    <input type="number" name="sort_order"
           value="{{ $kela->sort_order }}"
           class="w-full border border-slate-300 rounded-lg px-4 py-2 
                  focus:ring-2 focus:ring-blue-500 focus:outline-none">
</div>

{{-- Status --}}
<div>
    <label class="block mb-2 text-sm font-semibold text-gray-600">
        Status
    </label>
    <select name="is_active"
            class="w-full border border-slate-300 rounded-lg px-4 py-2 
                   focus:ring-2 focus:ring-blue-500 focus:outline-none">
        <option value="1" {{ $kela->is_active ? 'selected' : '' }}>Active</option>
        <option value="0" {{ !$kela->is_active ? 'selected' : '' }}>Nonaktif</option>
    </select>
</div>

        <!-- Button Edit -->
        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg shadow-md transition duration-300">
            Update
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

    </form>

</div>
@endsection
