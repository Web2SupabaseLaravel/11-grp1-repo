<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SocialAuthController;

Route::resource('datausers', UsersController::class);
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    Route::view('/login','auth.login')->name('login');
    Route::view('/register','auth.register')->name('register');


Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('./dashboard',function(){
    return view(dashboard);
})->middleware('auth')->name('dashboard');

    use App\Http\Controllers\Auth\LoginController;
    Route::post('./login',[LoginController::class,'login'])->name('login');
