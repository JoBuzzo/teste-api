<?php

use App\Http\Controllers\V1\CotacaoDeFreteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'v1'], function () {
    Route::get('/cotacao/frete', [CotacaoDeFreteController::class, 'index']);
});
