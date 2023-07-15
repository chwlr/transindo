<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(StoreUserRequest $request)
    {
        $attribute = $request->only(['name', 'email', 'password', 'phoneNumber', 'driverLicense', 'status']);
        return $this->userService->storeUserService($attribute);
    }

    public function login(Request $request)
    {
        $attribute = $request->only(['email', 'password']);
        return $this->userService->loginUserService($attribute);

    }

    public function logout()
    {
        return $this->userService->logoutUserService();
    }

}
