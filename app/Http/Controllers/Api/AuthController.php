<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        // السماح فقط بتسجيل الدخول بدون توكن
        $this->middleware('auth:sanctum')->except(['login']);
    }

    /**
     * تسجيل الدخول وإرجاع توكن للمستخدم
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        // حذف التوكنات القديمة (اختياري)
        $user->tokens()->delete();

        // إصدار توكن جديد
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    /**
     * إرجاع بيانات المستخدم الحالي
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * تسجيل الخروج
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
