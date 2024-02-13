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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook'=>[
        'client_id'=>'1344460462917700',
        'client_secret'=>'4cdcab8bec558fc94b18248381198ec9',
        'redirect'=>'https://b1a5-2401-4900-1f86-31f6-d852-5065-ccdd-9282.ngrok-free.app/facebook/callback',
        'token'=>'EAATGx5hOiEQBOzt6MiVXLRs2bodFd7A680UcFfgHmpyYpPMQAhhXKfuD4gFKNgVxQyrpZCXN8fbALSdFgS2ti8uXPFX79xLhfBCYItceNs82MBdbSGsOjwPBul1ZAhsFk4ZBu6D7sKTJSZAd3YcZCDrdEHinKBUs4fYlZBo0NNbTMWeniVcSB7hALsbMGgqk7x3kBQgAk8qrkxgIN10sMBbdwZD',
        'expires_at'=>null,
    ]

];
