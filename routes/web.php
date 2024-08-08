<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobrenos']);
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);
Route::get('/testes', [\App\Http\Controllers\TestesController::class, 'testes']);

Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        $nome = 'Desconhecido',
        $categoria_id = 1
    ) {
        echo 'Estamos aqui, ' . $nome;
        echo ' Categoria ' . $categoria_id;
    }
)->where('categoria_id', '[0-9]+')->where('nome','[A-Za-z]+'); 
// realizando tratamento para que o parametro obtido seja um numero valido [0-9] e que ele receba no minimo um numero '+'
// realizando tratamento para que o parametro obtido seja uma string valida composta por letras [A-Za-z] e que ele receba no minimo uma letra '+'
