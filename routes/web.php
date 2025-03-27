<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TipoProdutosController;
use App\Http\Controllers\FornecedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Get para ola mundo!
 */
Route::get('/olaMundo', function () {
    return view('olaMundo');
});

Route::get('/produtos', [ProdutosController::class, 'show'])->name('produtos.show');

Route::get("/tipo_produto", [TipoProdutosController::class, 'show']);

Route::get('/fornecedores', [FornecedorController::class, 'show'])->name('fornecedor.show');

Route::get('/produtos/cadastrar', [ProdutosController::class, 'cadastrar'])->name('produtos.cadastrar');
Route::post('/produtos/cadastrar', [ProdutosController::class, 'inserir'])->name('produtos.inserir');

Route::get('/produtos/alterar/{id}', [ProdutosController::class, 'alterar'])->name('produtos.alterar');
Route::post('/produtos/alterar/{id}', [ProdutosController::class, 'editar'])->name('produtos.editar');

Route::get('produtos/excluir/{id}', [ProdutosController::class, 'excluir'])->name('produtos.excluir');

Route::get('/fornecedores/cadastrar', [FornecedorController::class, 'cadastrar'])->name('fornecedor.cadastrar');
Route::post('/fornecedores/cadastrar', [FornecedorController::class, 'inserir'])->name('fornecedor.inserir');