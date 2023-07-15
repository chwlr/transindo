<?php

namespace App\Services\Implementation;

use App\Repositories\UserRepository;
use App\Services\UserService;

class UserServiceImpl implements UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function storeUserService($attribute)
    {
        return $this->userRepository->storeUser($attribute);
    }

    public function loginUserService($attribute)
    {
        return $this->userRepository->loginUser($attribute);
    }

    public function logoutUserService()
    {
        return $this->userRepository->logoutUser();
    }
}
