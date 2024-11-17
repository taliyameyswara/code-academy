@extends('layouts.admin')

@section('title', 'Edit Course')

@section('admin-content')
    <div class="container mx-auto py-5 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Course: "{{ $course->title }}"</h1>

        {{-- Success/Error Messages --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form for Editing Course --}}
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            {{-- Course Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Course Title</label>
                <input type="text" name="title" id="title" class="w-full border border-gray-300 p-2 rounded-lg"
                    placeholder="Edit judul kursus.." value="{{ old('title', $course->title) }}">
            </div>

            {{-- Course Description --}}
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="5" class="w-full border border-gray-300 p-2 rounded-lg"
                    placeholder="Edit deskripsi kursus..">{{ old('description', $course->description) }}</textarea>
            </div>

            {{-- Image Input --}}
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-2">Course Image</label>
                @if ($course->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                            class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="w-full border border-gray-300 p-2 rounded-lg">
                <small class="text-gray-500">Upload a new image to replace the current one (optional).</small>
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-green-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-green-600">Update
                    Course</button>
                <a href="{{ route('admin.courses.index') }}" class="ml-4 text-gray-600 hover:text-gray-800 p-3">Cancel</a>
            </div>
        </form>

        <hr class="my-10">

        {{-- Section for Managing Chapters --}}
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Chapters</h2>
            <a href="{{ route('admin.courses.chapters.create', $course) }}"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-600 mb-6 inline-block">
                Add New Chapter
            </a>

            @if ($course->chapters->isEmpty())
                <p class="text-gray-600">No chapters available for this course.</p>
            @else
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Title</th>
                            <th class="py-3 px-4 text-left">Content</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($course->chapters as $chapter)
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4">{{ $chapter->title }}</td>
                                <td class="py-3 px-4">{{ $chapter->content }}</td>
                                <td class="py-3 px-4 text-center">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin.courses.chapters.edit', [$course, $chapter]) }}"
                                        class="bg-yellow-500 text-white p-2 px-4 rounded-lg font-semibold">
                                        Edit
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('admin.courses.chapters.destroy', [$course, $chapter]) }}"
                                        method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white p-1.5 ml-2 px-4 rounded-lg font-semibold"
                                            onclick="return confirm('Are you sure you want to delete this chapter?');">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
