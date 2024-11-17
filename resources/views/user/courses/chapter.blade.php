@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="min-h-screen bg-[#FFF9EB] flex flex-col items-center py-10 px-4">
        <!-- Header -->
        <div class="w-full max-w-4xl flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-primary">{{ $chapter->title }}</h1>
            <a href="{{ route('courses.show', $course) }}"
                class="bg-green-500 text-white flex items-center px-4 py-2 rounded-lg shadow hover:bg-green-600">
                <span class="mr-2">←</span> Kembali
            </a>
        </div>

        <!-- Video Section -->
        <div class="w-full max-w-4xl mb-8">
            <iframe class="w-full h-64 rounded-lg shadow" src="https://www.youtube.com/embed/{{ $chapter->video_url }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>

        <!-- Artikel Section -->
        <div class="w-full max-w-4xl mb-10">
            <h2 class="text-xl font-bold text-secondary mb-4">Artikel</h2>
            @foreach ($chapter->articles as $article)
                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow mb-4">
                    <span class="text-primary font-semibold">{{ $article->title }}</span>
                    <a href="{{ $article->url }}"
                        class="bg-primary text-white flex items-center justify-center px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                        →
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Quiz Section -->
        @if ($chapter->quiz)
            <div class="w-full max-w-4xl">
                <h2 class="text-xl font-bold text-secondary mb-4">Quiz {{ $chapter->title }}</h2>
                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow">
                    <span class="text-primary font-semibold">Quiz {{ $chapter->title }}</span>
                    <a href="{{ route('courses.chapter.quiz', ['course' => $course, 'chapter' => $chapter]) }}"
                        class="bg-primary text-white flex items-center justify-center px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                        →
                    </a>
                </div>
            </div>
        @else
            <p class="text-gray-500 mt-4">Quiz belum tersedia untuk chapter ini.</p>
        @endif
    </div>
@endsection
