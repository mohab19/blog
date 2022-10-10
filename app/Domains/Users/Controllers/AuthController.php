<?php

namespace App\Domains\Users\Controllers;

use App\Domains\Users\Requests\UserRegisterRequest;
use App\Domains\Users\Requests\UserLoginRequest;
use App\Domains\Users\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    /**
     * create a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(UserRegisterRequest $request)
    {
        $user = $this->user_service->register($request->input());
        return customResponse(['user' => $user], 200, "User Created Successfully !");
    }

    /**
     * create a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(UserLoginRequest $request)
    {
        $token = $this->user_service->login($request);

        if($token) {
            return customResponse(['token' => $token], 200, "User Logged in Successfully !");
        }

        return customResponse([], 400, "email or password is incorrect !");
    }

}
