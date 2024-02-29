<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\LoginController;
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

Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/leadnames', [LeadsController::class, 'getLeadNames']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/', [DashboardController::class, 'index']);

    Route::post('/leads', [LeadsController::class, 'insert']);
    Route::post('/deals', [DealsController::class, 'index']);

    Route::get('/leads', [LeadsController::class, 'index']);
});
