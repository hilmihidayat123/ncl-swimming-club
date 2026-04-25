@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-100/80 p-6">

    <div class="bg-white shadow-xl p-6">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-700">
                Data Kelas
            </h2>

            <a href="{{ route('admin.kelas.create') }}"
               class="bg-[#2563EB] hover:bg-[#1D4ED8] text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-300">

                + Tambah Kelas
            </a>
        </div>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- TABLE --}}
        <div class="overflow-x-auto shadow-lg bg-white">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
    <tr>
        <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">
            Nama
        </th>
        <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">
            Harga
        </th>
        <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">
            Status
        </th>
        <th class="px-4 py-3 text-center text-sm font-medium text-gray-600">
            Aksi
        </th>
    </tr>
</thead>
                <tbody>
                    @foreach($kelas as $item)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-sm text-gray-700">
                            {{ $item->nama }}
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-700">
    <div class="space-y-1">
        <div>{{ $item->harga_1 }}</div>
        <div class="text-gray-500 text-xs">
            {{ $item->harga_2 }}
        </div>
    </div>
</td>

                        <td class="px-4 py-3 text-sm">
                            @if($item->is_active)
                                <span class="text-green-600 font-semibold">
                                    Active
                                </span>
                            @else
                                <span class="text-red-600 font-semibold">
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-center flex justify-center gap-2">

                            <a href="{{ route('admin.kelas.edit', $item->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 shadow transition duration-200">
                                Edit
                            </a>

                            <form action="{{ route('admin.kelas.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 shadow transition duration-200">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                    @if($kelas->isEmpty())
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-sm text-gray-500">
                            Belum ada data kelas
                        </td>
                    </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>
    {{-- BACK BUTTON --}}
<div class="mt-6 flex justify-start">
    <a href="{{ route('admin.dashboard') }}"
        class="inline-flex items-center gap-2 bg-slate-600 hover:bg-slate-700 
               text-white text-sm font-medium px-5 py-2.5 rounded-xl 
               shadow-md hover:shadow-lg transition duration-200 hover:scale-105">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"/>
        </svg>

        Kembali
    </a>
</div>
</div>
@endsection
