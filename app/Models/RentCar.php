<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentCar extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['id_user', 'id_car', 'startRent', 'finishRent'];
    protected $table = 'rent_cars';
}
