@extends('layout.layout')

@section('title', 'Создание модели')
@section('content')
    <a class="btn" href="{{route('models.index')}}">Назад</a>
    <form style="padding-left: 20px" action="{{route('models.store')}}" method="post" enctype="application/x-www-form-urlencoded">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных");
            </script>
        @endif
        <div>
            @error('model_type_id')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Тип партнера</label>
            <select name="model_type_id" required>
                @foreach($types as $type)
                    <option value="{{$type->id}}" >{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            @error('name')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Имя партнера</label>
            <input name="name" placeholder="Введите имя" required >
        </div>
        <div>
            @error('director')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Имя директора партнера</label>
            <input name="director" placeholder="Введите имя директора" required>
        </div>
        <div>
            @error('email')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Почта партнера</label>
            <input name="email" type="email" placeholder="Введите почту" required>
        </div>
        <div>
            @error('phone')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Телефон партнера</label>
            <input name="phone" placeholder="Введите телефон" type="text" required>
        </div>
        <div>
            @error('adress')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Адрес партнера</label>
            <input name="adress" placeholder="Введите адрес" type="text" required>
        </div>
        <div>
            @error('inn')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>ИНН партнера</label>
            <input name="inn" placeholder="Введите ИНН" type="text" required>
        </div>
        <div>
            @error('rating')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Рейтинг партнера</label>
            <input name="rating" placeholder="Введите " value="1" type="number" min="1" max="10" required>
        </div>
        <button class="btn" type="submit">
            Создать партнера
        </button>
    </form>
@endsection
