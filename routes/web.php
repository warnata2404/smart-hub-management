<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\EquipmentController;
use App\Http\Controllers\Web\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Smart Hub Management System
| Web Dashboard Routes
|
*/

Route::get('/', function () {
    return redirect()->route('equipments.index');
});

/*
|--------------------------------------------------------------------------
| Equipment CRUD
|--------------------------------------------------------------------------
*/

Route::resource('equipments', EquipmentController::class);

/*
|--------------------------------------------------------------------------
| Booking CRUD
|--------------------------------------------------------------------------
*/

Route::resource('bookings', BookingController::class);