@extends('layouts.admin')

@section('title', 'Manage Courses')

@section('admin-content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Courses</h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Button to Add New Course --}}
        <a href="{{ route('admin.courses.create') }}"
            class="bg-blue-500 text-white font-semibold py-3 px-4 rounded-lg shadow hover:bg-blue-600">
            Add New Course
        </a>

        {{-- Courses Table --}}
        <div class="mt-6">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">#</th>
                        <th class="py-3 px-4 text-left">Title</th>
                        <th class="py-3 px-4 text-left">Description</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($courses as $course)
                        <tr class="hover:bg-gray-100">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $course->title }}</td>
                            <td class="py-3 px-4">{{ $course->description }}</td>
                            <td class="py-3 px-4 text-center">
                                {{-- Edit Button --}}
                                <a href="{{ route('admin.courses.edit', $course) }}"
                                    class="bg-yellow-500 text-white p-2 px-4 rounded-lg font-semibold">Edit</a>

                                {{-- Delete Button --}}
                                <form action="{{ route('admin.courses.destroy', $course) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white p-1.5 px-4 rounded-lg font-semibold"
                                        onclick="return confirm('Are you sure you want to delete this course?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-600">No courses available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
