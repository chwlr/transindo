<?php

namespace App\Services;

interface CarService {
    public function storeCarService($attribute);
    public function filterCarsService($filter, $value);
}
