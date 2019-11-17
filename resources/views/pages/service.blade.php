@extends('layouts.category')

@section('content')

<div class="content">
@if($city)
    <div class="content-top">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                <li class="breadcrumb-item">{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}</li>
            </ul>
            <h1 class="content-h1">
                Специалисты в городе {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}} ({{$count}})
            </h1>
            <div class="content-desc">
                Мы тщательно отбираем, проверяем и собеседуем каждого нашего юриста,чтобы вы работали только с настоящими профессионалами своего дела
            </div>
        </div>
    </div>
@endif

@if($lawyers)
    <div class="content_list">
        @foreach($lawyers as $lawyer)

        <div class="content_item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="content_item_img">
                                    <a href="{{route('lawyer',['id'=>$lawyer->id,'city' => $city->alias])}}">
                                        <img src="{{$lawyer->image ? '/'.$lawyer->image : asset('front/img/woman.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="rating_block">
                                    <a href="{{route('lawyer',['id'=>$lawyer->id,'city' => $city->alias])}}">0 Отзывов</a> {{-- 9.1 --}}
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="content_item-info">
                                            <div class="content_item-title">
                                                <a href="{{route('lawyer',['id'=>$lawyer->id,'city' => $city->alias])}}">
                                                    {{$lawyer->last_name.' '.$lawyer->first_name.' '.$lawyer->patronymic }} 
                                                </a> 
                                            </div>
                                            <div class="content_item_ul">
                                                <div class="content_item_li">
                                                    <div class="content_item_li-left">
                                                        Специализация:
                                                    </div>
                                                    <div class="content_item_li-right content_item_li-right-active">
                                                    @php
                                                        $i = 0;
                                                        $len = count($lawyer->services);
                                                    @endphp
                                                    @foreach($lawyer->services as $service)

                                                        @if($i == $len - 1)

                                                            {{$service->name_ru.'.'}}
                                                        @else
                                                            {{$service->name_ru.', '}}

                                                        @endif

                                                        @php
                                                            $i++;
                                                        @endphp

                                                    @endforeach
                                                    </div>
                                                </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            Стаж:
                                                        </div>
                                                        <div class="content_item_li-right content_item_li-right-active">
                                                            {{$lawyer->work_experience}}
                                                        </div>
                                                    </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            Адрес:
                                                        </div>
                                                        <div class="content_item_li-right">
                                                            {{$lawyer->address}}
                                                        </div>
                                                    </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            Описание:
                                                        </div>
                                                        <div class="content_item_li-right">
                                                            {{$lawyer->extra}}
                                                        </div>
                                                    </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            График работы:
                                                        </div>
                                                        <div class="content_item_li-right">

                                                            {{Config::get('constants.worktime.'.$lawyer->worktime)}},
                                                            {{Config::get('constants.time.'.$lawyer->time)}}
                                                        </div>
                                                    </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            Консультация:
                                                        </div>
                                                        <div class="content_item_li-right content_item_li-right-active">
                                                            {{$lawyer->price}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="content_item_right">
                                                <a class="content_item-connect">Получить консультацию</a>
                                                <a class="content_item-phone">8 777 XXX XX XX <span>Показать</span></a>
                                                <a class="content_item-message">Написать сообщение</a>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            @endforeach

    </div>
@endif
        
</div>

@endsection