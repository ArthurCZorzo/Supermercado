@extends('template')

@section('conteudo')
    @if (session()->has('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif
    <h1>Produtos</h1>
    <div class="d-flex">
        <form class="row g-3 ms-auto" method="GET" action="{{ route('produtos.show') }}">
            <div class="col-auto">
                <input type="text" class="form-control" id="termo" name="termo" placeholder="Digite sua busca" value="{{ request('termo') }}">
            </div>
            <div class="col-auto">
                <input type="radio" class="btn-check" name="ordem" id="success-outlined" autocomplete="off" {{ (request('ordem') == 'asc'? 'checked': '') }} value="asc">
                <label class="btn btn-outline-info" for="success-outlined">
                    <i class="bi bi-sort-alpha-down"></i>
                </label>
            </div>
            <div class="col-auto">
                <input type="radio" class="btn-check" name="ordem" id="danger-outlined" autocomplete="off" {{ (request('ordem') == 'desc'? 'checked': '') }} value="desc">
                <label class="btn btn-outline-info" for="danger-outlined">
                    <i class="bi bi-sort-alpha-down-alt"></i>
                </label>    
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
            </div>
        </form>
    </div>
    <table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Fornecedor</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->preco }}</td>
                <td>{{ $produto->fornecedor->nome }}</td>
                <td><a href="{{ route('produtos.alterar', ['id' => $produto->id]) }}" class="btn btn-info">Alterar</a></td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                        Excluir
                    </button>
                </td>
            </tr>
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
        @endforeach
    </tbody>
    </table>
    <a href="{{ route('produtos.cadastrar') }}" class="btn btn-primary">Cadastrar Produto</a>
@endsection