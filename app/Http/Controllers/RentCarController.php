<?php

namespace App\Http\Controllers;

use App\Services\RentCarService;
use Illuminate\Http\Request;

class RentCarController extends Controller
{
    private RentCarService $rentCarService;

    public function __construct(RentCarService $rentCarService)
    {
        $this->rentCarService = $rentCarService;
    }

    public function rentCar(Request $request)
    {
        $attribute = $request->only(['id_car', 'startRent', 'finishRent']);
        return $this->rentCarService->rentCarService($attribute);
    }

    public function activeRent()
    {
        return $this->rentCarService->activeRentService();
    }
}
