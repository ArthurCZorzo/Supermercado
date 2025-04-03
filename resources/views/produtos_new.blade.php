@extends('template')

@section('conteudo')
    <h1>Cadastro de Produtos</h1>
    <form action="{{ route('produtos.inserir') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Valor do Produto</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" placeholder="R$ 0.00">
        </div>
        <div class="mb-3">
            <select name="fornecedor_id" class="form-select" aria-label="" required>
                <option selected value="">Seleciona um fornecedor</option>
                @foreach($fornecedores as $fornecedor)
                    <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-success">
    </form>
@endsection