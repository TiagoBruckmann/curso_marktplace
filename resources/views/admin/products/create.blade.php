@extends('layouts.app')

@section('title', 'Adicionar produto')

@section('content')
    <h1>Adicionar produto</h1>

    <form action="{{ route('admin.products.store') }}" method="post">
        @csrf
        
        <div class="form-group">
            <label>Nome do produto*</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        
            @error('name')
                <div class="invalid feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">

            @error('description')
                <div class="invalid feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Contéudo</label>
            <textarea name="body" cols="30" rows="10" class="form-control @error('body') id-invalid @enderror" value="{{ old('body') }}"></textarea>

            @error('body')
                <div class="invalid feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">

            @error('price')
                <div class="invalid feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control @error('slug') is-valid @enderror" value="{{ old('slug') }}">

            @error('slug')
                <div class="invalid feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label>Lojas</label>
            <select name="store" class="form-control">
            <option>Selecione uma loja</option>
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