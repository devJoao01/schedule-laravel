<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\WaitingListController;
use App\Http\Controllers\UserSystemController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/doctors', DoctorController::class);
Route::resource('/appointment', AppointmentController::class);
Route::resource('/patient', PatientController::class);
Route::resource('/waitingList', WaitingListController::class);
Route::resource('/user', UserSystemController::class);