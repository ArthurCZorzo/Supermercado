@extends('template')

@section('conteudo')
    <h1>Cadastro de </h1>
    <form action="{{ route('fornecedor.preenche') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="cep" class="form-label">Cep do Fornecedor</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-success">
    </form>
@endsection