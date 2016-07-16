<?php

namespace Api\Controllers\Auth;

use Api\Controllers\ApiController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * PasswordController constructor.
     *
     * Create a new password controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
