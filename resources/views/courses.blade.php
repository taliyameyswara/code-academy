@extends('layouts.app')

@section('title', 'Welcome to CodeAcademy')

@section('content')
    {{-- Courses Section --}}
    <section id="courses" class="container mx-auto py-20 px-4">

        <h3 class="text-2xl text-center font-bold text-green uppercase">semua</h3>
        <h1 class="text-[4rem] text-center font-bold text-green mb-6 uppercase">Kursus</h1>

        {{-- List of Courses --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    {{-- Gambar --}}
                    <img src="{{ asset($course->image ? $course->image : 'https://cms-assets.themuse.com/media/lead/01212022-1047259374-coding-classes_scanrail.jpg') }}"
                        alt="{{ $course->title }}" class="w-full h-40 object-cover">

                    {{-- Konten --}}
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $course->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ $course->description }}</p>
                        <a href="{{ route('courses.show', $course) }}"
                            class="mt-4 flex items-center ml-auto gap-2 px-3 rounded-lg text-sm bg-primary text-white p-2 w-fit">
                            Lihat Kursus
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
