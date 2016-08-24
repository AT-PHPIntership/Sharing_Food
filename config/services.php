<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
    'client_id' => '345525852501669',
    'client_secret' => '38c13c21cd5e0da58c099df1a6799852',
    'redirect' => 'http://sharingfood.app/social/callback/facebook',
    ],

    'google' => [
    'client_id' => '982232916923-c7qaaud7j577muf0pdles65ihvtet1n8.apps.googleusercontent.com',
    'client_secret' => 'OQ9pTb97OXWhSMgXE3OymlN0',
    'redirect' => 'http://sharingfood.app/social/callback/google',
    ],
];
