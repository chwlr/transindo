<?php

namespace App\Http\Resources;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => User::find($this->id_user)->name,
            'car' => Car::find($this->id_car)->brand ." ". Car::find($this->id_car)->model,
            'startRent' => $this->startRent,
            'finishRent' => $this->finishRent,
            'status' => $this->status
        ];
    }
}
