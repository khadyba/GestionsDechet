<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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

// Routes Gestion des Appareils
Route::get('/device/index', [DeviceController::class, 'index']);
Route::post('/device/store', [DeviceController::class, 'store']);
Route::get('/device/show/{id}', [DeviceController::class, 'show']);
Route::put('/device/update/{id}', [DeviceController::class, 'update']);
Route::delete('/device/destroy/{id}', [DeviceController::class, 'destroy']);

// Routes Gestion de Signelement
Route::get('/report/index', [ReportController::class, 'index']);
Route::post('/report/store', [ReportController::class, 'store']);
Route::get('/report/show/{id}', [ReportController::class, 'show']);
Route::put('/report/update/{id}', [ReportController::class, 'update']);
Route::delete('/report/destroy/{id}', [ReportController::class, 'destroy']);

