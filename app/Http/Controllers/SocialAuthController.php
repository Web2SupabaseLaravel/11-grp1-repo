<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
        // البحث عن مستخدم مسجل مسبقاً بواسطة الـ provider_id والـ provider
        $user = User::where('provider_id', $socialUser->getId())
                    ->where('provider', $provider)
                    ->first();

        if (!$user) {
            // إذا لم يكن موجوداً، نحاول إيجاده عبر البريد الإلكتروني
            $user = User::where('email', $socialUser->getEmail())->first();
        }

        if (!$user) {
            // إنشاء مستخدم جديد
            $user = User::create([
                'name'       => $socialUser->getName() ?? $socialUser->getNickname(),
                'email'      => $socialUser->getEmail(),
                'provider'   => $provider,
                'provider_id'=> $socialUser->getId(),
            ]);
        }

        // ... (تابع تسجيل الدخول أو إصدار توكن حسب الحاجة)
   
            Auth::login($user);

            return redirect()->intended('/dashboard'); // غيرها حسب الصفحة المطلوبة

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong!' . ucfirst($provider));
        }
    }
}
