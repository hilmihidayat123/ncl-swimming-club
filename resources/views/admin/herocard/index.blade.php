@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hero Card</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100/80 p-6 font-sans">

<div class="bg-white shadow-xl p-6 max-w-5xl mx-auto">

<div class="flex justify-between items-center mb-6">

<h2 class="text-lg font-semibold text-gray-700">
Hero Card
</h2>

<a href="{{ route('admin.herocard.create') }}"
class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 shadow text-sm transition">
Tambah Data
</a>

</div>

<table class="w-full border text-sm">

<thead class="bg-gray-100">
<tr>
<th class="p-2 border">ID</th>
<th class="p-2 border">Alert</th>
<th class="p-2 border">Keterangan</th>
<th class="p-2 border">Status</th>
<th class="p-2 border">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($cards as $card)

<tr class="text-center">

<td class="p-2 border">{{ $card->id }}</td>

<td class="p-2 border">{{ $card->alert }}</td>

<td class="p-2 border">{{ $card->keterangan }}</td>

<td class="p-2 border">

@if($card->is_active)

<span class="bg-green-100 text-green-700 px-2 py-1 text-xs">
Active
</span>

@else

<span class="bg-red-100 text-red-700 px-2 py-1 text-xs">
Nonaktif
</span>

@endif

</td>

<td class="p-2 border flex justify-center gap-2">

<a href="{{ route('admin.herocard.edit',$card->id) }}"
class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 text-xs">
Edit
</a>

<form action="{{ route('admin.herocard.destroy',$card->id) }}" method="POST">

@csrf
@method('DELETE')

<button
class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 text-xs">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</tbody>
</table>

</div>

</body>
</html>
@endsection