<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(Request $request): JsonResponse
    {
        $attribute = $request->safe()->only(['name', 'email', 'password', 'phoneNumber', 'driverLicense', 'status']);
        $data = $this->userService->storeUserService($attribute);
        return response()->json($data['data'], $data['token'], $data['statusCode']);
    }
}
