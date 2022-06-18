<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PartController;

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

/*
* Car API calls
*/
Route::get('/cars', [CarController::class, 'index']);                // api call, display cars details
Route::post('/cars', [CarController::class, 'store']);               // api call, store car details
Route::get('/cars/{id}', [CarController::class, 'show']);            // api call, retrieve data for a single car, part of the update process, display car data before data update
Route::patch('/cars/{id}', [CarController::class, 'update']);        // api call, update car details
Route::delete('/cars/{id}', [CarController::class, 'destroy']);      // api call, delete car by id

/*
* Car API calls
*/
Route::get('/parts', [PartController::class, 'index']);                // api call, display parts details
Route::post('/parts', [PartController::class, 'store']);               // api call, store part details
Route::get('/parts/{id}', [PartController::class, 'show']);            // api call, retrieve data for a single part, part of the update process, display part data before data update
Route::patch('/parts/{id}', [PartController::class, 'update']);        // api call, update part details
Route::delete('/parts/{id}', [PartController::class, 'destroy']);      // api call, delete part by id
