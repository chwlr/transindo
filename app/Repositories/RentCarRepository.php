<?php

namespace App\Repositories;

interface RentCarRepository {
    public function rentCar($attribute);
    public function activeRent();
}
