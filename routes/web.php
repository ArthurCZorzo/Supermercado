<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TipoProdutosController;

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

Route::get('/produtos', [ProdutosController::class, 'show']);

Route::get("/tipo_produto", [TipoProdutosController::class, 'show']);