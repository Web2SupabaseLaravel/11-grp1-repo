<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
Route::resource('datausers', UsersController::class);
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/login', function () {
    return view('login');
})->name('login');
use Illuminate\Support\Facades\Password;
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');
use App\Http\Controllers\SocialAuthController;

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('register', function() {
    return view('auth.register');
})->name('register');

Route::post('register', [RegisterController::class, 'register']);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    return redirect('/login')->with('success', 'Account created successfully!');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
// routes/web.php
use App\Http\Controllers\Auth\LoginController;
Route::get('/register', function () {
    return view('register'); // أو حسب اسم ملف Blade الخاص بك
})->name('register');
// routes/web.php
Route::get('/register', function () {
    return view('register'); // أو حسب اسم ملف Blade الخاص بك
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
// تسجيل الدخول الاجتماعي
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

require __DIR__.'/auth.php';
