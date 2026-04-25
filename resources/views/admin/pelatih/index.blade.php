@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 drop-shadow-sm">Data Pelatih</h2>
            <a href="{{ route('pelatih.create') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md transition-all duration-200">
                + Tambah Pelatih
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nomor HP</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Keterangan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Image</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pelatih as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->nama_pelatih }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            @if($item->nomor_hp)
                                {{ $item->nomor_hp }}
                            @else
                                <span class="text-gray-400 italic">Belum ada</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->keterangan }}</td>
                        <td class="px-6 py-4">
                            @if($item->image)
                                <img src="{{ asset('storage/'.$item->image) }}"
                                     class="w-20 h-20 object-cover rounded-lg shadow-sm">
                            @else
                                <span class="text-gray-400 italic">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('pelatih.edit', $item->id) }}" class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md shadow-sm transition-all duration-200 text-sm font-semibold">
                                Edit
                            </a>
                            <form action="{{ route('pelatih.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md shadow-sm transition-all duration-200 text-sm font-semibold">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 italic">
                            Belum ada data pelatih
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    
</div>

@endsection
