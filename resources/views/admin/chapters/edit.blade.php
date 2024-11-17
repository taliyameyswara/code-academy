@extends('layouts.admin')

@section('title', 'Edit Chapter')

@section('admin-content')
    <div class="container px-4 py-10 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Edit Chapter for "{{ $course->title }}"</h1>

        {{-- Success/Error Messages --}}
        @if (session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-6 text-red-800 bg-red-100 rounded">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form for Editing Chapter --}}
        <form action="{{ route('admin.courses.chapters.update', [$course, $chapter]) }}" method="POST"
            class="p-6 bg-white rounded-lg shadow-md">
            @csrf
            @method('PUT')

            {{-- Chapter Title --}}
            <div class="mb-4">
                <label for="title" class="block mb-2 font-medium text-gray-700">Chapter Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $chapter->title) }}"
                    class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            {{-- Video URL --}}
            <div class="mb-4">
                <label for="video_url" class="block mb-2 font-medium text-gray-700">Video URL</label>
                <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $chapter->video_url) }}"
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 font-semibold text-white bg-green rounded-lg shadow hover:bg-green-600">
                    Update Chapter
                </button>
                <a href="{{ route('admin.courses.edit', $course) }}"
                    class="p-3 ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>

        <hr class="my-10">

        {{-- Table for Quiz and Questions --}}
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Quiz & Questions</h2>

        @if ($chapter->quiz)
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="mb-4 text-xl font-bold text-gray-700">Quiz: {{ $chapter->quiz->title }}</h3>
                    <a href="{{ route('admin.chapters.quizzes.create', ['chapter' => $chapter->id, 'course' => $course->id]) }}"
                        class="p-2 text-white bg-primary rounded-xl">Create a
                        Quiz</a>
                </div>

                <table class="w-full border border-gray-300 table-auto">
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
                                <td class="px-4 py-2 text-center border border-gray-300">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->question }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->option_a }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->option_b }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->option_c }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $question->option_d }}</td>
                                <td class="px-4 py-2 text-center border border-gray-300">
                                    {{ strtoupper($question->correct_option) }}</td>
                                <td class="px-4 py-2 text-center border border-gray-300">
                                    <a href="{{ route('admin.quizzes.questions.edit', [$chapter->quiz, $question]) }}"
                                        class="mr-1 text-primary hover:text-blue-700">Edit</a>
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
                                <td colspan="8" class="py-4 text-center text-gray-500">No questions available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500">No quiz available for this chapter. <a
                    href="{{ route('admin.chapters.quizzes.create', ['chapter' => $chapter->id, 'course' => $course->id]) }}"
                    class="text-primary hover:text-blue-700">Create a
                    Quiz</a></p>
        @endif


        {{-- Table for Quiz and Questions --}}
        <h2 class="my-6 text-2xl font-bold text-gray-800">Artikel</h2>
        @if ($chapter->articles->count() > 0)
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="mb-4 text-xl font-bold text-gray-700">Artikel: </h3>
                    <a href="{{ route('admin.chapters.articles.create', ['chapter' => $chapter->id, 'course' => $course->id]) }}"
                        class="p-2 text-white bg-primary rounded-xl">Create a
                        Article</a>
                </div>


                <table class="w-full border border-gray-300 table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300">#</th>
                            <th class="px-4 py-2 border border-gray-300">Title</th>
                            <th class="px-4 py-2 border border-gray-300">Content</th>
                            <th class="px-4 py-2 border border-gray-300">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($chapter->articles as $index => $article)
                            <tr>
                                <td class="px-4 py-2 text-center border border-gray-300">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $article->title }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $article->content }}</td>
                                <td class="px-4 py-2 text-center border border-gray-300">
                                    <a href="{{ route('admin.chapters.articles.edit', ['course' => $course, 'chapter' => $chapter, 'article' => $article]) }}"
                                        class="mr-1 text-primary ">Edit</a>
                                    <form
                                        action="{{ route('admin.chapters.articles.destroy', ['course' => $course, 'chapter' => $chapter, 'article' => $article]) }}"
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
                                <td colspan="8" class="py-4 text-center text-gray-500">No questions available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500">No article available for this chapter. <a
                    href="{{ route('admin.chapters.articles.create', ['chapter' => $chapter->id, 'course' => $course->id]) }}"
                    class="text-primary">Create a
                    Article</a></p>
        @endif
    </div>
@endsection
