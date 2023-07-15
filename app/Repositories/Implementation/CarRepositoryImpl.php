<?php

namespace App\Repositories\Implementation;

use App\Exceptions\GeneralJsonException;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Repositories\CarRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarRepositoryImpl implements CarRepository
{
    private Car $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function storeCar($attribute): JsonResponse
    {
        $exist = $this->car->where([['numberPlate', '=', data_get($attribute, 'numberPlate')]])->get();

        if (!($exist->isEmpty()))
        {
            throw new GeneralJsonException('Failed to store, car with number plate already exist', 400);
        }

        try {
            DB::beginTransaction();
            $stored = $this->car->create([
                'id_user' => Auth::user()->id,
                'brand' => data_get($attribute, 'brand'),
                'model' => data_get($attribute, 'model'),
                'numberPlate' => data_get($attribute, 'numberPlate'),
                'rates' => data_get($attribute, 'rates'),
                'availability' => data_get($attribute, 'availability'),
            ]);
            DB::commit();
            return (new CarResource($stored->fresh()))->response()->setStatusCode(201);
        } catch (Exception $e) {
            throw new GeneralJsonException($e->getMessage(), 400);
        }
    }

    public function filterCars($filter, $value): CarCollection
    {
        switch ($filter) {
            case "brand":
                $brand = $this->car->where('brand', '=', $value)->orderByDesc('brand')->get();
                return (new CarCollection($brand));
            case "model":
                $model = $this->car->where('model', '=', $value)->orderByDesc('model')->get();
                return (new CarCollection($model));
            case "availability":
                $availability = $this->car->where('availability', '=', $value)->orderByDesc('availability')->get();
                return (new CarCollection($availability));
            default:
                throw new GeneralJsonException("Please provide parameter such as Brand, Model, and Availability", 400);
        }
    }
}
