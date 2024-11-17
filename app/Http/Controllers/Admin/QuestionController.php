<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController
{
    /**
     * Show the form for editing a question.
     *
     * @param Quiz $quiz
     * @param Question $question
     * @return \Illuminate\View\View
     */
    public function edit(Quiz $quiz, Question $question)
    {
        // Pastikan pertanyaan terkait dengan kuis
        if ($question->quiz_id !== $quiz->id) {
            abort(404, 'Question not found in this quiz.');
        }

        return view('admin.questions.edit', compact('quiz', 'question'));
    }

    public function update(Request $request, Quiz $quiz, Question $question)
    {
    // Validasi input
    $validated = $request->validate([
        'question' => 'required|string',
        'option_a' => 'required|string',
        'option_b' => 'required|string',
        'option_c' => 'required|string',
        'option_d' => 'required|string',
        'correct_option' => 'required|in:a,b,c,d',
    ]);

    // Pastikan pertanyaan terkait dengan kuis
    if ($question->quiz_id !== $quiz->id) {
        abort(404, 'Question not found in this quiz.');
    }

    // Update pertanyaan
    $question->update($validated);

    // Redirect ke halaman edit chapter
    return redirect()
        ->route('admin.courses.chapters.edit', [
            'course' => $quiz->chapter->course->id,
            'chapter' => $quiz->chapter->id,
        ])
        ->with('success', 'Question updated successfully.');
    }

    public function destroy(Quiz $quiz, Question $question)
    {
        // Pastikan pertanyaan terkait dengan kuis
        if ($question->quiz_id !== $quiz->id) {
            abort(404, 'Question not found in this quiz.');
        }

        // Hapus pertanyaan
        $question->delete();

        // Redirect ke halaman edit chapter
        return redirect()
            ->route('admin.courses.chapters.edit', [
                'course' => $quiz->chapter->course->id,
                'chapter' => $quiz->chapter->id,
            ])
            ->with('success', 'Question deleted successfully.');
    }

}
