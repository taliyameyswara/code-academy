<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class ArticleController
{
    public function create(Course $course, Chapter $chapter)
    {
        return view('admin.articles.create', compact('chapter', 'course'));
    }

    public function store(Course $course, Request $request, Chapter $chapter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $chapter->articles()->create($request->only('title', 'content'));

        return redirect()
            ->route('admin.courses.chapters.edit', ['course' => $chapter->course_id, 'chapter' => $chapter->id])
            ->with('success', 'Article added successfully.');
    }

    public function edit(Course $course, Chapter $chapter, Article $article)
    {
        return view('admin.articles.edit', compact('course', 'chapter', 'article'));
    }

    public function update(Request $request, Course $course, Chapter $chapter, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update($request->only('title', 'content'));

        return redirect()
            ->route('admin.courses.chapters.edit', ['course' => $chapter->course_id, 'chapter' => $chapter->id])
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Course $course, Chapter $chapter, Article $article)
    {
        $article->delete();

        return redirect()
            ->route('admin.courses.chapters.edit', ['course' => $chapter->course_id, 'chapter' => $chapter->id])
            ->with('success', 'Article deleted successfully.');
    }
}
