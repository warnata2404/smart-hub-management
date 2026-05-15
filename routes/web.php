<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\EquipmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('equipments', EquipmentController::class);