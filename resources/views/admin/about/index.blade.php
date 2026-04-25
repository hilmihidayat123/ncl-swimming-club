@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gray-100/80 p-6 font-sans">

    {{-- CONTAINER --}}
    <div class="bg-white shadow-xl p-6">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">

            <h2 class="text-lg font-semibold text-gray-700">
                Data About
            </h2>

            <a href="{{ route('admin.about.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 shadow flex items-center gap-2 transition duration-300">

                Tambah About

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
            </a>

        </div>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="bg-blue-100 border-l-4 border-blue-600 text-blue-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- TABLE --}}
        <div class="overflow-x-auto shadow-lg bg-white">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium">No</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Gambar</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Title</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Experience</th>
                        <th class="px-4 py-2 text-left text-sm font-medium">Active</th>
                        <th class="px-4 py-2 text-center text-sm font-medium">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($abouts as $index => $about)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-4 py-2 text-sm">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/'.$about->image) }}"
                                     class="w-16 h-16 object-cover shadow border">
                            </td>

                            <td class="px-4 py-2 text-sm font-medium text-gray-800">
                                {{ $about->title }}
                            </td>

                            <td class="px-4 py-2 text-sm">
                                {{ $about->experience_years }} Tahun
                            </td>

                            <td class="px-4 py-2 text-sm">
                                @if($about->is_active)
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 text-xs font-semibold">
                                        Active
                                    </span>
                                @else
                                    <span class="bg-gray-200 text-gray-600 px-3 py-1 text-xs font-semibold">
                                        Non Active
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-2 text-center flex justify-center gap-2">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.about.edit', $about->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg shadow-md transition duration-200 hover:scale-105">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11 5h2m-1-1v2m8 2l-9 9H5v-4l9-9z"/>
                                    </svg>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.about.destroy', $about->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Yakin hapus data ini?')"
                                        class="bg-blue-700 hover:bg-blue-800 text-white p-2 rounded-lg shadow-md transition duration-200 hover:scale-105">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 8a1 1 0 011 1v6a1 1 0 11-2 0V9a1 1 0 011-1z"
                                                clip-rule="evenodd"/>
                                        </svg>

                                    </button>
                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="px-4 py-6 text-center text-gray-500">
                                Belum ada data About.
                            </td>
                        </tr>
                    @endforelse
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
