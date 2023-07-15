<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'owner' => User::find($this->id_user)->name,
            'brand' => $this->brand,
            'model' => $this->model,
            'numberPlate' => $this->numberPlate,
            'rates' => $this->rates,
            'availability' => $this->availability,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
