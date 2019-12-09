<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(env('APP_NAME') == 'Test')
    <meta name="robots" content="noindex, nofollow" />
    @endif
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="title" content=""> --}}
    <meta name="keywords" content="{{$seo_keywords ?? $app_seo_keywords}}">
    <meta name="description" content="{{$seo_desc ?? $app_seo_desc}}">

    <title>{{$seo_title ?? $app_seo_title}}</title>

    <link rel="stylesheet" href="{{asset('front//style/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/style/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/style/media.css')}}">
</head>
<body class="second-page">

    @php

        if(isset($city)){}

        else{$city = App\Models\City::find(Config::get('constants.city'));}
        
    @endphp
    
    <header>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="header_left">
                    <div class="logo">
                        <a href="{{route('main')}}">
                            <img src="{{asset('front/img/logo.png')}}" alt="">
                        </a>
                    </div>
                    @if($city)
                    <div class="city_blok">
                        <div class="city_blok_title">
                            {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
                        </div>

                        <ul class="city_list">
                            @foreach(App\Models\City::all() as $c)
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
                <div class="serch_home serch">
                    <form action="{{route('search')}}" id="form-serch" class="serch" method="post">
                        @csrf
                        <input type="text" class="input-serch" name="search" placeholder="Адвокат / юрист или услуга"> 
                        <input type="submit" class="submit-serch" value="Найти">
                    </form>  
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
            <ul class="menu">
                <li><a href="{{route('main')}}">Главная</a></li>

                <li><a href="{{route('lawyers',['city'=>$city->alias])}}">Специалисты</a></li>
                <li><a href="{{route('companies',['city'=>$city->alias])}}">Юридические компании</a></li>
                <li><a href="{{route('services',['city'=>$city->alias])}}">Услуги</a></li>
                
            </ul>
        </div>
    </header>
    <div class="header_menu-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header_menu">
                        <ul class="menu">

                            <li>
                                <a href="{{route('lawyers',['city'=>$city->alias])}}">Специалисты</a>
                            </li>
                            <li>
                                <a href="{{route('companies',['city'=>$city->alias])}}">Юридические компании</a>
                            </li>
                            <li>
                                <a href="{{route('services',['city'=>$city->alias])}}">Услуги</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')


    @include('includes.footer')

    <script src="{{asset('front/script/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front/script/popper.min.js')}}"></script>
    <script src="{{asset('front/script/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/script/script.js')}}"></script>
</body>
</html>