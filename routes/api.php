<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\CotacaoDeFreteController;
use App\Http\Middleware\AuthAccessToken;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'v1'], function () {

    Route::group(['middleware' => AuthAccessToken::class], function () {
        Route::get('/cotacao/frete', [CotacaoDeFreteController::class, 'index']);
        Route::get('/cotacao/rapida/{id}', [CotacaoDeFreteController::class, 'show']);
        Route::post('/logout', [AuthController::class, 'destroy']);
        Route::get('/usuario', [AuthController::class, 'show']);
    });

    Route::post('/login', [AuthController::class, 'store']);
});
