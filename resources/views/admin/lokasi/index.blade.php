@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 drop-shadow-sm">
                Data Lokasi
            </h2>

            <a href="{{ route('admin.lokasi.create') }}"
               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md transition-all duration-200">
                + Tambah Lokasi
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
                        <th class="px-6 py-3 text-left text-sm font-semibold">Judul</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Urutan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($locations as $loc)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">

                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $loc->title ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-sm">
                                @if($loc->is_active)
                                    <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                        Aktif
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-700 rounded-full">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $loc->sort_order ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-sm space-x-2">
                                <a href="{{ route('admin.lokasi.edit', $loc->id) }}"
                                   class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md shadow-sm transition-all duration-200 text-sm font-semibold">
                                    Edit
                                </a>

                                <form action="{{ route('admin.lokasi.destroy', $loc->id) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Yakin hapus lokasi ini?')"
                                            class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md shadow-sm transition-all duration-200 text-sm font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                Belum ada data lokasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
