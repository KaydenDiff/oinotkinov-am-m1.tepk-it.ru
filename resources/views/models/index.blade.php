@extends('layout.layout')

@section('title', 'Список модели')

@section('content')
    <a class="btn" href="{{route('models.create')}}">Создать модели</a>
    @foreach($models as $model)
        <a class="main" href="/models/edit/{{$model->id}}">
            <div class="flex border">
                <div class="div85">
                    <div class="bigFont">{{$model->partnerType->name}} | {{$model->name}}</div>
                </div>
                <div class="div15 bigFont">{{$partnerDisscount[$model->id]}} %</div>

            </div>
        </a>
        <a style="padding-left: 20px" class="btn" href="/models/history/{{$model->id}}">
            История
        </a>
        <a class="btn" href="/models/delete/{{$model->id}}">Удалить партнера</a>
    @endforeach
@endsection
