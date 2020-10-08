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
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-outline-info" style="border=none;"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="post" style="margin-left:10px;">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- exibir o numero das paginas --> 
    {{ $products->links() }}
@endsection