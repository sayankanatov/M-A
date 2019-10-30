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
                Специалисты в {{$city->id == Config::get('constants.city') ? "Астане" : "Алматы"}} ({{$count}})
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
                                        <img src="{{-- {{$lawyer->image ? '/'.$lawyer->image : asset('front/img/woman.png')}} --}}{{asset('front/img/woman.png')}}" alt="">
                                    </div>
                                    <div class="rating_block">
                                        9.1
                                    </div>
                                    <div class="feedback_block">
                                        <a href="#">12 Отзывов</a>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="content_item-info">
                                        <div class="content_item-title">
                                            {{$lawyer->last_name.' '.$lawyer->first_name.' '.$lawyer->patronymic }} <a href=""><img src="{{asset('front/img/share-social.png')}}" alt=""></a>
                                        </div>
                                        <div class="content_item-desc">
                                            Частная практика
                                        </div>
                                        <div class="content_item_ul">
                                            <div class="content_item_li">
                                                <div class="content_item_li-left">
                                                    Образование:
                                                </div>
                                                <div class="content_item_li-right">
                                                    {{$lawyer->education}}
                                                </div>
                                            </div>
                                            <div class="content_item_li">
                                                <div class="content_item_li-left">
                                                    Стаж:
                                                </div>
                                                <div class="content_item_li-right">
                                                    {{$lawyer->work_experience}}
                                                </div>
                                            </div>
                                            <div class="content_item_li">
                                                <div class="content_item_li-left">
                                                    Консультация :
                                                </div>
                                                <div class="content_item_li-right">
                                                	<div class="content_item_li-cont">Платная</div>
                                                	@if($lawyer->is_free == 1)
                                                	<div class="content_item_li-cont">
                                                        Бесплатная
                                                    </div>
                                                	@endif
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <a href="/" class="content_item-connect">Получить консультацию</a>

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