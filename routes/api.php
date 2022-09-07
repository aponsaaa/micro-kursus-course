<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ImageCourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Group routes Mentor
Route::controller(MentorController::class)->group(function () {
    Route::get('/mentors', 'index');
    Route::get('/mentors/{id}', 'show');
    Route::post('/mentors', 'create');
    Route::put('/mentors/{id}', 'update');
    Route::delete('/mentors/{id}', 'destroy');
});

// Group routes Courses
Route::controller(CourseController::class)->group(function () {
    Route::get('/courses', 'index');
    Route::get('/courses/{id}', 'show');
    Route::post('/courses', 'create');
    Route::put('/courses/{id}', 'update');
    Route::delete('/courses/{id}', 'destroy');
});

// Group routes Chapters
Route::controller(ChapterController::class)->group(function () {
    Route::get('/chapters', 'index');
    Route::get('/chapters/{id}', 'show');
    Route::post('/chapters', 'create');
    Route::put('/chapters/{id}', 'update');
    Route::delete('/chapters/{id}', 'destroy');
});

// Group routes Lessons
Route::controller(LessonController::class)->group(function () {
    Route::get('/lessons', 'index');
    Route::get('/lessons/{id}', 'show');
    Route::post('/lessons', 'create');
    Route::put('/lessons/{id}', 'update');
    Route::delete('/lessons/{id}', 'destroy');
});

// Group routes Image Courses
Route::controller(ImageCourseController::class)->group(function () {
    Route::post('/image-courses', 'create');
    Route::delete('/image-courses/{id}', 'destroy');
});

// Group routes My Courses
Route::controller(MyCourseController::class)->group(function () {
    Route::get('/my-courses', 'index');
    Route::post('/my-courses', 'create');
    Route::delete('/my-courses/{id}', 'destroy');
    Route::post('/my-courses/premium', 'createPremiumAccess');
});

// Group routes Review Courses
Route::controller(ReviewController::class)->group(function () {
    Route::get('/review', 'index');
    Route::get('/review/{id}', 'show');
    Route::post('/review', 'create');
    Route::put('/review/{id}', 'update');
    Route::delete('/review/{id}', 'destroy');
});









// Route::get('call-helper', function () {

//     $mdY = convertYmdToMdy('2022-02-12');
//     var_dump("Converted into 'MDY': " . $mdY);

//     $ymd = convertMdyToYmd('02-12-2022');
//     var_dump("Converted into 'YMD': " . $ymd);
// });

// Route::post('mentors', 'MentorController@create');
// Route::post('/mentors', [MentorController::class, 'create']);
// Route::put('/mentors/{$id}', [MentorController::class, 'update']);