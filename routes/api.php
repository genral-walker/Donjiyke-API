<?php

use App\Http\Controllers\AuthController;
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


// Thus should be in a private route.

// puplic routes
Route::post('/login', [AuthController::class, 'login']);

Route::patch('/users/{id}', [AuthController::class, 'update']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    // Only Admin
    Route::get('/users', [AuthController::class, 'index']);
    Route::post('/create', [AuthController::class, 'create']);
    Route::delete('/users/{id}', [AuthController::class, 'destroy']);
    

    // Every User Functions
    Route::post('/logout', [AuthController::class, 'logout']);
    

    // Route::post('/products', [ProductController::class, 'store']);
    // Route::put('/products/{id}', [ProductController::class, 'update']);
    // Route::delete('/products/{id}', [ProductController::class, 'destroy']);
   

    // Route::apiResource('auth', AuthController::class);
    // Route::resource('auth', AuthController::class);

});

Route::resource('auth', AuthController::class);
