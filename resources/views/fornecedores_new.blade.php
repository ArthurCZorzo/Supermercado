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
        <input type="submit" value="Cadastrar" class="btn btn-success">
    </form>
@endsection