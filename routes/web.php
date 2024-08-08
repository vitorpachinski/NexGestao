<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal']);
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class,'sobrenos']);
Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'contato']);
Route::get('/testes',[\App\Http\Controllers\TestesController::class,'testes']);