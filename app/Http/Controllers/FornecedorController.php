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
}
