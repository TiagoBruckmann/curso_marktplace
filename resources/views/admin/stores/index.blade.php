@extends('layouts.app')

@section('content')
    <br><br>
    <a href="{{ route('admin.stores.create') }}" class="btn btn-lg btn-success">Criar Loja</a>
    <br><br><br><br>
    <table class="table table-stiped">
        <thead>
            <tr>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $store)
                <tr>
                    <td>{{ $store->name }}</td>
                    <td>
                        <a href="{{ route('admin.stores.edit', ['store' => $store->id]) }}" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('admin.stores.destroy', ['store' => $store->id]) }}" class="btn btn-outline-danger" style="margin-left: 10px;"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- exibir paginação --> 
    {{ $stores->links() }}
@endsection
