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
        return view('user.courses.chapter', compact('course', 'chapter'));
    }

    public function quiz(Course $course, Chapter $chapter)
    {
        $quiz = $chapter->quiz;
        $questions = $quiz->questions;

        return view('user.courses.quiz', compact('course', 'chapter', 'quiz', 'questions'));
    }
}
