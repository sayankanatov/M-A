<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(env('APP_NAME') == 'Test')
    <meta name="robots" content="noindex, nofollow" />
    @endif
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="{{$seo_title ?? $app_seo_title}}">
    <meta name="keywords" content="{{$seo_keywords ?? $app_seo_keywords}}">
    <meta name="description" content="{{$seo_desc ?? $app_seo_desc}}">

    <title>{{$h_one ?? $app_h_one}}</title>

    <link rel="stylesheet" href="{{asset('front/style/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/style/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/style/media.css')}}">
</head>
<body class="home">
    
    <header>
        <div class="container">
            <div class="row justify-content-between">

                <div class="header_left">
                    <div class="logo">
                        <a href="{{route('main')}}">
                            <img src="{{asset('front/img/logo.png')}}" alt="">
                        </a>
                    </div>
                    @if($cities)
                    <div class="city_blok">
                        @if($city)
                        <div class="city_blok_title">
                            {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
                        </div>
                        @endif
                        
                        <ul class="city_list">
                            @foreach($cities as $c)
                            <li>
                                <a href="{{route('city',['city'=>$c->alias])}}">
                                {{app()->getLocale() == 'ru' ? $c->name_ru : $c->name_kz}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        
                    </div>
                    @endif
                </div>
                <div class="header_right">
                    <a href="{{route('login')}}" class="login login_block">
                        <img src="{{asset('front/img/friends.png')}}" alt="">
                        Вход
                    </a>
                    <a href="{{route('register')}}" class="register login_block">
                        <img src="{{asset('front/img/voter.png')}}" alt="">
                        Регистрация 
                    </a>
                </div>
                <div class="header_right-burger">
                    <div class="burger_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="header_mobile_menu">
            <div class="header_mobile_menu_ul">
                <div class="offcanvas__links">
                    <a class="offcanvas__link" href="{{route('main')}}">
                        Главная
                    </a>
                </div>

                @if($cities)
                <div class="city_blok">
                    
                    @if($city)  
                    <div class="city_blok_title">
                        {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
                    </div>
                    @endif

                    <ul class="city_list">
                    @foreach($cities as $c)
                        <li>
                            <a href="{{route('city',['city'=>$c->alias])}}">
                                {{app()->getLocale() == 'ru' ? $c->name_ru : $c->name_kz}}
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>
                @endif
                

                @if($services)
                <div class="offcanvas__links">
                    <a class="offcanvas__link offcanvas__link_perents">
                        Специалисты
                    </a>
                    <div class="offcanvas__link-list hidden" id="specialtiesList">
                        <a href="{{route('lawyers',['city'=>$city->alias])}}">Все cпециалисты</a>
                        @foreach($services as $service)
                        <a class="offcanvas__link-item" href="{{route('service',['city'=>$city->alias,'id'=>$service->id])}}">{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}</a>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="offcanvas__links">
                    <a class="offcanvas__link" href="{{route('companies',['city'=>$city->alias])}}">
                        Компании
                    </a>
                </div>
                <div class="offcanvas__links">
                    <a class="offcanvas__link" href="{{route('services',['city'=>$city->alias])}}">
                        Услуги
                    </a>
                </div>
            </div>
            
            <!--
            <ul class="menu">
                <li><a href="/">Главная</a></li>
                <li><a href="/">Специалисты</a></li>
                <li><a href="/">Юридические компании</a></li>
                <li><a href="/">Услуги</a></li>
            </ul>-->
        </div>
    </header>
    <div class="section_baner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="baner_h1">
                        {{$h_one ?? $app_h_one}}
                    </h1>
                    <div class="baner_sity">
                        <div class="city_blok">
                            @if($city)
                            <div class="city_blok_title">
                                {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
                            </div>
                            @endif

                            @if($cities)
                            <ul class="city_list">
                                @foreach($cities as $c)
                                <li>
                                    <a href="{{route('city',['city'=>$c->alias])}}">
                                        {{app()->getLocale() == 'ru' ? $c->name_ru : $c->name_kz}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="serch_home serch">
                        <form action="{{route('search')}}" id="form-serch" class="serch" method="post">
                            @csrf
                            <input type="text" class="input-serch" name="search" placeholder="Адвокат / юрист или услуга"> 
                            <input type="submit" class="submit-serch" value="Найти">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section_banner_bottom">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-sm-12">
                    <div class="banner_item_block">
                        <div class="banner_item">
                            <img src="{{asset('front/img/court.png')}}" alt="">
                            <div class="banner_item_block-body">
                                <div class="banner_menu_title">
                                    Специалисты
                                </div>
                                <div class="banner_menu_number">
                                    Всего юристов {{$lawyer_count ?? '538'}}
                                </div>
                            </div>
                            <a href="{{route('lawyers',['city'=>$city->alias])}}">Подробнее</a>
                        </div>
                        <div class="banner_item">
                            <img src="{{asset('front/img/law.png')}}" alt="">
                            <div class="banner_item_block-body">
                                <div class="banner_menu_title">
                                    Юридические компании
                                </div>
                                <div class="banner_menu_number">
                                    Всего компании {{$company_count ?? '538'}}
                                </div>
                            </div>
                            <a href="{{route('companies',['city'=>$city->alias])}}">Подробнее</a>
                        </div>
                        <div class="banner_item">
                            <img src="{{asset('front/img/support.png')}}" alt="">
                            <div class="banner_item_block-body">
                                <div class="banner_menu_title">
                                    Услуги
                                </div>
                                <div class="banner_menu_number">
                                    Всего услуг {{$service_count ?? '538'}}
                                </div>
                            </div>
                            <a href="{{route('services',['city'=>$city->alias])}}">Подробнее</a>
                        </div>
                        <!--
                        <div class="banner_item">
                            <img src="/img/support.png" alt="">
                            <div class="banner_menu_title">
                                Нотариат
                            </div>
                            <div class="banner_menu_number">
                                Всего услуг 538
                            </div>
                        </div>
                        -->
                    </div>
                </div>

            </div>
        </div>     
    </div>

    @if($services)
    <div class="sectoion">

        <div class="section_title">
            Специализация
        </div>

        <div class="container">
            
            <div class="row">

                @foreach($services as $service)
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="a-special-item-li">
                        <a href="{{route('service',['city'=>$city->alias,'id'=>$service->id])}}">
                            {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}} <span>({{App\Models\Lawyer::getByServiceInCity($service->id,$city->id,true)}})</span>
                        </a>
                    </div>
                </div>
                @endforeach
                
            </div>

        </div>  

    </div>
    @endif

    <div class="sectoion sectoion-advantages">

        <div class="section_title">
            <span>«Мой Адвокат»</span><br>
            - удобный сервис по подбору <br>
            юристов / адвокатов в городе {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
        </div>

        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-4">
                    <div class="advan_item">
                        <div class="advan_item-img">
                            <img src="{{asset('front/img/advan1.png')}}" alt="">
                        </div>
                        <div class="advan_item_title">
                            Вы оставляете заявку
                        </div>
                        <div class="advan_item_text">
                            Кратко опишите задачу или
                            юриста, которого вы ищете
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="advan_item">
                        <div class="advan_item-img">
                            <img src="{{asset('front/img/advan2.png')}}" alt="">
                        </div>
                        <div class="advan_item_title">
                            Мы находим кандидатов
                        </div>
                        <div class="advan_item_text">
                            Наш специалист свяжется 
                            с вами в течение часа 
                            и предложит вариант
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="advan_item">
                        <div class="advan_item-img">
                            <img src="{{asset('front/img/advan3.png')}}" alt="">
                        </div>
                        <div class="advan_item_title">
                            Юрист решает задачу
                        </div>
                        <div class="advan_item_text">
                            Выбранный юрист поможет
                            с решением вашей задачи
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if($faq)
    <div class="sectoion sectoion-question">

        <div class="section_title">
            Часто задаваемые вопросы
        </div>

        <div class="container">
            <div class="row">
                
                @foreach($faq as $item)
                <div class="col-sm-12">
                    <div class="question-item question-item-close">
                        <div class="question-item-title">
                            <img src="{{asset('front/img/quest-icon.png')}}" alt=""> {{app()->getLocale() == 'ru' ? $item->question_ru : $item->question_kz}}
                        </div>
                        <div class="question-item-text">
                            {!!app()->getLocale() == 'ru' ? $item->answer_ru : $item->answer_kz!!}
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

    @endif

    @include('includes.footer')

    <script src="{{asset('front/script/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front/script/popper.min.js')}}"></script>
    <script src="{{asset('front/script/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/script/script.js')}}"></script>
</body>
</html>