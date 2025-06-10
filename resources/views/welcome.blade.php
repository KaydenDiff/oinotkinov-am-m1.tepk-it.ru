@extends('layout.layout')
@section('title', 'Домашняя страница')


@section('content')
    <h1>Добро пожаловать на домашнюю страницу</h1>
    <div class="text" >Хотите просмотреть список продуктов?<a class="text" href="{{ route('products.index') }}">Перейти списку продуктов</a> </div>
@endsection
