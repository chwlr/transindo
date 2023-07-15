<?php

namespace App\Repositories\Implementation;

use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class UserRepositoryImpl implements UserRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function storeUser($attribute): array
    {
        try {
            DB::beginTransaction();
            $stored = $this->user->create([
                'name' => data_get($attribute, 'name'),
                'email' => data_get($attribute, 'email'),
                'password' => data_get($attribute, 'password'),
                'phoneNumber' => data_get($attribute, 'phoneNumber'),
                'driveLicense' => data_get($attribute, 'driveLicense'),
                'status' => data_get($attribute, 'status'),
            ]);
            $token = $stored->createToken('authToken')->plainTextToken;
            DB::commit();
            return ['data' => $stored, 'token' => $token, 'statusCode' => 201];
        } catch (Exception $e){
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function loginUser($attribute)
    {
        // TODO: Implement loginUser() method.
    }

    public function logoutUser()
    {
        // TODO: Implement logoutUser() method.
    }
}
