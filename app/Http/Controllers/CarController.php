<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Services\CarService;
use http\Client\Request;

class CarController extends Controller
{
    private CarService $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function store(StoreCarRequest $request)
    {
        $attribute = $request->only(['brand', 'model', 'numberPlate', 'rates', 'availability']);
        return $this->carService->storeCarService($attribute);
    }

    public function filterCars($filter, $value)
    {
        return $this->carService->filterCarsService($filter, $value);
    }
}
