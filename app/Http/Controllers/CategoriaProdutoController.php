<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoriaProduto;

class CategoriaProdutoController extends Controller
{
    public function show(){
        $categorias_produtos = CategoriaProduto::all();

        return view('categoria_produto_show', ['categorias_produtos' => $categorias_produtos]);
    }
}
