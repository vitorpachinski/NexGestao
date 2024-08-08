<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobrenos']);
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);
Route::get('/testes', [\App\Http\Controllers\TestesController::class, 'testes']);

Route::get(
    '/contato/{nome}/{categoria}/{assunto}/{mensagem?}',
    function (
        string $nome,
        int $categoria,
        string $assunto,
        string $mensagem = 'mensagem nao enviada'
    ) {
        echo 'Estamos aqui, ' . $nome;
        echo ' Categoria ' . $categoria;
        echo ' Assunto: ' . $assunto;
        echo ' Mensagem: ' . $mensagem;
    }
);
