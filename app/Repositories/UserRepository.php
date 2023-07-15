<?php

namespace App\Repositories;

interface UserRepository {
    public function storeUser($attribute);
    public function loginUser($attribute);
    public function logoutUser();
}
