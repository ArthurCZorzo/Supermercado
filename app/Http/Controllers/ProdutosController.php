<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutosRequest;

use App\Models\Produto;
use App\Models\Fornecedor;

class ProdutosController extends Controller
{
    function show(Request $req){
        //recuperando os produtos que estão no banco de dados
        //$produtos = Produto::all();
        $produtos = Produto::query(); // termo

        if ($req->filled('termo')){
            $produtos = $produtos->where(
                'nome', 'like', "%{$req->input('termo')}%"
            );
        }

        if ($req->filled('ordem')){
            $produtos = $produtos->orderBy('nome', $req->input('ordem'));
        }

        $produtos = $produtos->paginate(2); #->setPageName('p');
        #dd($produtos);

        //passando para nossa view a variável de produtos.
        return view('produtos_show', ['produtos' => $produtos]);
    }

    function cadastrar(){
        $fornecedores = Fornecedor::all();

        return view('produtos_new', 
            ['fornecedores' => $fornecedores]);
    }

    function alterar($id){
        $fornecedores = Fornecedor::all();
        $produto = Produto::findOrFail($id);

        return view('produtos_edit', [
            'produto' => $produto,
            'fornecedores' => $fornecedores 
        ]);
    }

    function inserir(ProdutosRequest $request){
        $request->validated();
        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->fornecedor_id = $request->fornecedor_id;
        $produto->foto = "";

        $produto->save();

        if ($request->file('foto')){
            $imagem = $request->file('foto');
            $nome_imagem = "{$produto->id}.{$imagem->extension()}";   
            $nome_imagem = $imagem->storeAs('produtos', $nome_imagem, "public");
            
            $produto->foto = "upload/$nome_imagem";
            $produto->save();
        }

        session()->flash('mensagem', "O produto {$produto->nome} foi adicionado com sucesso.");

        return redirect()->route('produtos.show');
    }

    function editar(ProdutosRequest $request, $id){
        $request->validated();
        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->fornecedor_id = $request->fornecedor_id;

        if ($request->file('foto')){
            $imagem = $request->file('foto');
            $nome_imagem = "{$produto->id}.{$imagem->extension()}";   
            $nome_imagem = $imagem->storeAs('produtos', $nome_imagem, "public");
            
            $produto->foto = "upload/$nome_imagem";
        }

        $produto->save();

        return redirect()->route('produtos.show');
    }

    function excluir($id){
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return redirect()->route('produtos.show');
    }
}