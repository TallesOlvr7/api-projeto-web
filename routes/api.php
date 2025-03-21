<?php

use App\Http\Controllers\Api\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoriaController::class)->group(function(){
    Route::get('/categoria', 'index'); // Rota para listar todas as categorias
    Route::post('/categoria', 'store');
    Route::delete('/categoria/{categoria}', 'destroy');
    Route::patch('/categoria/{categoria}', 'update'); // Rota para atualizar o nome de uma categoria
});
