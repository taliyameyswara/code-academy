@extends('layouts.admin')

@section('title', 'Edit Chapter')

@section('admin-content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Chapter for "{{ $course->title }}"</h1>

        {{-- Success/Error Messages --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form for Editing Chapter --}}
        <form action="{{ route('admin.courses.chapters.update', [$course, $chapter]) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            {{-- Chapter Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Chapter Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $chapter->title) }}"
                    class="w-full border border-gray-300 p-2 rounded-lg" required>
            </div>

            {{-- Chapter Content (Article) --}}
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-2">Content (Article)</label>
                <textarea name="content" id="content" rows="5" class="w-full border border-gray-300 p-2 rounded-lg">{{ old('content', $chapter->content) }}</textarea>
            </div>

            {{-- Video URL --}}
            <div class="mb-4">
                <label for="video_url" class="block text-gray-700 font-medium mb-2">Video URL</label>
                <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $chapter->video_url) }}"
                    class="w-full border border-gray-300 p-2 rounded-lg">
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-green-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-green-600">
                    Update Chapter
                </button>
                <a href="{{ route('admin.courses.edit', $course) }}"
                    class="ml-4 text-gray-600 hover:text-gray-800 p-3">Cancel</a>
            </div>
        </form>

        <hr class="my-10">

        {{-- Table for Quiz and Questions --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Quiz & Questions</h2>

        @if ($chapter->quiz)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-gray-700 mb-4">Quiz: {{ $chapter->quiz->title }}</h3>
                <table class="table-auto w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300">#</th>
                            <th class="px-4 py-2 border border-gray-300">Question</th>
                            <th class="px-4 py-2 border border-gray-300">Option A</th>
                            <th class="px-4 py-2 border border-gray-300">Option B</th>
                            <th class="px-4 py-2 border border-gray-300">Option C</th>
                            <th class="px-4 py-2 border border-gray-300">Option D</th>
                            <th class="px-4 py-2 border border-gray-300">Correct Option</th>
                            <th class="px-4 py-2 border border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($chapter->quiz->questions as $index => $question)
                            <tr>
                                <td class="px-4 py-2 border border-gray-300 text-center">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->question }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->option_a }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->option_b }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->option_c }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->option_d }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">
                                    {{ strtoupper($question->correct_option) }}</td>
                                <td class="px-4 py-2 border border-gray-300 text-center">
                                    <a href="{{ route('admin.quizzes.questions.edit', [$chapter->quiz, $question]) }}"
                                        class="text-blue-500 hover:text-blue-700 mr-1">Edit</a>
                                    <form
                                        action="{{ route('admin.quizzes.questions.destroy', [$chapter->quiz, $question]) }}"
                                        method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Are you sure you want to delete this question?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-gray-500 py-4">No questions available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500">No quiz available for this chapter. <a
                    href="{{ route('admin.quizzes.create', $chapter) }}" class="text-blue-500 hover:text-blue-700">Create a
                    Quiz</a></p>
        @endif
    </div>
@endsection
