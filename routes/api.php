<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EquipmentApiController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | Equipment API
    |--------------------------------------------------------------------------
    */

    Route::get('/equipments', [EquipmentApiController::class, 'index']);

    Route::get('/equipments/{id}', [EquipmentApiController::class, 'show']);

});