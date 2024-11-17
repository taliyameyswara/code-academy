<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chapter;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController
{
    /**
     * Show the form for creating a new quiz for the chapter.
     */
    public function create(Chapter $chapter)
    {
        return view('admin.quizzes.create', compact('chapter'));
    }

    /**
     * Store a new quiz and its questions for the chapter.
     */
    public function store(Request $request, Chapter $chapter)
    {
        // Validate the request
        $validated = $request->validate([
            'questions' => 'required|array',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_option' => 'required|in:a,b,c,d',
        ]);

        // Create a new quiz for the chapter
        $quiz = $chapter->quiz()->create([
            'title' => "Quiz for Chapter: {$chapter->title}",
        ]);

        // Create questions for the quiz
        foreach ($validated['questions'] as $questionData) {
            $quiz->questions()->create($questionData);
        }

        // Redirect to the edit chapter page
        return redirect()
            ->route('admin.courses.chapters.edit', ['course' => $chapter->course_id, 'chapter' => $chapter->id])
            ->with('success', 'Quiz and its questions created successfully.');
    }
}
