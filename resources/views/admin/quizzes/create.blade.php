@extends('layouts.admin')

@section('title', 'Create Quiz')

@section('admin-content')
    <div class="container px-4 py-10 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Create Quiz for Chapter: {{ $chapter->title }}</h1>

        @if ($errors->any())
            <div class="p-4 mb-6 text-red-800 bg-red-100 rounded">
                <ul class="pl-6 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.chapters.quizzes.store', ['chapter' => $chapter->id, 'course' => $chapter->course]) }}"
            method="POST" class="p-6 bg-white rounded-lg shadow-md">
            @csrf

            <h2 class="mb-4 text-xl font-bold text-gray-800">Questions</h2>
            <div id="question-container"></div>

            <button type="button" id="add-question"
                class="px-4 py-2 mb-6 font-semibold text-gray-800 bg-gray-200 rounded-lg shadow hover:bg-gray-300">
                Add Question
            </button>

            <button type="submit"
                class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600">
                Save Quiz
            </button>
        </form>
    </div>

    <script>
        let questionCount = 0;

        document.getElementById('add-question').addEventListener('click', function() {
            const container = document.getElementById('question-container');

            const questionHTML = `
            <div class="mb-4">
                <h5 class="mb-2 text-lg font-medium text-gray-700">Question </h5>
                <textarea name="questions[${questionCount}][question]" class="w-full p-2 border border-gray-300 rounded-lg" rows="3" required></textarea>
                <input type="text" name="questions[${questionCount}][option_a]" placeholder="Option A" class="w-full p-2 mt-2 border border-gray-300 rounded-lg" required>
                <input type="text" name="questions[${questionCount}][option_b]" placeholder="Option B" class="w-full p-2 mt-2 border border-gray-300 rounded-lg" required>
                <input type="text" name="questions[${questionCount}][option_c]" placeholder="Option C" class="w-full p-2 mt-2 border border-gray-300 rounded-lg" required>
                <input type="text" name="questions[${questionCount}][option_d]" placeholder="Option D" class="w-full p-2 mt-2 border border-gray-300 rounded-lg" required>
                <select name="questions[${questionCount}][correct_option]" class="w-full p-2 mt-2 border border-gray-300 rounded-lg" required>
                    <option value="a">Option A</option>
                    <option value="b">Option B</option>
                    <option value="c">Option C</option>
                    <option value="d">Option D</option>
                </select>
            </div>
        `;

            container.insertAdjacentHTML('beforeend', questionHTML);
            questionCount++;
        });
    </script>
@endsection
