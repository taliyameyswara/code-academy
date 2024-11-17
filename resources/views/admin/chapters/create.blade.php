@extends('layouts.admin')

@section('title', 'Add New Chapter')

@section('admin-content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Add New Chapter for "{{ $course->title }}"</h1>

        {{-- Success/Error Messages --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form for Adding Chapter --}}
        <form action="{{ route('admin.courses.chapters.store', $course) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            {{-- Chapter Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Chapter Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="w-full border border-gray-300 p-2 rounded-lg" placeholder="Masukkan judul chapter.." required>
            </div>

            {{-- Chapter Content (Article) --}}
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-2">Content (Article)</label>
                <textarea name="content" id="content" rows="5" class="w-full border border-gray-300 p-2 rounded-lg"
                    placeholder="Masukkan isi konten artikel.." required>{{ old('content') }}</textarea>
            </div>

            {{-- Video URL --}}
            <div class="mb-4">
                <label for="video_url" class="block text-gray-700 font-medium mb-2">Video URL</label>
                <input type="url" name="video_url" id="video_url" value="{{ old('video_url') }}"
                    class="w-full border border-gray-300 p-2 rounded-lg"
                    placeholder="Masukkan url video embed youtube chapter.." required>
            </div>

            {{-- Submit and Cancel Buttons --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-600">
                    Add Chapter
                </button>
                <a href="{{ route('admin.courses.edit', $course) }}"
                    class="ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
