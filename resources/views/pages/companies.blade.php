@extends('layouts.category')

@section('content')

<div class="content">
@if($city)
    <div class="content-top">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumb-item"><a href="{{route('main')}}">Главная</a></li>
                <li class="breadcrumb-item">Компании</li>
            </ul>
            <h1 class="content-h1">
                {{$h_one ?? $app_h_one}} ({{$city->companies->count()}})
            </h1>
            <div class="content-desc">
                Мы тщательно отбираем, проверяем и собеседуем каждого нашего юриста,чтобы вы работали только с настоящими профессионалами своего дела
            </div>
            <div class="content-top_sort">
                <a href="{{route('companies',['city' =>$city->alias])}}">По умолчанию</a>
                <a href="{{route('companies',['city' =>$city->alias,'sort' => 'rating'])}}">Рейтинг</a>
                <a href="{{route('companies',['city' =>$city->alias,'sort' => 'experience'])}}">Стаж</a>
            </div>
        </div>
    </div>
@endif
@if($companies)
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
                                    <div class="col-xl-8">
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
                                                        <p>
                                                    @php
                                                        $i = 0;
                                                        $len = count($company->services);
                                                    @endphp
                                                    @foreach($company->services as $service)

                                                        @if($i == $len - 1)
                                                            <a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
                                                            {{$service->name_ru.'.'}}
                                                            </a>
                                                        @else
                                                            <a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
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
                                        <div class="col-xl-4">
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

            {{$companies->links()}}

    </div>
@endif
        
</div>

@endsection