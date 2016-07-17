<?php

namespace Api\Controllers;

use Illuminate\Http\Request;
use Api\Requests\UserRequest;
use Api\Controllers\ApiController;
use Illuminate\Support\Collection;
use Tymon\JWTAuth\Facades\JWTAuth;
use Api\Transformers\UserTransformer;
use Tymon\JWTAuth\Exceptions\JWTException;
use ApiArchitect\Repositories\UserRepository;

/**
 * Class AuthController
 *
 * @package Api\Controllers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class AuthController extends ApiController
{

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * AuthController constructor.
     *
     * Create a new authentication controller instance.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->transformer = new UserTransformer();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Dingo\Api\Http\Response
     */
    protected function create(array $data)
    {
        return $this->sendResponse(Collection::make($this->userRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ])))->statusCode(200);
    }
}