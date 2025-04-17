@extends('template')

@section('conteudo')
    <h1>Editar Produto</h1>
    <form action="{{ route('produtos.editar', ['id' => $produto->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ $produto->nome }}">
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Valor do Produto</label>
            <input type="number" setp="0.01" class="form-control" id="preco" name="preco" placeholder="R$ 0.00" 
            value="{{ $produto->preco }}">
        </div>
        <div class="mb-3">
            <select name="fornecedor_id" class="form-select" aria-label="" required>
                <option selected value="">Seleciona um fornecedor</opt>
                @foreach($fornecedores as $fornecedor)
                    <option {{ ($fornecedor->id == $produto->fornecedor_id ? "selected" : "") }} value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex">
            @if ($produto->foto != "")
            <div>
                <img src="{{ asset($produto->foto) }}" class="rounded" width="300">
            </div>
            @endif
            <div class="mb-3">
                <label for="foto" class="form-label">Foto do Produto</label>
                <input type="file" class="form-control" id="preco" name="foto">
            </div>
        </div>
        <input type="submit" value="Atualizar" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
            Excluir
        </button>
        <div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja excluir o produto {{ $produto->id }} - {{ $produto->nome }}?
                </div>
                <div class="modal-footer">
                    <a href="{{ route('produtos.excluir', ['id' => $produto->id]) }}" class="btn btn-outline-danger">
                        Excluir
                    </a>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                </div>
                </div>
            </div>
        </div>
    </form>
@endsection