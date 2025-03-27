@extends('template')

@section('conteudo')
    <h1>Fornecedores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Razão Social</th>
                <th>Cnpj</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->id }}</td>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->razaoSocial }}</td>
                    <td>{{ $fornecedor->cnpj }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('fornecedor.cadastrar') }}" class="btn btn-primary">Cadastrar Fornecedor</a>
@endsection