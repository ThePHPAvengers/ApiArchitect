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

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => ApiArchitect\Entities\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID','your-facebook-app-id'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET','your-facebook-app-secret'),
        'redirect' => env('FACEBOOK_REDIRECT','http://your-callback-url')
    ],

    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID','your-twitter-app-id'),
        'client_secret' => env('TWITTER_CLIENT_SECRET','your-twitter-app-secret'),
        'redirect' => env('TWITTER_REDIRECT','http://your-callback-url')
    ],

//    'linkedin' => [
//        'client_id' => env('LINKEDIN_CLIENT_ID','your-linkedin-app-id'),
//        'client_secret' => env('LINKEDIN_CLIENT_SECRET','your-linkedin-app-secret'),
//        'redirect' => env('LINKEDIN_REDIRECT','http://your-callback-url')
//    ],

//    'github' => [
//        'client_id' => env('GITHUB_CLIENT_ID','your-github-app-id'),
//        'client_secret' => env('GITHUB_CLIENT_SECRET','your-github-app-secret'),
//        'redirect' => env('GITHUB_REDIRECT','http://your-callback-url')
//    ],

//    'google' => [
//        'client_id' => env('GOOGLE_CLIENT_ID','your-google-app-id'),
//        'client_secret' => env('GOOGLE_CLIENT_SECRET','your-google-app-secret'),
//        'redirect' => env('GOOGLE_REDIRECT','http://your-callback-url')
//    ],

//    'bitbucket' => [
//        'client_id' => env('BITBUCKET_CLIENT_ID','your-bitbucket-app-id'),
//        'client_secret' => env('BITBUCKET_CLIENT_SECRET','your-bitbucket-app-secret'),
//        'redirect' => env('BITBUCKET_REDIRECT','http://your-callback-url')
//    ],
];