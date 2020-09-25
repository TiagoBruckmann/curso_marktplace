@extends('layouts.app')

@section('content')
    <br><br>
    <a href="{{ route('admin.products.create') }}" class="btn btn-lg btn-success">Adicionar produto</a>
    <br><br><br><br>
    <table class="table table-stiped">
        <thead>
            <tr>
                <th>Nome do produto</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-outline-info">Editar</a>
                        <a href="{{ route('admin.products.destroy', ['product' => $product->id]) }}" class="btn btn-outline-danger" style="margin-left: 10px;">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- exibir o numero das paginas --> 
    {{ $products->links() }}
@endsection
