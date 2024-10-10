@extends('layout.app')

@section('title', 'Produtos')

@section('content')
    <div class="container ">
        <h2>Lista de produtos</h2>
        <div class="my-2">
            @include('includes.alerts')
        </div>
        <a href="{{route('product.create')}}" class="btn btn-primary mb-2">Novo produto</a>
        <table class="table table-dark table-hover table-bordered rounded">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Estoque</th>
                <th scope="col">Categoria</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->category_id}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <hr>
          <div class=" my-2">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
