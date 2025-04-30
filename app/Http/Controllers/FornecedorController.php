<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\Http;

class FornecedorController extends Controller
{
    function show(){

        $fornecedores = Fornecedor::all();

        return view('fornecedores', ['fornecedores' => $fornecedores]);
    }

    function inicio(){
        return view('fornecedores_new0');
    }

    function preenche(Request $req){
        $cep = $req->input('cep');

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json");

        session()->flash('endereco', $response->json());

        return redirect(route('fornecedor.cadastrar'));
    }

    function cadastrar(){
        return view('fornecedores_new');
    }

    function alterar($id){
        $fornecedor = Fornecedor::findOrFail($id);

        return view('fornecedores_edit', ['fornecedor' => $fornecedor]);
    }

    function inserir(Request $request){
        $fornecedor = new Fornecedor();

        $fornecedor->nome = $request->nome;
        $fornecedor->razaoSocial = $request->razaoSocial;
        $fornecedor->cnpj = $request->cnpj;

        $fornecedor->save();

        return redirect()->route('fornecedor.show');
    }

    function editar(Request $request, $id){
        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->nome = $request->nome;
        $fornecedor->razaoSocial = $request->razaoSocial;
        $fornecedor->cnpj = $request->cnpj;

        $fornecedor->save();
        
        return redirect()->route('fornecedor.show');
    }

    function excluir($id){
        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->delete();

        return redirect()->route('fornecedor.show');
    }
}
