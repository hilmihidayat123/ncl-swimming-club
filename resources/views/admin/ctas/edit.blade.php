@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-gray-100/80 p-6 font-sans">
    <div class="max-w-3xl mx-auto bg-white shadow-xl p-8">

        {{-- HEADER --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-700">
                Edit CTA
            </h2>
        </div>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 shadow-sm">
                <ul class="text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.ctas.update',$cta->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">

            @csrf
            @method('PUT')

            {{-- TITLE --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Title</label>
                <input type="text"
                       name="title"
                       value="{{ old('title', $cta->title) }}"
                       required
                       class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            {{-- SUBTITLE --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Subtitle</label>
                <textarea name="subtitle"
                          rows="3"
                          class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">{{ old('subtitle', $cta->subtitle) }}</textarea>
            </div>

            {{-- BUTTON TEXT --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Button Text</label>
                <input type="text"
                       name="button_text"
                       value="{{ old('button_text', $cta->button_text) }}"
                       class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            {{-- BUTTON LINK --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Button Link</label>
                <input type="text"
                       name="button_link"
                       value="{{ old('button_link', $cta->button_link) }}"
                       class="w-full border shadow-sm px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            {{-- CURRENT IMAGE --}}
            @if($cta->image)
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-2">Current Image</label>
                    <img src="{{ asset('storage/'.$cta->image) }}"
                         class="w-40 h-40 object-cover shadow-md border">
                </div>
            @endif

            {{-- UPLOAD IMAGE --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Upload New Image</label>
                <input type="file"
                       name="image"
                       class="w-full border shadow-sm px-3 py-2 text-sm 
                              file:mr-4 file:py-2 file:px-4 file:border-0 
                              file:bg-blue-100 file:text-blue-700 
                              hover:file:bg-blue-200">
            </div>

            {{-- ACTIVE --}}
            <div class="flex items-center gap-2">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       {{ old('is_active', $cta->is_active) ? 'checked' : '' }}
                       class="h-4 w-4 text-blue-600 border-gray-300">
                <span class="text-sm text-gray-600">Aktifkan CTA</span>
            </div>

            {{-- BUTTONS --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.ctas.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 shadow text-sm transition duration-200">
                    Kembali
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 shadow text-sm transition duration-200">
                    Update
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
