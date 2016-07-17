<?php

namespace Api\Controllers\Auth\OAuth;

use ApiArchitect\Contracts\SocialiteCallBackControllerContract;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class GitHubController
 *
 * @package Api\Controllers\Auth\Social
 */
class GitHubController implements SocialiteCallBackControllerContract
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
    }
}