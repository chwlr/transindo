<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\RentCarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/users/logout', [UserController::class, 'logout']);
    Route::get('/cars/filter/{filter}/{value}', [CarController::class, 'filterCars']);
    Route::post('/users/rent', [RentCarController::class, 'rentCar']);
    Route::get('/users/rent/active', [RentCarController::class, 'activeRent']);
});
Route::middleware(['auth:sanctum', 'status'])->group(function () {
    Route::post('/cars', [CarController::class, 'store']);
});

// Public routes
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/login', [UserController::class, 'login']);


