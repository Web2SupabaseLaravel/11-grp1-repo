<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\SocialAuthController;

Route::view('/dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

Route::view('/profile', 'profile')->middleware(['auth'])->name('profile');

Route::resource('datausers', UsersController::class);

// Authentication Routes

Route::get('/login', function () {

return view('auth.login');

})->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

// Forgot Password Routes

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Social Auth

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');

Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

// routes/api.php

Route::post('/login', [LoginController::class, 'login'])->name('api.login');
