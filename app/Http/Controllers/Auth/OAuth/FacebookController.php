<?php

namespace Api\Controllers\Auth\OAuth;

use Laravel\Socialite\Facades\Socialite;
use ApiArchitect\Contracts\Auth\OAuthCallBackControllerContract;

/**
 * Class FacebookController
 * 
 * @package Api\Controllers\Auth\Social
 */
class FacebookController implements OAuthCallBackControllerContract
{

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
    }
}