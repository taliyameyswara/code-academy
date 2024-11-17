<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $courses = Course::all(); // Ambil semua data course
        return view('landing', compact('courses'));
    }

    public function help() {
        return view('help');
    }
    public function profile() {
        return view('profile');
    }
    public function courses() {
        $courses = Course::all();
        return view('courses', compact('courses'));
    }
}
