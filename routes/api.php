<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\DeskController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/desks', [DeskController::class, 'index']);

Route::get('/desks/{id}', [DeskController::class, 'show']);

Route::post('/desks', [DeskController::class, 'store']);

Route::post('/desks/{id}', [DeskController::class, 'update']);

Route::post('/delete/desk/{id}', [DeskController::class, 'destroy']);