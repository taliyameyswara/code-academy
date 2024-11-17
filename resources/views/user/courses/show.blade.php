@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="min-h-screen bg-light flex flex-col items-center py-10 px-4">
        <!-- Header -->
        <div class="w-full max-w-4xl flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-primary">{{ $course->title }}</h1>
            <a href="{{ route('landing') }}"
                class="bg-green text-white flex items-center px-4 py-2 rounded-lg shadow hover:bg-green-600">
                <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </span> Kembali
            </a>
        </div>

        <!-- Chapters List -->
        <div class="w-full max-w-4xl space-y-4">
            @forelse ($chapters as $chapter)
                <div class="flex justify-between items-center bg-white p-4 rounded-xl shadow">
                    <span class="text-primary font-semibold">Bab {{ $loop->iteration }}. {{ $chapter->title }}</span>
                    <a href="{{ route('courses.chapter.show', [$course, $chapter]) }}"
                        class="bg-primary text-white flex items-center justify-center px-4 py-2 rounded-lg shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            @empty
                <p class="text-gray-500">Belum ada bab untuk kursus ini.</p>
            @endforelse
        </div>
    </div>
@endsection
