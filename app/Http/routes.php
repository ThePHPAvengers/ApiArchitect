<?php

$api = app('Dingo\Api\Routing\Router');

// Version 1 of our API
$api->version('v1', function ($api)
{

	// Set our namespace for the underlying routes
	$api->group(['namespace' => 'Api\Controllers',
        'middleware' =>
            '\Barryvdh\Cors\HandleCors::class',
            '\Api\Middleware\HttpLog::class'], function ($api)
    {
		// Login route
		$api->post('login', 'AuthController@authenticate');
		$api->post('register', 'AuthController@register');

        // Password reset link request routes...
        $api->get('password/email', 'Auth\PasswordController@getEmail');
        $api->post('password/email', 'Auth\PasswordController@postEmail');

        // Password reset routes...
        $api->get('password/reset/{token}', 'Auth\PasswordController@getReset');
        $api->post('password/reset', 'Auth\PasswordController@postReset');

		// Dogs! All routes in here are protected and thus need a valid token
		//$api->group( [ 'protected' => true, 'middleware' => 'jwt.refresh' ], function ($api) {
		$api->group( [ 'middleware' => 'jwt.auth' ], function ($api)
        {
			$api->get('dogs', 'DogsController@index');
            $api->get('users/me', 'AuthController@me');//@TODO BROKEN
            $api->post('dogs', 'DogsController@store');
			$api->get('dogs/{id}', 'DogsController@show');
            $api->put('dogs/{id}', 'DogsController@update');
            $api->delete('dogs/{id}', 'DogsController@destroy');
            $api->get('validate_token', 'AuthController@validateToken');
		});
    });
});