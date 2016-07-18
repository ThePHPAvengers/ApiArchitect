<?php

$api = app('Dingo\Api\Routing\Router');

// Version 1 of our API
$api->version('v1', function ($api)
{

    // Set our namespace for the underlying routes
    $api->group(['namespace' => 'Api\Controllers',
        'middleware' =>
            '\Barryvdh\Cors\HandleCors::class',
        '\Api\Middleware\HttpLog::class'],

        function ($api) {

            // V1 Routes
            $api->group(['prefix' => 'v1'], function ($api)
            {
                // Socialite Callback Routes
                $api->group(['prefix' => 'social'], function ($api)
                {
                    $api->group(['prefix' => 'auth'], function ($api)
                    {
                        $api->get('facebook', 'Auth\OAuth\facebookController@redirectToProvider');
                        $api->get('github/facebook', 'Auth\OAuth\facebookController@handleProviderCallback');
                    });
                });

                // User Reset Routes
                $api->group(['prefix' => 'users'], function ($api)
                {
                    // Password reset link request routes...
                    $api->get('password/email', 'Auth\PasswordController@getEmail');
                    $api->post('password/email', 'Auth\PasswordController@postEmail');

                    // Password reset routes...
                    $api->get('password/reset/{token}', 'Auth\PasswordController@getReset');
                    $api->post('password/reset', 'Auth\PasswordController@postReset');
                });

                // JWT Routes
                $api->group(['prefix' => 'jwt'], function ($api)
                {
                    $api->group(['prefix' => 'auth'], function ($api)
                    {
                        // Login route
                        $api->post('login', 'Auth\JWTController@authenticate');
                        $api->post('register', 'Auth\JWTController@register');

                        // Dogs! All routes in here are protected and thus need a valid token
                        //$api->group( [ 'protected' => true, 'middleware' => 'jwt.refresh' ], function ($api) {
                        $api->group( [ 'middleware' => 'jwt.auth' ], function ($api)
                        {
                            $api->get('dogs', 'DogsController@index');
                            $api->get('users/me', 'Auth\JWTController@me');//@TODO BROKEN
                            $api->post('dogs', 'DogsController@store');
                            $api->get('dogs/{id}', 'DogsController@show');
                            $api->put('dogs/{id}', 'DogsController@update');
                            $api->delete('dogs/{id}', 'DogsController@destroy');
                            $api->get('validate_token', 'Auth\JWTController@validateToken');
                        });

                    });

                    // Oauth Provider Routes
                    $api->group(['prefix' => 'oauth'], function ($api)
                    {

                    });
                });
            });
        });
});