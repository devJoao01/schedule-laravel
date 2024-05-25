<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\WaitingListController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\UserSystemController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
use App\Http\Controllers\Auth\Api\LogoutController;

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
Route::resource('/schedule', SchedulesController::class);
Route::resource('/userSystem', UserSystemController::class);
Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LogoutController::class, 'logout'])->middleware('auth');
    Route::post('register', [RegisterController::class, 'register']);
});
