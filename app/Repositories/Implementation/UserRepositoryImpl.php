<?php

namespace App\Repositories\Implementation;

use App\Exceptions\GeneralJsonException;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepositoryImpl implements UserRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function storeUser($attribute): JsonResponse
    {
        try {
            DB::beginTransaction();
            $stored = $this->user->create([
                'name' => data_get($attribute, 'name'),
                'email' => data_get($attribute, 'email'),
                'password' => Hash::make(data_get($attribute, 'password')),
                'phoneNumber' => data_get($attribute, 'phoneNumber'),
                'driverLicense' => data_get($attribute, 'driverLicense'),
                'status' => data_get($attribute, 'status'),
            ]);
            $token = $stored->createToken('authToken')->plainTextToken;
            DB::commit();
            return (new UserResource($stored->fresh()))->additional(['message' => 'successfully registered'])->response()->setStatusCode(201);
        } catch (Exception $e){
            DB::rollBack();
            throw new GeneralJsonException($e->getMessage(), 400);
        }
    }

    public function loginUser($attribute): JsonResponse
    {
        if (Auth::attempt(['email' => data_get($attribute, 'email'), 'password' => data_get($attribute, 'password')]))
        {
            $authUser = Auth::user();
            $token = $authUser->createToken('authToken')->plainTextToken;
            return (new UserResource($authUser))->additional(['token' => $token])->response()->setStatusCode(200);
        } else {
            throw new GeneralJsonException('Invalid email or password', 400);
        }
    }

    public function logoutUser(): JsonResponse
    {
        try {
            $authUser = Auth::user();
            $authUser->currentAccessToken()->delete();
            return response()->json("goodbye");
        }catch (Exception $e)
        {
            throw new GeneralJsonException('Failed to logout user', 400);
        }
    }
}
