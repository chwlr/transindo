<?php

namespace App\Services\Implementation;

use App\Repositories\RentCarRepository;
use App\Services\RentCarService;

class RentCarServiceImpl implements RentCarService
{
    private RentCarRepository $rentCarRepository;

    public function __construct(RentCarRepository $rentCarRepository)
    {
        $this->rentCarRepository = $rentCarRepository;
    }

    public function rentCarService($attribute)
    {
        return $this->rentCarRepository->rentCar($attribute);
    }

    public function activeRentService()
    {
        return $this->rentCarRepository->activeRent();
    }
}
