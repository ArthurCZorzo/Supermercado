<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoProduto;

class TipoProdutosController extends Controller
{
    public function show(){
        $tipos_produtos = TipoProduto::all();

        return view('tipo_produto_show', ['tipos_produtos' => $tipos_produtos]);
    }
}
