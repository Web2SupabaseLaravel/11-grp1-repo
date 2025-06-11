<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersApiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

/**
 * Auth Routes (Register, Login, Logout, Me)
 */
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/register', [AuthController::class, 'register'])->name('api.register');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

/**
 * Optional: Show registration form (for web, not API)
 */
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

/**
 * Example custom registration (directly in route) – not needed if using controller
 */
Route::post('/register-direct', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'User registered successfully!',
        'user' => $user
    ]);
});

/**
 * Users API Resource (CRUD)
 */
Route::apiResource('users', UsersApiController::class);

/**
 * Sample Protected API Route
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Example: Products Route (if you have a ProductController)
 */
Route::middleware('api')->get('/products', [ProductController::class, 'index']);
