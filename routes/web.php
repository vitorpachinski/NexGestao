<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [\App\Http\Controllers\PublicHomeController::class, 'index'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\AboutController::class, 'about'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContactController::class, 'contact'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContactController::class, 'store'])->name('site.contato.store');

Route::get('/login/{error?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store'])->name('site.login.store');
Route::middleware('authentication')->prefix('/app')->group(function(){
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('app.logout');
    Route::get('/clientes', [\App\Http\Controllers\CustomerController::class, 'index'])->name('app.clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\SupplierController::class, 'index'])->name('app.fornecedores');
    Route::get('/fornecedores/novo', [\App\Http\Controllers\SupplierController::class, 'new'])->name('app.fornecedores.new');
    Route::post('/fornecedores/novo', [\App\Http\Controllers\SupplierController::class, 'add'])->name('app.fornecedores.add');
    Route::post('/fornecedores/listar', [\App\Http\Controllers\SupplierController::class, 'list'])->name('app.fornecedores.list');
    Route::get('/fornecedores/listar', [\App\Http\Controllers\SupplierController::class, 'list'])->name('app.fornecedores.paginate');
    Route::get('/fornecedores/editar/{id}/{message?}', [\App\Http\Controllers\SupplierController::class, 'edit'])->name('app.fornecedores.edit');
    Route::get('/fornecedores/excluir/{id}', [\App\Http\Controllers\SupplierController::class, 'remove'])->name('app.fornecedores.remove');
    // Route::get('/produtos', [ProductController::class, 'index'])->name('app.products');

    //products
    Route::resource('products', ProductController::class);
    
});