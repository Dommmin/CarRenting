<?php

use App\Http\Controllers\Api\Admin\AdminCarController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\RentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::put('admin/cars/{car}/available', [AdminCarController::class, 'available']);
    Route::put('admin/cars/{car}/unavailable', [AdminCarController::class, 'unAvailable']);
    Route::apiResource('admin/cars', AdminCarController::class);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::get('/car/{car:slug}', [CarController::class, 'show']);
Route::apiResource('cars', CarController::class);
Route::apiResource('rents', RentController::class);

