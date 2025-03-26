<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutosController extends Controller
{
    function show(){
        //recuperando os produtos que estão no banco de dados
        $produtos = Produto::all();

        //passando para nossa view a variável de produtos.
        return view('produtos_show', ['produtos' => $produtos]);
    }
}
