@extends('layouts.app')

@section('title', 'Adicionar produto')

@section('content')
    <h1>Adicionar produto</h1>

    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
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

        <div class="form group">
            <label>Categorias</label>
            <select name="categories[]" id="" class="form-control" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Fotos do Produto</label>
            <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>
            
            @error('photos.*')
                <div class="invalid-feedback">
                {‌{$message}}
                </div>
            @enderror
        </div>
        
        <br><br>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Adicionar produto</button>
        </div>
    </form>
@endsection 