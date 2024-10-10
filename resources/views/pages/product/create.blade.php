@extends('layout.app')

@section('title', 'Criar novo produto')

@section('content')
    <div class="container ">
        <h2>Criar novo produto</h2>
        <div class="my-3">
            @include('includes.alerts')
        </div>
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="my-3 ">
                <label for="">Descrição</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="price">Preço</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <div class="col-md-4">
                    <label for="stock">Estoque</label>
                    <input type="number" class="form-control" name="stock" required>
                </div>
                
                <div class="col-md-4">
                    <label for="stock">Categoria</label>
                    <select class="form-select" name="category_id" required>
                        <option value="">Selecione uma categoria</option>
                        
                        @foreach ($categories['children_categories'] as $category)
                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-3 input-group">
                <span class="input-group-text">Imagem</span>
                <input type="file" class="form-control" name="image" accept="image/png" required>
            </div>

            <div>
                <a href="{{route('product.index')}}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection