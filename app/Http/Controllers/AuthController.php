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
 * Class BaseAuthController
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
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function me(Request $request)
    {
        return $this->sendResponse($this->makeCollection($this->userRepository->find(JWTAuth::parseToken()->authenticate())))
            ->statusCode(200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->sendResponse(Collection::make(['error' => 'invalid_credentials']))->statusCode(401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->sendResponse(Collection::make(['error' => 'could_not_create_token']))->statusCode(500);
        }

        // all good so return the token
        return $this->sendResponse(Collection::make(compact('token')))->statusCode(200);
    }

    /**
     * @return mixed
     */
    public function validateToken()
    {
        // Our routes file should have already authenticated this token, so we just return success here
        return $this->sendResponse(Collection::make(['status' => 'success'])->statusCode(200));
    }

    /**
     * @param UserRequest $request
     * @return \Dingo\Api\Http\Response
     */
    public function register(UserRequest $request)
    {
        $user = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        $user = $this->userRepository->create($user);

        $token = JWTAuth::fromUser($user);

        return $this->sendResponse(Collection::make(compact('token')))->statusCode(200);
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