@extends('layouts.admin')

@section('title', 'Edit Question')

@section('admin-content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Question</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.quizzes.questions.update', [$quiz, $question]) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="question" class="block text-gray-700 font-medium mb-2">Question</label>
                <textarea name="question" id="question" class="w-full border border-gray-300 p-2 rounded-lg" rows="3" required>{{ old('question', $question->question) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Options</label>
                <input type="text" name="option_a" value="{{ old('option_a', $question->option_a) }}"
                    placeholder="Option A" class="w-full border border-gray-300 p-2 rounded-lg mb-2" required>
                <input type="text" name="option_b" value="{{ old('option_b', $question->option_b) }}"
                    placeholder="Option B" class="w-full border border-gray-300 p-2 rounded-lg mb-2" required>
                <input type="text" name="option_c" value="{{ old('option_c', $question->option_c) }}"
                    placeholder="Option C" class="w-full border border-gray-300 p-2 rounded-lg mb-2" required>
                <input type="text" name="option_d" value="{{ old('option_d', $question->option_d) }}"
                    placeholder="Option D" class="w-full border border-gray-300 p-2 rounded-lg mb-2" required>
            </div>

            <div class="mb-4">
                <label for="correct_option" class="block text-gray-700 font-medium mb-2">Correct Option</label>
                <select name="correct_option" id="correct_option" class="w-full border border-gray-300 p-2 rounded-lg"
                    required>
                    <option value="a" {{ old('correct_option', $question->correct_option) === 'a' ? 'selected' : '' }}>
                        Option A</option>
                    <option value="b" {{ old('correct_option', $question->correct_option) === 'b' ? 'selected' : '' }}>
                        Option B</option>
                    <option value="c" {{ old('correct_option', $question->correct_option) === 'c' ? 'selected' : '' }}>
                        Option C</option>
                    <option value="d"
                        {{ old('correct_option', $question->correct_option) === 'd' ? 'selected' : '' }}>Option D</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-600">Update
                    Question</button>
                <a href="{{ route('admin.quizzes.questions.edit', [$quiz, $question]) }}"
                    class="ml-4 text-gray-600 hover:text-gray-800 p-3">Cancel</a>


            </div>
        </form>
    </div>
@endsection
