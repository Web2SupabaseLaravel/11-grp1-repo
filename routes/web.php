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
})->name('dashboard');
Route::post('/courses', [CoursesController::class, 'store']);