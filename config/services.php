<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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
    'client_id' => '147365422756295',         // Your GitHub Client ID
    'client_secret' => 'c34a60c897f156ddfccc3f2868bb7bdf', // Your GitHub Client Secret
    'redirect' => 'http://localhost:8000/login/facebook/callback',
],


    'twitter' => [
        'client_id' => 'KXfqVPrpVWard5maLRkqjRj1o',         // Your GitHub Client ID
        'client_secret' => 'vr5p7SNoEoa4nmIYiflkPOX9bKq7GKMXaPmmL9lJQUNXyTFq10', // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],

    'google' => [
        'client_id' => '340850668839-8bg50on94hp049gg6kbr2fn5jkrp1hp4.apps.googleusercontent.com',         // Your GitHub Client ID
        'client_secret' => 'DZXqRR-tCkvB52wCRsjD_JFu', // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],



];
