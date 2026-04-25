@extends('layouts.admin')

@section('content')
@if ($errors->any())
<div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
    <strong>Error:</strong>
    <ul class="mt-2 list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="min-h-screen bg-gray-50 p-8">

<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">

<h2 class="text-2xl font-bold text-gray-800 mb-6">
Pengaturan Admin
</h2>

@if(session('success'))
<div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
{{ session('success') }}
</div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST">
@csrf
@method('PUT')

<!-- Nama -->
<div class="mb-4">
<label class="block text-sm font-semibold mb-2">Nama</label>
<input
type="text"
name="name"
value="{{ $admin->name }}"
class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none"
required>
</div>

<!-- Email -->
<div class="mb-4">
<label class="block text-sm font-semibold mb-2">Email</label>
<input
type="email"
name="email"
value="{{ $admin->email }}"
class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none"
required>
</div>

<div class="mb-4">
<label class="block text-sm font-semibold mb-2">Password Baru</label>

<div class="relative">

<input
id="password"
type="password"
name="password"
placeholder="Kosongkan jika tidak diganti"
class="w-full border rounded-lg px-4 py-2 pr-10 focus:ring-2 focus:ring-blue-400 outline-none">

<button type="button"
onclick="togglePassword()"
class="absolute right-3 top-2.5 text-gray-500">

<!-- icon mata -->
<svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg"
class="h-5 w-5"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M2.458 12C3.732 7.943
7.523 5 12 5c4.478 0
8.268 2.943
9.542 7-1.274 4.057
-5.064 7-9.542 7
-4.477 0-8.268-2.943
-9.542-7z"/>

</svg>

</button>

</div>
</div>
<script>

function togglePassword(){

let password = document.getElementById("password");

if(password.type === "password"){
    password.type = "text";
}else{
    password.type = "password";
}

}

</script>


<!-- Konfirmasi Password -->
<div class="mb-6">
<label class="block text-sm font-semibold mb-2">Konfirmasi Password</label>
<input
type="password"
name="password_confirmation"
class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
</div>

<button
type="submit"
class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg font-semibold transition">
Simpan Perubahan
</button>

</form>

</div>
</div>

@endsection