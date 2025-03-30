@extends('template')

@section('conteudo')
    <h1>Editar Fornecedor</h1>
    <form action="{{ route('fornecedor.editar', ['id' => $fornecedor->id]) }} " method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ $fornecedor->nome }}">
        </div>
        <div class="mb-3">
            <label for="razaoSocial" class="form-label">Razão Social</label>
            <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="Razão Social" value="{{ $fornecedor->razaoSocial }}">
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">Valor do Produto</label>
            <input type="number" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" 
            value="{{ $fornecedor->cnpj }}">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja excluir o produto {{ $fornecedor->id }} - {{ $fornecedor->nome }}?
            </div>
            <div class="modal-footer">
                <a href="{{ route('fornecedor.excluir', ['id' => $fornecedor->id]) }}" class="btn btn-outline-danger">
                    Excluir
                </a>
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancelar</button>
            </div>
            </div>
        </div>
    </div>
@endsection