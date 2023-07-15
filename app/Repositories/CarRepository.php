<?php

namespace App\Repositories;

interface CarRepository {
    public function storeCar($attribute);
    public function filterCars($filter, $value);
}
