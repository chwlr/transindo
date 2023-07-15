<?php

namespace App\Repositories\Implementation;

use App\Exceptions\GeneralJsonException;
use App\Http\Resources\RentCarCollection;
use App\Http\Resources\RentCarResource;
use App\Models\Car;
use App\Models\RentCar;
use App\Repositories\RentCarRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentCarRepositoryImpl implements RentCarRepository
{
    private RentCar $rentCar;

    public function __construct(RentCar $rentCar)
    {
        $this->rentCar = $rentCar;
    }

    public function rentCar($attribute)
    {
        $exist = $this->rentCar->where([['id_car', '=', data_get($attribute, 'id_car')], ['status', '=', 'active']])->get();

        if (!($exist->isEmpty()))
        {
            throw new GeneralJsonException('Failed to store, data with selected car currently unavailable', 400);
        }

        try {
            DB::beginTransaction();
            $stored = $this->rentCar->create([
                'id_user' => Auth::user()->id,
                'id_car' => data_get($attribute, 'id_car'),
                'startRent' => data_get($attribute, 'startRent'),
                'finishRent' => data_get($attribute, 'finishRent'),
                'status' => 'active'
            ]);

            $car = Car::find(data_get($attribute, 'id_car'));
            $car->availability = 'unavailable';
            $car->save();

            DB::commit();
            return (new RentCarResource($stored->fresh()))->response()->setStatusCode(201);
        } catch (Exception $e) {
            throw new GeneralJsonException($e->getMessage(), 400);
        }
    }

    public function activeRent()
    {
        try {
            $data = $this->rentCar->where([['id_user', '=', Auth::user()->id], ['status', '=', 'active']])->get();
            return (new RentCarCollection($data));
        } catch (Exception $e) {
            throw new GeneralJsonException($e->getMessage(), 400);
        }
    }
}
