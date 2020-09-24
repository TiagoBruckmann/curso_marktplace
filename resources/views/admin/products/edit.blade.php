@extends('layouts.app')

@section('title', 'Atualizando Produto')

@section('content')
    <h1>Atualizar produto</h1>

    <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label>Nome do produto</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control" value="{{ $product->description }}">
        </div>

        <div class="form-group">
            <label>Conteúdo</label>
            <textarea name="body" cols="30" rows="10" class="form-control">{{ $product->body }}</textarea>
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label>slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
        </div>
    </form>
@endsection 