@extends('template')

@section('conteudo')
    <h1>Editar Produto</h1>
    <form action="{{ route('produtos.editar', ['id' => $produto->id]) }}" method="post">
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
        <input type="submit" value="Atualizar" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
            Excluir
        </button>
    </form>

    <div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
@endsection