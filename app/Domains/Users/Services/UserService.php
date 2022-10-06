<?php

namespace App\Domains\Users\Services;

use App\Domains\Users\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function register($request)
    {
        $user = $this->user_repository->create($request);
        return $user->createToken("USER TOKEN")->plainTextToken;
    }

    public function login($request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return false;
        }

        $user = $this->user_repository->findWithEmail($request->email);

        return $user->createToken("USER TOKEN")->plainTextToken;
    }

}
