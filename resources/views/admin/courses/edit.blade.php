@extends('layouts.admin')

@section('title', 'Edit Course')

@section('admin-content')
    <div class="container px-4 py-5 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Edit Course: "{{ $course->title }}"</h1>

        {{-- Success/Error Messages --}}
        @if (session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 mb-6 text-red-800 bg-red-100 rounded">
                <ul class="pl-6 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form for Editing Course --}}
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data"
            class="p-6 bg-white rounded-lg shadow-md">
            @csrf
            @method('PUT')

            {{-- Course Title --}}
            <div class="mb-4">
                <label for="title" class="block mb-2 font-medium text-gray-700">Course Title</label>
                <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded-lg"
                    placeholder="Edit judul kursus.." value="{{ old('title', $course->title) }}">
            </div>

            {{-- Course Description --}}
            <div class="mb-4">
                <label for="description" class="block mb-2 font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="5" class="w-full p-2 border border-gray-300 rounded-lg"
                    placeholder="Edit deskripsi kursus..">{{ old('description', $course->description) }}</textarea>
            </div>

            {{-- Image Input --}}
            <div class="mb-4">
                <label for="image" class="block mb-2 font-medium text-gray-700">Course Image</label>
                @if ($course->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                            class="object-cover w-32 h-32 rounded">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-lg">
                <small class="text-gray-500">Upload a new image to replace the current one (optional).</small>
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 font-semibold text-white bg-green rounded-lg shadow">Update
                    Course</button>
                <a href="{{ route('admin.courses.index') }}" class="p-3 ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>

        <hr class="my-10">

        {{-- Section for Managing Chapters --}}
        <div>
            <h2 class="mb-6 text-2xl font-bold text-gray-800">Chapters</h2>
            <a href="{{ route('admin.courses.chapters.create', $course) }}"
                class="inline-block px-4 py-2 mb-6 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600">
                Add New Chapter
            </a>

            @if ($course->chapters->isEmpty())
                <p class="text-gray-600">No chapters available for this course.</p>
            @else
                <table class="min-w-full overflow-hidden bg-white rounded-lg shadow-md">
                    <thead class="text-white bg-gray-800">
                        <tr>
                            <th class="px-4 py-3 text-left">#</th>
                            <th class="px-4 py-3 text-left">Title</th>
                            <th class="px-4 py-3 text-left">Content</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($course->chapters as $chapter)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $chapter->title }}</td>
                                <td class="px-4 py-3">{{ $chapter->content }}</td>
                                <td class="px-4 py-3 text-center">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin.courses.chapters.edit', [$course, $chapter]) }}"
                                        class="p-2 px-4 font-semibold text-white bg-yellow-500 rounded-lg">
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
