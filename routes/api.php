<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

Route::post('token', [ApiController::class, 'token']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/getInfoSistema', [ApiController::class, 'getInfoSistema']);
    // Route::get('/titulos/{id}', [TitulosController::class, 'index']);
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
