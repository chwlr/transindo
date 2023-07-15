<?php

namespace App\Services\Implementation;

use App\Repositories\CarRepository;
use App\Services\CarService;

class CarServiceImpl implements CarService
{
    private CarRepository $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function storeCarService($attribute)
    {
        return $this->carRepository->storeCar($attribute);
    }

    public function filterCarsService($filter, $value)
    {
        return $this->carRepository->filterCars($filter, $value);
    }
}
