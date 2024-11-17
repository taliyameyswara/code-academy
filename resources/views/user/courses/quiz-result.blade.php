@extends('layouts.app')

@section('title', "Hasil Quiz Bab {$chapter->title}")

@section('content')
    <div class="min-h-[90vh] bg-[#FFF9EB] flex flex-col items-center justify-center py-10 px-4">
        <div class="w-full max-w-4xl text-center mb-3">
            <h1 class="text-[5rem] font-bold text-primary">SELAMAT</h1>
            <h2 class="text-3xl font-bold text-secondary">Kamu Sudah Menyelesaikan Test</h2>
            <h2 class="text-3xl font-bold text-green">"{{ $chapter->title }}"</h2>
        </div>

        <div class="w-full max-w-4xl text-center">
            <div class="flex gap-3 justify-center">
                <p class="text-green-500 font-medium text-green">Jawaban Benar: {{ $quizResults['correct_answers'] }}
                </p>
                <p class="text-red-500 font-medium">Jawaban Salah: {{ $quizResults['wrong_answers'] }}</p>
            </div>

            <div class="flex justify-center mt-6">
                <a href="{{ route('courses.chapter.show', ['course' => $course, 'chapter' => $chapter]) }}"
                    class="bg-green text-white flex items-center px-4 py-2 rounded-lg shadow">
                    <span class="mr-2">←</span> Kembali
                </a>
            </div>
        </div>
    @endsection
