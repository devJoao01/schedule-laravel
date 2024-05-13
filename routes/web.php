<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\WaitingListController;
use App\Http\Controllers\UserSystemController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/doctors', DoctorController::class);
Route::resource('/appointment', AppointmentController::class);
Route::resource('/patient', PatientController::class);
Route::resource('/waitingList', WaitingListController::class);
Route::resource('/user', UserSystemController::class);
