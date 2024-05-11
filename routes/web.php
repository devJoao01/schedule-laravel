<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Resources\StoreDoctorController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/doctors', DoctorController::class);
