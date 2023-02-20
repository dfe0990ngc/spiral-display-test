<?php

use App\Http\Controllers\RandomController;
use App\Models\Random;
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

Route::prefix('random')->group(function(){
    Route::get('/show/{id}', [RandomController::class, 'show'])->middleware('api')->name('show-with-random-id');
    Route::get('/show', [RandomController::class, 'showRandom'])->middleware('api')->name('show-random');
});