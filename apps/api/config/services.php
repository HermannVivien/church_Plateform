<?php

return [
    'orange_money' => [
        'client_id' => env('ORANGE_MONEY_CLIENT_ID'),
        'client_secret' => env('ORANGE_MONEY_CLIENT_SECRET'),
        'merchant_key' => env('ORANGE_MONEY_MERCHANT_KEY'),
    ],

    'mtn_momo' => [
        'api_key' => env('MTN_MOMO_API_KEY'),
        'api_user' => env('MTN_MOMO_API_USER'),
        'subscription_key' => env('MTN_MOMO_SUBSCRIPTION_KEY'),
    ],

    'wave' => [
        'api_key' => env('WAVE_API_KEY'),
        'webhook_secret' => env('WAVE_WEBHOOK_SECRET'),
    ],
];
