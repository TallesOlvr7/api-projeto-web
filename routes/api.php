<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\DespesaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoriaController::class)->group(function(){
    Route::get('/categoria', 'index');
    Route::post('/categoria', 'store');
    Route::delete('/categoria/{categoria}', 'destroy');
    Route::patch('/categoria/{categoria}', 'update');
});

Route::controller(DespesaController::class)->group(function(){
    Route::get('/despesa', 'index'); 
    Route::post('/despesa', 'store');
    Route::delete('/despesa/{despesa}', 'destroy');
    Route::patch('/despesa/{despesa}', 'update'); 
    Route::get('/despesa/relatorio/{mes}', 'relatorio');
});