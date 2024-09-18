<?php

use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\MeterController;
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

Route::middleware(['auth:sanctum', 'throttle:60,1'])->group(function () {
    Route::get('/meters', [MeterController::class, 'index']);
    Route::post('/meters', [MeterController::class, 'store']);
    Route::get('/meters/{meter}', [MeterController::class, 'show']);
    Route::put('/meters/{meter}', [MeterController::class, 'update']);
    Route::delete('/meters/{meter}', [MeterController::class, 'destroy']);

    Route::get('/consumption/daily', [ConsumptionController::class, 'daily']);
    Route::get('/consumption/monthly', [ConsumptionController::class, 'monthly']);
    Route::get('/consumption/yearly', [ConsumptionController::class, 'yearly']);
    Route::post('/consumption/daily', [ConsumptionController::class, 'processDailyConsumption']);
});
