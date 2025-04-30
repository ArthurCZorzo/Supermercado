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

Route::middleware('auth')->get('/', function () {
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
Route::middleware('auth')->get('/produtos', [ProdutosController::class, 'show'])->name('produtos.show');

Route::middleware('auth')->get('/produtos/cadastrar', [ProdutosController::class, 'cadastrar'])->name('produtos.cadastrar');
Route::middleware('auth')->post('/produtos/cadastrar', [ProdutosController::class, 'inserir'])->name('produtos.inserir');

Route::middleware('auth')->get('/produtos/alterar/{id}', [ProdutosController::class, 'alterar'])->name('produtos.alterar');
Route::middleware('auth')->post('/produtos/alterar/{id}', [ProdutosController::class, 'editar'])->name('produtos.editar');

Route::middleware('auth')->get('produtos/excluir/{id}', [ProdutosController::class, 'excluir'])->name('produtos.excluir');

/**
 * endpoint fornecedor
 */
Route::middleware('auth')->get('/fornecedores', [FornecedorController::class, 'show'])->name('fornecedor.show');

Route::middleware('auth')->get('/fornecedores/cadastrar', [FornecedorController::class, 'cadastrar'])->name('fornecedor.cadastrar');
Route::middleware('auth')->post('/fornecedores/cadastrar', [FornecedorController::class, 'inserir'])->name('fornecedor.inserir');

Route::middleware('auth')->get('/fornecedores/inicio', [FornecedorController::class, 'inicio'])->name('fornecedor.inicio');
Route::middleware('auth')->post('/fornecedores/inicio', [FornecedorController::class, 'preenche'])->name('fornecedor.preenche');

Route::middleware('auth')->get('/fornecedores/alterar/{id}', [FornecedorController::class, 'alterar'])->name('fornecedor.alterar');
Route::middleware('auth')->post('/fornecedores/alterar/{id}', [FornecedorController::class, 'editar'])->name('fornecedor.editar');

Route::middleware('auth')->get('/fornecedores/excluir/{id}', [FornecedorController::class, 'excluir'])->name('fornecedor.excluir');

/**
 * endpoint tipo de produto
 */
Route::middleware('auth')->get("/tipo_produto", [TipoProdutosController::class, 'show']);

/**
 * rotas de login
 */
Route::controller(AuthController::class)->group(function (){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'tryLogin')->name('try.login');
    
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'saveRegister')->name('save.register');

    Route::get('/logout', 'logout')->name('logout');
});