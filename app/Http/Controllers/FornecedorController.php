<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    function show(){

        $fornecedores = Fornecedor::all();

        return view('fornecedores', ['fornecedores' => $fornecedores]);
    }

    function cadastrar(){
        return view('fornecedores_new');
    }

    function inserir(Request $request){
        $fornecedor = new Fornecedor();

        $fornecedor->nome = $request->nome;
        $fornecedor->razaoSocial = $request->razaoSocial;
        $fornecedor->cnpj = $request->cnpj;

        $fornecedor->save();

        return redirect()->route('fornecedor.show');
    }
}
