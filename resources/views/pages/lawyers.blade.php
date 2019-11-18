@extends('layouts.category')

@section('content')

<div class="content">
@if($city)
    <div class="content-top">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                <li class="breadcrumb-item">Специалисты</li>
            </ul>
            <h1 class="content-h1">
                Специалисты в г.{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}} ({{$city->lawyers->count()}})
            </h1>
            <div class="content-desc">
                Мы тщательно отбираем, проверяем и собеседуем каждого нашего юриста,чтобы вы работали только с настоящими профессионалами своего дела
            </div>
            <div class="content-top_sort">
                <a href="{{route('lawyers',['city' =>$city->alias])}}">По умолчанию</a>
                <a href="{{route('lawyers',['city' =>$city->alias,'sort' => 'rating'])}}">Рейтинг</a>
                <a href="{{route('lawyers',['city' =>$city->alias,'sort' => 'experience'])}}">Стаж</a>
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
                                    <div class="col-xl-8">
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
                                                        <p>
                                                    @php
                                                        $i = 0;
                                                        $len = count($lawyer->services);
                                                    @endphp
                                                    @foreach($lawyer->services as $service)

                                                        @if($i == $len - 1)

                                                            <a href="{{route('service',['city'=>$city->alias,'id'=>$service->id])}}">{{$service->name_ru.'.'}}
                                                            </a>
                                                        @else
                                                            <a href="{{route('service',['city'=>$city->alias,'id'=>$service->id])}}">
                                                            {{$service->name_ru.', '}}
                                                            </a>

                                                        @endif

                                                        @php
                                                            $i++;
                                                        @endphp

                                                    @endforeach
                                                        </p>
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
                                                            <p>
@if($lawyer->extra !== null && strlen($lawyer->extra) > 100)
{{mb_strimwidth($lawyer->extra,0,100,"...")}}<a href="{{route('lawyer',['id'=>$lawyer->id,'city' => $city->alias])}}"> Далее</a>
@else
{{$lawyer->extra}}
@endif

                                                            </p>
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
                                        <div class="col-xl-4">
                                            <div class="content_item_right">
                                                <a class="content_item-connect" href="{{route('lawyer',['id'=>$lawyer->id,'city' => $city->alias])}}">Получить консультацию</a>
                                                <div class="content_item-phone link-phone">
                                                    <strong class="xx-large">8 777 XXX XX XX </strong>
                                                    <span class="spoiler">Показать</span>
                                                </div>
                                                <a class="content_item-message" href="{{route('lawyer',['id'=>$lawyer->id,'city' => $city->alias])}}">Написать сообщение</a>
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

            {{$lawyers->links()}}

    </div>
@endif
        
</div>

@endsection