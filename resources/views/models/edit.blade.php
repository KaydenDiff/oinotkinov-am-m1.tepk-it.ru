@extends('layout.layout')

@section('title', 'Редактирование модели' )
@section('content')
    <a class="btn" href="{{route('models.index')}}">Назад</a>
    <form style="padding-left: 20px " action="{{route('models.update', $model->id) }}" method="post" enctype="application/x-www-form-urlencoded">
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
            <select name="model_type_id">
                @foreach($types as $type)
                    <option value="{{$type->id}}" @if($type->id === $partner->partnerType->id) selected @endif>{{$type->name}}</option>
                    ) @endforeach
            </select>
        </div>
        <div>
            @error('name')

            <p class="warning">{{$message}}</p>
            @enderror
            <label>Имя партнера</label>
            <input name="name" value="{{$partner->name}}" required>
        </div>
        <div>
            @error('director')
            <p class="warning">{{$message}}}</p>
            @enderror
            <label>Имя директора партнера</label>
            <input name="director" value="{{$partner->director}}" required>
        </div>
        <div>
            @error('email')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Почта партнера</label>
            <input name="email" type="email" value="{{$partner->email}}" required>
        </div>
        <div>
            @error('phone')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Телефон партнера</label>
            <input name="phone" type="text" value="{{$partner->phone}}" required>
        </div>
        <div>
            @error('adress')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Адрес партнера</label>
            <input name="adress" type="text" value="{{$partner->adress}}" required>
        </div>
        <div>
            @error('inn')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>ИНН партнера</label>
            <input name="inn" type="text" value="{{$partner->inn}}" required>
        </div>
        <div>
            @error('rating')
            <p class="warning">{{$message}}</p>
            @enderror
            <label>Рейтинг партнера</label>
            <input name="rating" type="number" value="{{$partner->rating}}" min="1" max="10" required>
        </div>
        <button class="btn" type="submit">
            Обновить данные
        </button>
    </form>
@endsection
