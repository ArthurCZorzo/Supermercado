<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TipoProdutosController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\AuthController;

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
    return redirect('/produtos/cadastrar');
});

/**
 * Get para ola mundo!
 */
Route::get('/olaMundo', function () {
    return view('olaMundo');
});

/**
 * Endpoint produto
 */
Route::get('/produtos', [ProdutosController::class, 'show'])->name('produtos.show');

Route::get('/produtos/cadastrar', [ProdutosController::class, 'cadastrar'])->name('produtos.cadastrar');
Route::post('/produtos/cadastrar', [ProdutosController::class, 'inserir'])->name('produtos.inserir');

Route::middleware('auth', '7days')->get('/produtos/alterar/{id}', [ProdutosController::class, 'alterar'])->name('produtos.alterar');
Route::post('/produtos/alterar/{id}', [ProdutosController::class, 'editar'])->name('produtos.editar');

Route::get('produtos/excluir/{id}', [ProdutosController::class, 'excluir'])->name('produtos.excluir');

/**
 * endpoint fornecedor
 */
Route::get('/fornecedores', [FornecedorController::class, 'show'])->name('fornecedor.show');

Route::get('/fornecedores/cadastrar', [FornecedorController::class, 'cadastrar'])->name('fornecedor.cadastrar');
Route::post('/fornecedores/cadastrar', [FornecedorController::class, 'inserir'])->name('fornecedor.inserir');

Route::get('/fornecedores/alterar/{id}', [FornecedorController::class, 'alterar'])->name('fornecedor.alterar');
Route::post('/fornecedores/alterar/{id}', [FornecedorController::class, 'editar'])->name('fornecedor.editar');

Route::get('/fornecedores/excluir/{id}', [FornecedorController::class, 'excluir'])->name('fornecedor.excluir');

/**
 * endpoint tipo de produto
 */
Route::get("/tipo_produto", [TipoProdutosController::class, 'show']);

Route::controller(AuthController::class)->group(function (){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'tryLogin')->name('try.login');

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'saveRegister')->name('save.register');

    Route::get('/logout', 'logout')->name('logout');
});

