<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    /*=======================================
    *       OAuth Services
    =======================================*/
    'github' => [
        'client_id' => 'a40f0c884174cac83640',
        'client_secret' => '642964ea1032945c8e8aaf702c95f2e9aa19ed13',
        'redirect' => 'https://beta.material-colors.com/auth/github/callback',
    ],

    'google' => [
        'client_id' => '698974016228-sq9ivsukoo803qcbrjdt041ismnliol5.apps.googleusercontent.com',
        'client_secret' => 'IiGWjQg_sOSG7iivgAsLZe7a',
        'redirect' => 'https://beta.material-colors.com/auth/google/callback',
    ],

    'facebook' => [
        'client_id' => '546009546562305',
        'client_secret' => 'deb95b6ebb338b81b955f6ddb22abc9a',
        'redirect' => 'https://beta.material-colors.com/auth/facebook/callback',
    ],


];
