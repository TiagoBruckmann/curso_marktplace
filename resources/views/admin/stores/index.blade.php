@extends('layouts.app')

@section('content')

    @if(!$store)
        <a href="{{ route('admin.stores.create') }}" class="btn btn-lg btn-success">Criar Loja</a>
    @endif
    
    <br><br><br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Loja</th>
                <th>Total de Produtos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $store->name }}</td>
                <td>{{ $store->products->count() }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('admin.stores.edit', ['store' => $store->id]) }}" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.stores.destroy', ['store' => $store->id]) }}" method="post" style="margin-left:10px;">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
