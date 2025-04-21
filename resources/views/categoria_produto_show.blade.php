
@extends('template')

@section('conteudo')
    <h1>Categorias</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descricao</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias_produtos as $categoria_produto)
            <tr>
                <td>{{ $categoria_produto->id }}</td>
                <td>{{ $categoria_produto->descricao }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection