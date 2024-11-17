@extends('layouts.admin')

@section('title', 'Create Quiz')

@section('admin-content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create Quiz for Chapter: {{ $chapter->title }}</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.quizzes.store', $chapter) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <h2 class="text-xl font-bold text-gray-800 mb-4">Questions</h2>
            <div id="question-container"></div>

            <button type="button" id="add-question"
                class="bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-300 mb-6">
                Add Question
            </button>

            <button type="submit"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-600">
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
                <h5 class="text-lg font-medium text-gray-700 mb-2">Question #${questionCount + 1}</h5>
                <textarea name="questions[${questionCount}][question]" class="w-full border border-gray-300 p-2 rounded-lg" rows="3" required></textarea>
                <input type="text" name="questions[${questionCount}][option_a]" placeholder="Option A" class="w-full border border-gray-300 p-2 rounded-lg mt-2" required>
                <input type="text" name="questions[${questionCount}][option_b]" placeholder="Option B" class="w-full border border-gray-300 p-2 rounded-lg mt-2" required>
                <input type="text" name="questions[${questionCount}][option_c]" placeholder="Option C" class="w-full border border-gray-300 p-2 rounded-lg mt-2" required>
                <input type="text" name="questions[${questionCount}][option_d]" placeholder="Option D" class="w-full border border-gray-300 p-2 rounded-lg mt-2" required>
                <select name="questions[${questionCount}][correct_option]" class="w-full border border-gray-300 p-2 rounded-lg mt-2" required>
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
