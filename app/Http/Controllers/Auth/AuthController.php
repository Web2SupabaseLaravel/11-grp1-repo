<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        // استثناء login من حماية الـ middleware
        $this->middleware('auth:sanctum', ['except' => ['login']]);
        // لو ما تستخدم sanctum، غيره إلى 'auth' فقط
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Login successful',
                'user' => Auth::user(),
            ]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
