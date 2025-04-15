<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Fornecedor;

class ProdutosController extends Controller
{
    function show(Request $request){
        //recuperando os produtos que estão no banco de dados
        //$produtos = Produto::all();
        $produtos = Produto::query();

        if ($request->filled('busca')){
            $produtos = $produtos->where('nome', 'like', "%{$request->input('busca')}%");
        }

        if ($request->filled('ordem')){
            $produtos = $produtos->orderBy('nome', $request->input('ordem'));
        }

        $produtos = $produtos->paginate(10);

        //passando para nossa view a variável de produtos.
        return view('produtos_show', ['produtos' => $produtos]);
    }

    function cadastrar(){
        $fornecedores = Fornecedor::all();

        return view('produtos_new', ['fornecedores' => $fornecedores]);
    }

    function alterar($id){
        $produto = Produto::findOrFail($id);
        $fornecedores = Fornecedor::all();

        return view('produtos_edit', ['produto' => $produto], ['fornecedores' => $fornecedores]);
    }

    function inserir(Request $request){
        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->fornecedor_id = $request->fornecedor_id;

        $produto->save();

        session()->flash('mensagem', "O produto {$produto->nome} foi adicionado com sucesso");
        session()->flash('classe', 'success');

        return redirect()->route('produtos.show');
    }

    function editar(Request $request, $id){
        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->fornecedor_id = $request->fornecedor_id;

        $produto->save();

        session()->flash('mensagem', "O produto {$produto->nome} foi alterado com sucesso");
        session()->flash('classe', 'success');

        return redirect()->route('produtos.show');
    }

    function excluir($id){
        $produto = Produto::findOrFail($id);

        $produto->delete();

        session()->flash('mensagem', "O produto {$produto->nome} foi excluido com sucesso");
        session()->flash('classe', 'danger');

        return redirect()->route('produtos.show');
    }
}