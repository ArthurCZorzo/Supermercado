<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();

        return $produtos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->fornecedor_id = $request->fornecedor_id;
        $produto->foto = $request->foto;

        $produto->save();

        return $produto;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::with('fornecedor')->findOrFail($id);

        return $produto;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->fornecedor_id = $request->fornecedor_id;
        $produto->foto = $request->foto;

        $produto->save();

        return $produto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return response()->json(["mensagem" => "Recurso excluído"], 200);
        //return response()->noContent();
    }
}
