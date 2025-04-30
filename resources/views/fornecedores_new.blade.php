@extends('template')

@section('conteudo')
    <h1>Cadastro de Fornecedor</h1>
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="mb-3">
            <label for="razaoSocial" class="form-label">Razão Social</label>
            <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="Nome">
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">Cnpj</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Nome">
        </div>
        @if (session()->has('endereco'))
        @php
            $dados = session('endereco');
        @endphp
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="{{ $dados['logradouro'] }}">
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{ $dados['localidade'] }}">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{ $dados['estado'] }}">
            </div>
        @endif
        <input type="submit" value="Cadastrar" class="btn btn-success">
    </form>
@endsection