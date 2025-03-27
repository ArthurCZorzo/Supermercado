@extends('template')

@section('conteudo')
    <h1>Produtos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descricao</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipos_produtos as $tipo_produto)
            <tr>
                <td>{{ $tipo_produto->id }}</td>
                <td>{{ $tipo_produto->descricao }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection