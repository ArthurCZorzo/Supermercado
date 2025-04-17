@extends('template')

@section('conteudo')
    <h1>Cadastro de Produtos</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $erro)
                ❌ {{ $erro }} <br>
            @endforeach
        </div>
    @endif
    <form action="{{ route('produtos.inserir') }}" method="post" enctype="multipart/form-data">
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
                <option selected value="">Selecione um fornecedor</option>
                @foreach($fornecedores as $fornecedor)
                    <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto do Produto</label>
            <input type="file" class="form-control" id="preco" name="foto">
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-success">
    </form>
@endsection