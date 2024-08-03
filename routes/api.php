<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

Route::post('token', [ApiController::class, 'token']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/getInfoSistema', [ApiController::class, 'getInfoSistema']);
    Route::post('/setProdData', [ApiController::class, 'setProdData']);
    Route::post('/setPediData', [ApiController::class, 'setPediData']);
    Route::post('/setUsuaData', [ApiController::class, 'setUsuaData']);
    Route::get('/getProdSistema', [ApiController::class, 'getProdSistema']);
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
