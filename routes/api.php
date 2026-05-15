<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EquipmentApiController;
use App\Http\Controllers\API\CheckinApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Smart Hub Management System
| REST API Routes
|
*/

/*
|--------------------------------------------------------------------------
| Authentication API
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Protected API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Logout API
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | Equipment API
    |--------------------------------------------------------------------------
    */

    Route::get('/equipments', [EquipmentApiController::class, 'index']);

    Route::get('/equipments/{id}', [EquipmentApiController::class, 'show']);

    /*
    |--------------------------------------------------------------------------
    | Check-In API
    |--------------------------------------------------------------------------
    */

    Route::post('/checkin', [CheckinApiController::class, 'checkin']);

    /*
    |--------------------------------------------------------------------------
    | Check-Out API
    |--------------------------------------------------------------------------
    */

    Route::post('/checkout', [CheckinApiController::class, 'checkout']);

});