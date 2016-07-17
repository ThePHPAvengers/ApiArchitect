<?php

namespace ApiArchitect\Contracts;

/**
 * Interface SocialiteCallBackControllerContract
 *
 * @package ApiArchitect\Contracts
 */
interface SocialiteCallBackControllerContract
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider();

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback();

}