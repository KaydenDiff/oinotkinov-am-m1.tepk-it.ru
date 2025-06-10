@extends('layout.layout')

@section('title', 'Создание партнёра')

@section('content')
    <a class="btn" href="{{ route('products.index') }}">Назад</a>
    <h1>Создание продукта:</h1>
    <form class="container" action="{{ route('products.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif
        <div>
            @error('product_type_id')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Тип продукции</label>
            <select name="product_type_id" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            @error('name')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Наименование продукта:</label>
            <input type="text" name="name" placeholder="Введите название продукта" required>
        </div>
        <div>
            @error('article')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Артикул</label>
            <input type="text" name="article" placeholder="Введите артикул" required>
        </div>
        <div>
            @error('min_price')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Минимальная стоимость (р):</label>
            <input type="number" name="min_price" min="0.01" step="0.01" placeholder="Введите минимальную стоимость" required>
        </div>
        <div>
            @error('width')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Ширина (м):</label>
            <input type="number" name="width" min="0.01" step="0.01" placeholder="Введите ширину" required>
        </div>

        <button class="submit" type="submit">Создать продукт</button>
    </form>
@endsection
