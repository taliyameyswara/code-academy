<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class ChapterController
{
    public function create(Course $course)
    {
        return view('admin.chapters.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
        ]);

        $course->chapters()->create($request->only('title', 'content', 'video_url'));

        return redirect()->route('admin.courses.edit', $course)->with('success', 'Chapter added successfully.');
    }

    public function edit(Course $course, Chapter $chapter)
    {
        return view('admin.chapters.edit', compact('course', 'chapter'));
    }

    public function update(Request $request, Course $course, Chapter $chapter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
        ]);

        $chapter->update($request->only('title', 'content', 'video_url'));

        return redirect()->route('admin.courses.edit', $course)->with('success', 'Chapter updated successfully.');
    }

    public function destroy(Course $course, Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->route('admin.courses.edit', $course)->with('success', 'Chapter deleted successfully.');
    }
}
