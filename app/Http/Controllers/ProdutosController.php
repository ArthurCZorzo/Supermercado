<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\models\Fornecedor;

class ProdutosController extends Controller
{
    function show(){
        //recuperando os produtos que estão no banco de dados
        $produtos = Produto::all();

        //passando para nossa view a variável de produtos.
        return view('produtos_show', ['produtos' => $produtos]);
    }

    function cadastrar(){
        $fornecedores = Fornecedor::all();
        
        return view('produtos_new', ['fornecedores' => $fornecedores]);
    }

    function alterar($id){
        $fornecedores=Fornecedor::all();
        $produto = Produto::findOrFail($id);

        
        return view('produtos_edit', [           
            'produto' => $produto,
            'fornecedores' => $fornecedores
        ]);
    }

    function inserir(Request $request){
        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->fornecedor_id = $request->fornecedor_id;


        $produto->save();

        session()->flash('mensagem-inserido', "O Produto <strong> {$produto->nome} </strong> foi adicionado com suscesso.");
        
       

        return redirect()->route('produtos.show');
    }

    function editar(Request $request, $id){
        
        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->fornecedor_id = $request->fornecedor_id;

        $produto->save();

        session()->flash('mensagem-alterado', "O Produto <strong> {$produto->nome} </strong> foi alterado com suscesso.");


        return redirect()->route('produtos.show');
    }

    function excluir($id){
        $produto = Produto::findOrFail($id);

        $produto->delete();

        session()->flash('mensagem-excluido', "O Produto <strong> {$produto->nome} </strong> foi excluido com suscesso.");

        return redirect()->route('produtos.show');
    }
}