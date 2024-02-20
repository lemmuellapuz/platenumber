<?php

use App\Http\Controllers\Web\Authentication\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('signin', [AuthenticationController::class, 'signin'])->name('signin');
Route::post('signout', [AuthenticationController::class, 'signout'])->name('signout');
