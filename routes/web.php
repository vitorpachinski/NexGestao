<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'store'])->name('site.contato.store');

Route::get('/login/{error?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store'])->name('site.login.store');
Route::middleware('authentication')->prefix('/app')->group(function(){
    // Route::get('/customer',[\App\Http\Controllers\CustomerController::class, 'create'])->name('app.customers.create');
    // Route::post('/customer', [\App\Http\Controllers\CustomerController::class, 'store'])->name('app.customers.store');
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('app.logout');
    Route::get('/clientes', [\App\Http\Controllers\CustomerController::class, 'index'])->name('app.clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/fornecedores/novo', [\App\Http\Controllers\FornecedorController::class, 'new'])->name('app.fornecedores.new');
    Route::post('/fornecedores/novo', [\App\Http\Controllers\FornecedorController::class, 'add'])->name('app.fornecedores.add');
    Route::post('/fornecedores/listar', [\App\Http\Controllers\FornecedorController::class, 'list'])->name('app.fornecedores.list');
    Route::get('/fornecedores/editar/{id}/{message?}', [\App\Http\Controllers\FornecedorController::class, 'edit'])->name('app.fornecedores.edit');
    Route::get('/produtos', [\App\Http\Controllers\ProductController::class, 'index'])->name('app.produtos');
});

Route::fallback(function(){
    echo 'Página não encontrada, <a href="'.route('site.index').'">clique aqui para ir para a pagina incial </a>';
});

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

 
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
