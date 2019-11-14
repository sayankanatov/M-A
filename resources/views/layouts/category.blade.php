<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Бесплатный сервис по поиску адвокатов/юристов по всему Казахстану</title>
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
                    {{-- @if($city)
                    <div class="city_blok">
                        {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}<img src="{{asset('front/img/back.png')}}" alt="">
                    </div>
                    @endif --}}
                </div>
                <div class="serch_home serch">
                    <form action="" id="form-serch" class="serch">
                        <input type="text" class="input-serch" name="serch" placeholder="Адвокат / юрист или услуга"> 
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
                <li><a href="/">Главная</a></li>

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