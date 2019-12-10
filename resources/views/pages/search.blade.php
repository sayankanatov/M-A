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
                @if($result)
                Мы тщательно отбираем, проверяем и собеседуем каждого нашего юриста,чтобы вы работали только с настоящими профессионалами своего дела
                @else
                К сожалению ничего не найдено!
                @endif
            </div>
        </div>
    </div>

@if(isset($companies))
    <div class="content_list">
    	@foreach($companies as $company)

        <div class="content_item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="content_item_img">
                                    <a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}">
                                        <img src="{{$company->logo ? '/'.$company->logo : asset('front/img/woman.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="rating_block">
                                    <a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}">0 Отзывов</a> {{-- 9.1 --}}
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="content_item-info">
                                            <div class="content_item-title">
                                                <a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}">
                                                    {{$company->name}} 
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
                                                        $len = count($company->services);
                                                    @endphp
                                                    @foreach($company->services as $service)

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
                                                            Почта:
                                                        </div>
                                                        <div class="content_item_li-right content_item_li-right-active">
                                                            {{$company->email}}
                                                        </div>
                                                    </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            Адрес:
                                                        </div>
                                                        <div class="content_item_li-right">
                                                            {{$company->address}}
                                                        </div>
                                                    </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            Описание:
                                                        </div>
                                                        <div class="content_item_li-right">
@if($company->extra !== null && strlen($company->extra) > 100)
{{mb_strimwidth($company->extra,0,100,"...")}} <a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}"> Далее</a>
@else
{{$company->extra}}
@endif
                                                        </div>
                                                    </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            График работы:
                                                        </div>
                                                        <div class="content_item_li-right">

                                                            {{Config::get('constants.worktime.'.$company->worktime)}},
                                                            {{Config::get('constants.time.'.$company->time)}}
                                                        </div>
                                                    </div>
                                                    <div class="content_item_li">
                                                        <div class="content_item_li-left">
                                                            Консультация:
                                                        </div>
                                                        <div class="content_item_li-right content_item_li-right-active">
                                                            {{$company->price}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="content_item_right">
                                                <a class="content_item-phone" href="tel:{{$company->telephone}}">{{$company->telephone}}</a>
                                                <a class="content_item-connect" href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}">Написать на WhatsApp</a>
                                                <a class="content_item-message" href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}">Написать сообщение</a>
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

@if(isset($lawyers))
    <div class="content_list">
        @foreach($lawyers as $lawyer)

        <div class="content_item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="content_item_img">
                                    <a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}">
                                        <img src="{{$lawyer->image ? '/'.$lawyer->image : asset('front/img/woman.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="rating_block">
                                    <a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}">0 Отзывов</a> {{-- 9.1 --}}
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="content_item-info">
                                            <div class="content_item-title">
                                                <a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}">
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
@if($lawyer->extra !== null && strlen($lawyer->extra) > 100)
{{mb_strimwidth($lawyer->extra,0,100,"...")}} <a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}"> Далее</a>
@else
{{$lawyer->extra}}
@endif
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
                                                <a class="content_item-phone" href="tel:{{$lawyer->telephone}}">{{$lawyer->telephone}}</a>
                                                <a class="content_item-connect">Написать на WhatsApp</a>
                                                <a class="content_item-message" href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}">Написать сообщение</a>
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


@if(isset($services))
    <div class="content_list">
        @foreach($services as $service)

        <div class="content_item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="content_item_img">
                                    <a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
                                        <img src="{{asset('front/img/woman.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="content_item-info">
                                            <div class="content_item-title">
                                                <a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
                                                    {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}} 
                                                </a> 
                                            </div>
                                            
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