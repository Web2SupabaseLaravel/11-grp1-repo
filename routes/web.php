<?php

// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('datacourses', CoursesController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');Route::get('/courses/delete', [CoursesController::class, 'deleteView'])->name('courses.delete.view');

Route::resource('courses', CoursesController::class);
Route::get('/createe', function () {
    return view('courses.createe');
})->name('courses.createe');
