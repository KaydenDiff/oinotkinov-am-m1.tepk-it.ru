@extends('layout.layout')

@section('title', 'Список продуктов')

@section('content')
    <div class="title">
        <h1>Список продуктов:</h1>
        <a class="btn" href="{{route('products.create')}}">Создание продукта</a>
    </div>

    @foreach($products as $product)
        <a class="card" href="{{route('products.edit', $product->id)}}">
            <div class="flex border">
                <div class="div85">
                    <div class="bigFont"> {{$product->productType->name}} | {{$product->name}}</div>
                    <div class="bigFont"> Артикул: {{$product->article}}</div>
                    <div class="bigFont"> Минимальная стоимость для партнера: {{$product->min_price}} (р)</div>
                    <div class="bigFont"> Ширина: {{$product->width}} (м)</div>
                </div>
                <div class=" bigFont">{{$product->cost}}</div>
            </div>
        </a>
        <a style="padding-left: 20px" class="btn" href="{{route('products.materials', $product->id)}}">
            Материалы продукта
        </a>

    @endforeach
@endsection
