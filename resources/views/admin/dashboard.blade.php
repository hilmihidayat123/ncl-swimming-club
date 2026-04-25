@extends('layouts.admin')

@section('content')
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-slate-200 py-10 px-6">
    
    <div class="max-w-7xl mx-auto">
        
        <!-- Card Header -->
        <div class="bg-white/80 backdrop-blur-xl shadow-xl rounded-2xl p-8 border border-slate-200">
            
            <div class="flex items-center justify-between">
                
                <div>
                    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">
                        Dashboard Admin
                    </h1>

                    <p class="mt-3 text-slate-500 text-sm">
                        Kontrol penuh halaman <span class="font-medium text-blue-600">Home NCL Swimming Club</span>
                    </p>
                </div>

                <!-- Optional Badge -->
                <div class="hidden md:block">
                    <span class="px-4 py-2 text-sm font-medium bg-blue-100 text-blue-700 rounded-full shadow-sm">
                        Admin Panel
                    </span>
                </div>

</div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Card Hero Section -->
        <a href="{{ route('hero.index') }}" class="group block p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow hover:shadow-xl transition-all duration-300 relative overflow-hidden">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500 group-hover:text-blue-600 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-lg font-medium text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                    Hero Section
                </span>
            </div>
            <span class="absolute bottom-0 left-0 h-1 w-0 bg-blue-500 group-hover:w-full transition-all duration-500"></span>
        </a>

        <!-- Card Kelas Renang -->
        <a href="{{ route('admin.kelas.index') }}" class="group block p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow hover:shadow-xl transition-all duration-300 relative overflow-hidden">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500 group-hover:text-blue-600 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-lg font-medium text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                    Kelas Renang
                </span>
            </div>
            <span class="absolute bottom-0 left-0 h-1 w-0 bg-blue-500 group-hover:w-full transition-all duration-500"></span>
        </a>

         <a href="{{ route('admin.ctas.index') }}" class="group block p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow hover:shadow-xl transition-all duration-300 relative overflow-hidden">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500 group-hover:text-blue-600 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-lg font-medium text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                    Call To Action
                </span>
            </div>
            <span class="absolute bottom-0 left-0 h-1 w-0 bg-blue-500 group-hover:w-full transition-all duration-500"></span>
        </a>

         <a href="{{ route('admin.gallery.index') }}" class="group block p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow hover:shadow-xl transition-all duration-300 relative overflow-hidden">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500 group-hover:text-blue-600 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-lg font-medium text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                    Gallery
                </span>
            </div>
            <span class="absolute bottom-0 left-0 h-1 w-0 bg-blue-500 group-hover:w-full transition-all duration-500"></span>
        </a>

         <a href="{{ route('admin.about.index') }}" class="group block p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow hover:shadow-xl transition-all duration-300 relative overflow-hidden">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500 group-hover:text-blue-600 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-lg font-medium text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                    Tentang
                </span>
            </div>
            <span class="absolute bottom-0 left-0 h-1 w-0 bg-blue-500 group-hover:w-full transition-all duration-500"></span>
        </a>
    </div>
</div>

          
@endsection
