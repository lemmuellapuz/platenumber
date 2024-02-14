<?php

use App\Http\Controllers\API\v1\HistoryController;
use App\Http\Controllers\API\v1\VehicleRecognizerController;
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

Route::prefix('search/')->name('search.')->controller(VehicleRecognizerController::class)->group(function(){
    Route::post('platenumber', 'searchByPlateNumber')->name('platenumber');
    Route::post('id', 'searchById')->name('id');
});

Route::prefix('history/')->name('history.')->controller(HistoryController::class)->group(function(){
    Route::post('', 'index')->name('index');
    Route::post('store', 'store')->name('store');
    Route::get('{id}', 'show')->name('show');
});
