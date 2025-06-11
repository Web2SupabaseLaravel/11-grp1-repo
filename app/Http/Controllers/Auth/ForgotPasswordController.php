<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    // إرسال رابط إعادة تعيين كلمة المرور
    public function sendResetLinkEmail(Request $request)
    {
        // التحقق من صحة البريد
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // إرسال الرابط
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'message' => 'Reset link sent successfully.',
                'status' => __($status)
            ], 200);
        }

        return response()->json([
            'message' => 'Unable to send reset link.',
            'status' => __($status)
        ], 500);
    }
}
