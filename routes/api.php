<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
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



// puplic routes
Route::post('/login', [AuthController::class, 'login']);

// Route::post('/recover', [AuthController::class, 'mail']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Only Admin
    Route::get('/users', [AuthController::class, 'index']);
    Route::post('/create', [AuthController::class, 'create']);
    Route::delete('/users/{id}', [AuthController::class, 'destroy']);


    // Every User Functions
    Route::patch('/users/{id}', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/stocks', StockController::class);
    Route::apiResource('/sales', SaleController::class);
    Route::apiResource('/ledgers', LedgerController::class);
    Route::apiResource('/payments', PaymentsController::class);
});
