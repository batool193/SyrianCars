<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * User Management Routes
 *
 * These routes handle User management operations.
 */
Route::apiResource('Users', App\Http\Controllers\UserController::class);
/**
 * Car Management Routes
 *
 * These routes handle Car management operations.
 */
Route::apiResource('Cars', App\Http\Controllers\CarController::class);
/**
 * City Management Routes
 *
 * These routes handle City management operations.
 */
Route::apiResource('Cities', App\Http\Controllers\CityController::class);
/**
 * Brand Management Routes
 *
 * These routes handle Brand management operations.
 */
Route::apiResource('Brands', App\Http\Controllers\BrandController::class);
/**
 * Color Management Routes
 *
 * These routes handle Color management operations.
 */
Route::apiResource('Colors', App\Http\Controllers\ColorController::class);
/**
 * Fuel Management Routes
 *
 * These routes handle Fuel management operations.
 */
Route::apiResource('Fuels', App\Http\Controllers\FuelController::class);
/**
 * model Management Routes
 *
 * These routes handle model management operations.
 */
Route::apiResource('models', App\Http\Controllers\modelController::class);