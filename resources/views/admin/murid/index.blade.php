@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-50 min-h-screen font-sans text-gray-700">

    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 drop-shadow-sm">Data Murid</h2>
            <a href="{{ route('murid.create') }}" 
               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md transition-all duration-200">
                + Tambah Murid Secara Manual
            </a>
        </div>
        <div class="mb-4">
    <input 
        type="text" 
        id="searchMurid"
        placeholder="Cari nama murid..."
        class="w-full md:w-80 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
    >
</div>
<script>
document.getElementById("searchMurid").addEventListener("keyup", function() {

    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("tbody tr");

    rows.forEach(row => {
        let nama = row.children[0].textContent.toLowerCase();

        if(nama.includes(filter)){
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });

});
</script>

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
                        <th class="px-6 py-3 text-left text-sm font-semibold">Umur</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">No HP</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Kategori Kelas</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tipe Kelas</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($murids as $murid)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $murid->nama_lengkap ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $murid->umur ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $murid->no_hp ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $murid->email ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $murid->layanan ? ucfirst(str_replace('_',' ',$murid->layanan)) : '-' }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $murid->tipe_kelas ? ucfirst(str_replace('_',' ',$murid->tipe_kelas)) : '-' }}
                        </td>

                        

                        <td class="px-6 py-4 text-sm">
                           @if($murid->status === 'aktif')
    <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
        Aktif
    </span>
@elseif($murid->status === 'selesai')
    <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">
        Selesai
    </span>
@else
    <span class="px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-700 rounded-full">
        Tidak Aktif
    </span>
@endif
                        </td>

                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('murid.edit', $murid->id) }}" 
                               class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md shadow-sm transition-all duration-200 text-sm font-semibold">
                                Edit
                            </a>

                            <form action="{{ route('murid.destroy', $murid->id) }}" 
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin hapus data ini?')"
                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md shadow-sm transition-all duration-200 text-sm font-semibold">
                                    Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-6 text-center text-gray-500">
                            Belum ada data murid.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
    
</div>

@endsection
