<?php

namespace App\Services;

interface UserService {
    public function storeUserService($attribute);
    public function loginUserService($attribute);
    public function logoutUserService();
}
