<?php

$api = app('Dingo\Api\Routing\Router');

// Version 1 of our API
$api->version('v1', function ($api)
{

    // Set our namespace for the underlying routes
    $api->group([
        'middleware' =>
            '\Barryvdh\Cors\HandleCors::class',
        '\ApiArchitect\Log\Middleware\RequestLog::class'],

        function ($api) {

            // V1 Routes
            $api->group(['prefix' => 'v1'], function ($api)
            {

                // Socialite Callback Routes
                $api->group(['namespace' => '\ApiArchitect\Auth\Http\Controllers'], function ($api)
                {
                    // User Reset Routes
                    $api->group(['prefix' => 'users'], function ($api)
                    {
                        // Login route
                        $api->post('login', 'JWTController@authenticate');//@TODO bind this to a config option
                        $api->post('register', 'JWTController@register');

                        // Password reset link request routes...
                        $api->get('password/email', 'PasswordController@getEmail');
                        $api->post('password/email', 'PasswordController@postEmail');

                        // Password reset routes...
                        $api->get('password/reset/{token}', 'PasswordController@getReset');
                        $api->post('password/reset', 'PasswordController@postReset');

                        $api->group( [ 'middleware' => 'jwt.auth' ], function ($api)
                        {
                            $api->get('users/me', 'JWTController@me');//@TODO BROKEN
                        });
                    });

                    $api->group(['prefix' => 'auth'], function ($api)
                    {
                        $api->group( [ 'middleware' => 'jwt.auth' ], function ($api)
                        {
                            $api->get('validate_token', 'JWTController@validateToken');
                        });
                    });

                    // Oauth Provider Routes
                    $api->group(['prefix' => 'oauth'], function ($api)
                    {
                        $api->get('facebook', 'OAuth\FacebookController@redirectToProvider');
                        $api->get('github', 'OAuth\FacebookController@handleProviderCallback');
                    });

                });

                $api->group(['namespace' => '\ApiArchitect\Http\Controllers'], function ($api)
                {
                    // Dogs! All routes in here are protected and thus need a valid token
                    //$api->group( [ 'protected' => true, 'middleware' => 'jwt.refresh' ], function ($api) {
                    $api->group( [ 'middleware' => 'jwt.auth' ], function ($api)
                    {
                        $api->get('dogs', 'DogsController@index');
                        $api->post('dogs', 'DogsController@store');
                        $api->get('dogs/{id}', 'DogsController@show');
                        $api->put('dogs/{id}', 'DogsController@update');
                        $api->delete('dogs/{id}', 'DogsController@destroy');
                    });
                });
            });
        });
});