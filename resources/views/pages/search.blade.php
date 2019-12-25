@extends('layouts.category')

@section('content')

<div class="content">

    <div class="content-top">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                <li class="breadcrumb-item">Поиск</li>
            </ul>
            <h1 class="content-h1">
                {{$h_one ?? $app_h_one}}
            </h1>
            <div class="content-desc">
                К сожалению ничего не найдено!
            </div>
        </div>
    </div>
     
</div>

@endsection