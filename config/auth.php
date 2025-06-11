<?php

return [

    'defaults' => [
        // الافتراضي غالباً يكون 'api' هنا صحيح
        'guard' => env('AUTH_GUARD', 'api'),

        // الكلمة الصحيحة هي 'passwords' وليس 'passwords' (تصحيح الخطأ الطباعي)
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'jwt', // تأكد أنك مركب ومفعل حزمة tymon/jwt-auth
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            // هنا عادةً تكتب مباشرة المسار للنموذج، بدون env لأنها ثابتة
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            // تأكد من اسم الجدول الصحيح حسب Laravel، غالباً يكون 'password_resets'
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
