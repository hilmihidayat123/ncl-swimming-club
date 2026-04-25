@extends('layouts.admin')

@section('title', 'Dashboard Pendaftar')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-7xl mx-auto">

        @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
            {{ session('success') }}
        </div>
        @endif

        <h2 class="text-2xl font-bold text-gray-800 mb-6 drop-shadow-sm">Dashboard Data Pendaftar</h2>

        <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Umur</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">No HP</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Layanan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tipe Kelas</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($pendaftars as $p)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $p->nama_lengkap }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $p->umur }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $p->no_hp }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $p->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ ucfirst($p->layanan) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ ucfirst($p->tipe_kelas) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $p->tanggal_mendaftar }}</td>
                        <td class="px-6 py-4 text-sm font-semibold">
                            @if($p->status == 'pending')
                                <span class="text-orange-500">Pending</span>
                            @elseif($p->status == 'diterima')
                                <span class="text-green-600">Diterima</span>
                            @else
                                <span class="text-red-600">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admin.updateStatus', [$p->id, 'diterima']) }}" class="text-green-600 hover:underline font-semibold">ACC</a> |
                            <a href="{{ route('admin.updateStatus', [$p->id, 'ditolak']) }}" class="text-red-600 hover:underline font-semibold">Tolak</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
