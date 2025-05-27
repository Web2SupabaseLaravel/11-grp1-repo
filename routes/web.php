<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
Route::resource('datausers', UsersController::class);
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
