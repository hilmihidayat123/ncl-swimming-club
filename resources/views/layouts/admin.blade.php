<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
      <link rel="stylesheet" href="{{ asset('build/assets/app-BmAVGTu2.css') }}">
<script src="{{ asset('build/assets/app-CKl8NZMC.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside id="sidebar"
    class="w-64 bg-white m-4 rounded-2xl shadow-xl transition-all duration-300 -ml-72">

        <div class="px-6 py-6 font-bold text-xl text-blue-700 border-b">
            Admin Panel
        </div>

        <nav class="px-3 py-4 space-y-2">

            @php
                function active($route) {
                    return request()->routeIs($route)
                        ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600'
                        : 'text-gray-600 hover:bg-gray-100';
                }
            @endphp

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ active('admin.dashboard') }}">
                Pengaturan Halaman Utama
            </a>

            

            <a href="{{ route('admin.pendaftar') }}"
               class="flex items-center justify-between px-4 py-3 rounded-lg transition {{ active('admin.pendaftar') }}">
                <span>Pendaftar</span>

                @if($pendingCount > 0)
                    <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                        {{ $pendingCount }}
                    </span>
                @endif
            </a>

            <a href="{{ route('murid.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ active('murid.*') }}">
                Daftar Murid
            </a>
            
            <a href="{{ route('pelatih.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ active('pelatih.*') }}">
                Daftar Pelatih
            </a>

            <a href="{{ route('jadwal.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ active('jadwal.*') }}">
                Jadwal Latihan
            </a>

            <a href="{{ route('pengumuman.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ active('pengumuman.*') }}">
                Buat Pengumuman
            </a>

            <a href="{{ route('admin.lokasi.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ active('admin.lokasi.*') }}">
                Tambah Lokasi
            </a>

            <div class="pt-6 border-t mt-4">
                <a href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="flex items-center justify-center px-4 py-3 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow transition">
                    Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                @csrf
            </form>

            <a href="{{ route('admin.settings') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
   {{ active('admin.lokasi.*') }}
   hover:bg-gray-100 hover:text-blue-600">

    <!-- Gear Icon -->
    <svg xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor"
         stroke-width="2"
         class="w-5 h-5">
        <circle cx="12" cy="12" r="3"></circle>
        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 
        2 0 1 1-2.83 2.83l-.06-.06a1.65 
        1.65 0 0 0-1.82-.33 1.65 
        1.65 0 0 0-1 1.51V21a2 
        2 0 1 1-4 0v-.09a1.65 
        1.65 0 0 0-1-1.51 1.65 
        1.65 0 0 0-1.82.33l-.06.06a2 
        2 0 1 1-2.83-2.83l.06-.06a1.65 
        1.65 0 0 0 .33-1.82 1.65 
        1.65 0 0 0-1.51-1H3a2 
        2 0 1 1 0-4h.09a1.65 
        1.65 0 0 0 1.51-1 1.65 
        1.65 0 0 0-.33-1.82l-.06-.06a2 
        2 0 1 1 2.83-2.83l.06.06a1.65 
        1.65 0 0 0 1.82.33h0A1.65 
        1.65 0 0 0 10.91 3H11a2 
        2 0 1 1 4 0v.09a1.65 
        1.65 0 0 0 1 1.51 1.65 
        1.65 0 0 0 1.82-.33l.06-.06a2 
        2 0 1 1 2.83 2.83l-.06.06a1.65 
        1.65 0 0 0-.33 1.82v0A1.65 
        1.65 0 0 0 21 10.91V11a2 
        2 0 1 1 0 4h-.09a1.65 
        1.65 0 0 0-1.51 1z"></path>
    </svg>

    <span class="font-medium">Settings</span>
</a>
        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">

        <!-- TOPBAR -->
<div class="flex items-center mb-6">

    <button onclick="toggleSidebar()" 
        class="p-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition duration-300">

        <!-- ICON Close -->
        <svg id="closeIcon" xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 hidden"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>

        <!-- ICON panah -->
        
         <svg id="arrowIcon" xmlns="http://www.w3.org/2000/svg"
    class="h-6 w-6 transition-transform duration-300"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
    stroke-width="2">
    <path stroke-linecap="round"
          stroke-linejoin="round"
          d="M15 19l-7-7 7-7" />
</svg>
    </svg>

    </button>

</div>


        @yield('content')
    </main>
</div>

<script>
const sidebar = document.getElementById('sidebar');
const arrow = document.getElementById('arrowIcon');

// Cek state sebelum user lihat perubahan
const state = localStorage.getItem('sidebar');

if (state === 'open') {
    sidebar.classList.remove('-ml-72');
    arrow.classList.remove('rotate-180');
} else {
    sidebar.classList.add('-ml-72');
    arrow.classList.add('rotate-180');
}

function toggleSidebar() {
    sidebar.classList.toggle('-ml-72');
    arrow.classList.toggle('rotate-180');

    if (sidebar.classList.contains('-ml-72')) {
        localStorage.setItem('sidebar', 'closed');
    } else {
        localStorage.setItem('sidebar', 'open');
    }
}
</script>




</body>
</html>
