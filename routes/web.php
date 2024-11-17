<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CourseController as UserCourseController;
use Illuminate\Support\Facades\Route;


// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/help', [HomeController::class, 'help'])->name('help');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::put('/profile', [HomeController::class, 'updateProfile'])->name('profile.update');


// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Course Routes
    Route::resource('courses', CourseController::class);

    // Chapter Routes
    Route::prefix('courses/{course}')->name('courses.')->group(function () {
        Route::resource('chapters', ChapterController::class)->except(['index', 'show']);
    });

    // Quiz Routes
    Route::prefix('courses/{course}/chapters/{chapter}')->name('chapters.')->group(function () {
        Route::resource('quizzes', QuizController::class)->except(['index', 'show']);
        Route::resource('articles', ArticleController::class)->except(['index', 'show']);
    });

    // Question Routes
    Route::prefix('quizzes/{quiz}/questions')->name('quizzes.questions.')->group(function () {
        Route::get('{question}/edit', [QuestionController::class, 'edit'])->name('edit');
        Route::put('{question}', [QuestionController::class, 'update'])->name('update');
        Route::delete('{question}', [QuestionController::class, 'destroy'])->name('destroy');
    });
});


// User Routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('courses')->name('courses.')->group(function () {
        Route::get('/{course}', [UserCourseController::class, 'show'])->name('show');
        Route::get('/{course}/chapter/{chapter}', [UserCourseController::class, 'chapter'])->name('chapter');
        Route::get('/{course}/chapter/{chapter}/quiz', [UserCourseController::class, 'quiz'])->name('quiz');
    });
});
