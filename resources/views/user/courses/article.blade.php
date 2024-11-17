@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="min-h-screen bg-light flex flex-col items-center py-10 px-4">
        <!-- Header -->
        <div class="w-full max-w-4xl flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-primary">{{ $article->title }}</h1>
            <a href="{{ route('courses.chapter.show', ['course' => $course, 'chapter' => $chapter]) }}"
                class="bg-green text-white flex items-center px-4 py-2 rounded-lg shadow hover:bg-green-600">
                <span class="mr-2">←</span> Kembali
            </a>
        </div>

        <!-- Article Content -->
        <div class="w-full max-w-4xl bg-white p-6 rounded-lg shadow">
            <p class="text-gray-700 text-lg leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </p>
        </div>
    </div>
@endsection
