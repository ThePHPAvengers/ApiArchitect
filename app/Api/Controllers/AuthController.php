<?php

namespace Api\Controllers;

use Api\Transformers\UserTransformer;
use Dingo\Api\Facade\API;
use Illuminate\Http\Request;
use Api\Requests\UserRequest;
use Illuminate\Support\Collection;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use ApiArchitect\Repositories\User\UserRepository;

/**
 * Class AuthController
 *
 * @package Api\Controllers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class AuthController extends BaseController
{

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
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function me(Request $request)
    {
        $transformer = new UserTransformer();

        return response()->json(
            Collection::make(
                $transformer->transform($this->userRepository->find(
                    JWTAuth::parseToken()->authenticate()
                )
            )
        ));
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
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    /**
     * @return mixed
     */
    public function validateToken() 
    {
        // Our routes file should have already authenticated this token, so we just return success here
        return API::response()->array(['status' => 'success'])->statusCode(200);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
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

        return response()->json(compact('token'));
    }
}