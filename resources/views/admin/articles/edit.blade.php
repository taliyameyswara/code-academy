@extends('layouts.admin')

@section('title', 'Add New Chapter')

@section('admin-content')
    <div class="container px-4 py-10 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Add New Article for {{ $chapter->title }}</h1>

        {{-- Success/Error Messages --}}
        @if ($errors->any())
            <div class="p-4 mb-6 text-red-800 bg-red-100 rounded">
                <ul class="pl-6 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form
            action="{{ route('admin.chapters.articles.update', ['chapter' => $chapter, 'course' => $course, 'article' => $article]) }}"
            method="POST">
            @csrf
            @method('PUT')
            {{-- Chapter Title --}}
            <div class="mb-4">
                <label for="title" class="block mb-2 font-medium text-gray-700">Chapter Title</label>
                <input type="text" name="title" id="title" value="{{ $article->title }}"
                    class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Masukkan judul chapter.." required>
            </div>


            {{-- Video URL --}}
            <div class="mb-4">
                <label for="content" class="block mb-2 font-medium text-gray-700">Content</label>
                <textarea placeholder="Describe yourself here..." name="content" id="content"
                    class="w-full p-2 border border-gray-300 rounded-lg" rows="3"> {{ $article->content }}</textarea>
            </div>

            {{-- Submit and Cancel Buttons --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600">
                    Update Chapter
                </button>
                <a href="{{ route('admin.courses.chapters.edit', ['chapter' => $chapter, 'course' => $course]) }}"
                    class="ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
