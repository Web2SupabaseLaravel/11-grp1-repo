<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Supabase Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for the Supabase service.
    |
    */

    'url' => env('SUPABASE_URL', ''),
    'key' => env('SUPABASE_KEY', ''),
    'options' => [
        'schema' => 'public',
        'autoRefreshToken' => true,
        'persistSession' => true,
        'detectSessionInUrl' => true,
    ],
]; 