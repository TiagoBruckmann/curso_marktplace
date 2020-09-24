@extends('layouts.app')

@section('title', 'Adicionar produto')

@section('content')
    <h1>Adicionar produto</h1>

    <form action="{{ route('admin.products.store') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Nome do produto</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label>Contéudo</label>
            <textarea name="body" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div>
            <label>Lojas</label>
            <select name="user" class="form-control">
                @foreach($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <br><br>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Adicionar produto</button>
        </div>
    </form>
@endsection 