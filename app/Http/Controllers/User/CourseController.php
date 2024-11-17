<?php

namespace App\Http\Controllers\User;

use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController
{
    public function index()
    {
        $courses = Course::all();
        return view('user.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $chapters = $course->chapters;
        return view('user.courses.show', compact('course', 'chapters'));
    }
    public function chapter(Course $course, Chapter $chapter)
    {
        $articles = $chapter->articles;
        $quiz = $chapter->quiz;

        return view('user.courses.chapter', compact('course', 'chapter', 'articles', 'quiz'));
    }

    public function article(Course $course, Chapter $chapter, $articleId)
    {
        $article = $chapter->articles()->findOrFail($articleId);

        return view('user.courses.article', compact('course', 'chapter', 'article'));
    }

    // public function quiz(Course $course, Chapter $chapter)
    // {
    //     $quiz = $chapter->quiz;

    //     if (!$quiz) {
    //         return redirect()->route('courses.chapter', ['course' => $course, 'chapter' => $chapter])
    //             ->with('error', 'Quiz belum tersedia untuk chapter ini.');
    //     }

    //     $questions = $quiz->questions;

    //     return view('user.courses.quiz', compact('course', 'chapter', 'quiz', 'questions'));
    // }

    public function quiz(Course $course, Chapter $chapter)
    {
        $quiz = $chapter->quiz;
        $questions = $quiz->questions;

        return view('user.courses.quiz', compact('course', 'chapter', 'quiz', 'questions'));
    }


    public function submitTest(Course $course, Chapter $chapter, Request $request)
{
    $quiz = $chapter->quiz;
    $questions = $quiz->questions;

    // Ambil jawaban user
    $userAnswers = $request->input('answers', []);

    // Hitung jawaban benar dan salah
    $correctAnswers = 0;
    $wrongAnswers = 0;

    foreach ($questions as $question) {
        if (isset($userAnswers[$question->id]) && $userAnswers[$question->id] === $question->correct_option) {
            $correctAnswers++;
        } else {
            $wrongAnswers++;
        }
    }

    // Total pertanyaan
    $totalQuestions = $questions->count();

    // Simpan hasil di session
    session()->put('quiz_results', [
        'total_questions' => $totalQuestions,
        'correct_answers' => $correctAnswers,
        'wrong_answers' => $wrongAnswers,
    ]);

    return redirect()->route('courses.chapter.quiz.quiz-result', [
        'course' => $course,
        'chapter' => $chapter,
    ]);
}



public function quizResult(Course $course, Chapter $chapter)
{
    $quizResults = session('quiz_results'); // Ambil data dari session

    // Jika tidak ada hasil di session, redirect ke halaman quiz
    if (!$quizResults) {
        return redirect()->route('courses.chapter.quiz', [
            'course' => $course,
            'chapter' => $chapter,
        ])->with('error', 'No quiz result available.');
    }

    return view('user.courses.quiz-result', compact('course', 'chapter', 'quizResults'));
}


}
