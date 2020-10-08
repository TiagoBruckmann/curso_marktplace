@extends('layouts.app')

@section('title', 'Editando loja')

@section('content')
    <h1>Editar Loja</h1>

    <form action="{{ route('admin.stores.update', ['store' => $store->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label>Nome da loja</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $store->name }}">
        
            @error('name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $store->description }}">
            
            @error('description')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $store->phone }}">
        
            @error('phone')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Celular/WhatsApp</label>
            <input type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror" value="{{ $store->mobile_phone }}">
        
            @error('mobile_phone')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
        <p>
            <img src="{{ asset('storage/' . $store->logo) }}" alt="">
        </p>
            <label>Logo da sua loja</label>
            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" >
        
            @error('logo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $store->slug }}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
        </div>
    </form>
@endsection 