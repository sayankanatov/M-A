@extends('layouts.category')

@section('content')

<div class="content">

	@if($city)
    <div class="content-top">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumb-item">
                	<a href="{{route('main')}}">Главная</a>
                </li>
                <li class="breadcrumb-item">
                	<a href="{{route('companies',['city' =>$city->alias])}}">Компании</a>
            	</li>
            </ul>
        </div>
    </div>
	@endif

    <div class="content_list content_list-item">
        <div class="content_item">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="content_item_img">
                                    <a href="/">
                                        <img src="{{asset('front/img/woman.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-9">

                                <div class="content_item-info">

                                    <div class="content_item-title">
                                        {{$company->name}}
                                    </div>

                                    <div class="content_item_ul content_item_ul-item">
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
                                    </div>
                                    {{-- <div class="rating_block rating_block-item">
                                        <span>3,9</span><br>
                                            рейтинг
                                    </div> --}}

                                    <div class="content_item_right content_item_right-item">
                                        <a class="content_item-connect">Получить консультацию</a>
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

        <div class="content_list-item-info">
            <div class="container">
                <div class="row">

                    <div class="content_list-item-title">
                        О компании
                    </div>
                    <div class="content_list-item-text">
                        {!!$company->extra!!}
                    </div>


                    <div class="content_list-item-title">
                        Услуги и цены
                    </div>
                    <div class="content_list-item-ul">
                    
                    @foreach($company->services as $service)

                        <ul>
                            <li>{{$service->name_ru}}</li>
                            <li></li>
                            <li>по договорённости</li>
                        </ul>

                    @endforeach

                    </div>

                    <div class="content_list-item-title">
                        График работы:  
                        <div class="schedule">
                            <p></p>
                        </div>
                    </div>
                    <div class="content_list-item-title">
                        Контакты:  
                        <div class="schedule">
                            <p><a href="tel:{{$company->telephone}}">{{$company->telephone}}</a></p>
                            <p><img src="{{asset('front/img/whatsapp-icon.png')}}" alt=""><a href="tel:{{$company->telephone}}">{{$company->telephone}}</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        {{-- <div class="content_list-item-reviews">
            <div class="container">
                <div class="row">
                    <div class="content_list-item-title content_list-item-title-center">
                        Отзывы
                    </div>

                    <div class="col-lg-8 offset-lg-2">

                        <div class="reviews-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="reviews-item-autor-img">
                                        <img src="/img/reviews-img-1.jpg" alt="">
                                    </div>
                                    <div class="reviews-item-autor-title">
                                        А. Медяков
                                    </div>
                                    <div class="reviews-item-autor-text">
                                        Генеральный директор<br>
                                        ООО «КОДА»<br>
                                        <a href="www.igralex.ru">www.igralex.ru</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="reviews-item-text">
                                        DD зарекомендовала себя надёжным деловым партнёром, обладающим большим потенциалом для решения практически любых задач 
                                        во внешнеэкономической деятельности. Хочется отметить профессионализм и внимательное отношение, творческий подход 
                                        и принятие оптимальных решений в нештатных ситуациях. 
                                        Рассчитываю на дальнейшее плодотворное сотрудничество. 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="reviews-item-autor-img">
                                        <img src="/img/reviews-img-1.jpg" alt="">
                                    </div>
                                    <div class="reviews-item-autor-title">
                                        А. Медяков
                                    </div>
                                    <div class="reviews-item-autor-text">
                                        Генеральный директор<br>
                                        ООО «КОДА»<br>
                                        <a href="www.igralex.ru">www.igralex.ru</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="reviews-item-text">
                                        DD зарекомендовала себя надёжным деловым партнёром, обладающим большим потенциалом для решения практически любых задач 
                                        во внешнеэкономической деятельности. Хочется отметить профессионализм и внимательное отношение, творческий подход 
                                        и принятие оптимальных решений в нештатных ситуациях. 
                                        Рассчитываю на дальнейшее плодотворное сотрудничество. 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="reviews-item-autor-img">
                                        <img src="/img/reviews-img-1.jpg" alt="">
                                    </div>
                                    <div class="reviews-item-autor-title">
                                        А. Медяков
                                    </div>
                                    <div class="reviews-item-autor-text">
                                        Генеральный директор<br>
                                        ООО «КОДА»<br>
                                        <a href="www.igralex.ru">www.igralex.ru</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="reviews-item-text">
                                        DD зарекомендовала себя надёжным деловым партнёром, обладающим большим потенциалом для решения практически любых задач 
                                        во внешнеэкономической деятельности. Хочется отметить профессионализм и внимательное отношение, творческий подход 
                                        и принятие оптимальных решений в нештатных ситуациях. 
                                        Рассчитываю на дальнейшее плодотворное сотрудничество. 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="reviews-item-autor-img">
                                        <img src="/img/reviews-img-1.jpg" alt="">
                                    </div>
                                    <div class="reviews-item-autor-title">
                                        А. Медяков
                                    </div>
                                    <div class="reviews-item-autor-text">
                                        Генеральный директор<br>
                                        ООО «КОДА»<br>
                                        <a href="www.igralex.ru">www.igralex.ru</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="reviews-item-text">
                                        DD зарекомендовала себя надёжным деловым партнёром, обладающим большим потенциалом для решения практически любых задач 
                                        во внешнеэкономической деятельности. Хочется отметить профессионализм и внимательное отношение, творческий подход 
                                        и принятие оптимальных решений в нештатных ситуациях. 
                                        Рассчитываю на дальнейшее плодотворное сотрудничество. 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div> --}}        
</div>

@endsection