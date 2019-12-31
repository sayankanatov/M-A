<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TJ6XV78');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('front2/img/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('front2/img/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('front2/img/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('front2/img/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('front2/img/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('front2/img/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('front2/img/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('front2/img/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front2/img/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('front2/img/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front2/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('front2/img/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front2/img/favicon/favicon-16x16.png')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    @if(env('APP_NAME') == 'Test')
    <meta name="robots" content="noindex, nofollow" />
    @endif

    <title>{{$seo_title ?? $app_seo_title}}</title>
    <meta name="description" content="{{$seo_desc ?? $app_seo_desc}}">
    <meta name="keywords" content="{{$seo_keywords ?? $app_seo_keywords}}">

    <meta property="og:site_name" content="Yuristy.kz">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:title" content="{{$seo_title ?? $app_seo_title}}">
    <meta property="og:description" content="{{$seo_desc ?? $app_seo_desc}}">
    <meta property="og:image" content="{{asset('front2/img/logo.jpg')}}">
    <meta property="og:url" content="{{Request::url()}}">
    <link href="{{Request::url()}}" rel="canonical">

    <link rel="preload" href="{{asset('front2/fonts/FuturaPT-Light.woff')}}" as="font">
    <link rel="preload" href="{{asset('front2/fonts/FuturaPT-Medium.woff')}}" as="font">
    <link rel="preload" href="{{asset('front2/fonts/FuturaPT-Bold.woff')}}" as="font">
    <link rel="preload" href="{{asset('front2/fonts/FuturaPT-Book.woff')}}" as="font">

    <!--
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/component.css">
    -->
    <link rel="stylesheet" href="{{asset('front2/css/full.css')}}">

    <link rel="stylesheet" href="{{asset('front2/css/style.css?v=0.0.8')}}">
    <link rel="stylesheet" href="{{asset('front2/css/media.css?v=0.0.8')}}">

</head>
<body class="page page-{{Request::route()->getName() == 'service' ? 'specialists' : 'сompanies'}}">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ6XV78"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @php

        if(isset($city)){}

        else{$city = App\Models\City::find(Config::get('constants.city'));}
        
    @endphp

    <div class="header_mobile_menu">
        <div class="header_mobile_menu_ul">
            <div class="header_mobile_menu_ul_title">
                <a class="header_btn md-trigger" data-modal="formlogin">
                    Вход
                </a>
                <a class="header_btn md-trigger" data-modal="formregistr">
                    Регистрация 
                </a>
            </div>
            <ul class="menu">
                <li><a href="{{route('lawyers',['city'=>$city->alias])}}">Специалисты</a></li>
                <li><a href="{{route('companies',['city'=>$city->alias])}}">Компании</a></li>
                <li><a href="#">Нотариусы</a></li>
            </ul>

        </div>
    </div>

    <div class="wrapper">

        <header class="header">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-lg-6">
                        <div class="header_left">

                            <div class="header_right-burger">
                                <div class="burger_menu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <div class="logo_block">
                                <a href="/" class="logo" title="">
                                    <img src="{{asset('front2/img/logo.png')}}" title="" alt="">
                                </a>
                            </div>
                            @if($city)
                            <div class="city_block">
                                <div class="city_top">
                                    {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
                                </div>
                                <div class="city_list">
                                    <ul class="menu">
                                    @foreach(App\Models\City::all() as $c)
                                        <li>
                                            <a href="{{route('city',['city'=>$c->alias])}}">
                                            {{app()->getLocale() == 'ru' ? $c->name_ru : $c->name_kz}}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                    
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="header_right">
                            <div class="header_right-block">
                                <a class="header_btn header_btn_login md-trigger" data-modal="formlogin">
                                    Вход
                                </a>
                                <a class="header_btn header_btn_reg md-trigger" data-modal="formregistr">
                                    <img src="{{asset('front2/img/register.png')}}" alt=""> Регистрация 
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="page_search section_baner">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="serch_home serch">
                            <form action="{{route('search')}}" id="form-serch" class="serch" method="post">
                                @csrf
                                <input type="hidden" name="city" value="{{$city->alias}}"> 
                                {{-- <select class="js-example-basic-single input-serch" name="search" placeholder="Адвокат / юрист или услуга">
                                    
                                    @if($services)
                                    <optgroup label="Юристы">
                                        @foreach($services as $service)
                                        <option value="{{$service->id}}">
                                            {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}
                                        </option>
                                        @endforeach
                                    </optgroup> 
                                    @endif
                                    
                                </select> --}}
                                <input type="text" name="search" class="form-serch_input" placeholder="Юрист, фирма и услуга">
                                <input type="submit" class="submit-serch" value="Найти">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="page_banner_bottom">
            <div class="container">
                <div class="page_banner_bottom-menu">
                    <ul class="menu">
                        <li class="{{Request::route()->getName() == 'lawyers' ? 'menu-active' : ''}}">
                            <a href="{{route('lawyers',['city'=>$city->alias])}}">Специалисты</a>
                        </li>
                        <li class="{{Request::route()->getName() == 'companies' ? 'menu-active' : ''}}">
                            <a href="{{route('companies',['city'=>$city->alias])}}">Юридические компании</a>
                        </li>
                        <li class="{{Request::route()->getName() == 'notariuses' ? 'menu-active' : ''}}">
                            <a href="#">Нотариусы</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @yield('content')

        @include('includes.footer')

    </div>

    @include('includes.form-login')
    @include('includes.form-register')
    @include('includes.form-feedback')


    <div class="md-overlay"></div>

    <link rel="stylesheet" href="{{asset('front2/css/swiper.min.css')}}">
    <link href="{{asset('front2/css/select2.min.css')}}" rel="stylesheet" />
    
    <script src="{{asset('front2/js/jquery-3.3.1.min.js')}}" crossorigin="anonymous" type="text/javascript"></script>
    <script src="{{asset('front2/js/popper.min.js')}}" defer="" crossorigin="anonymous" type="text/javascript"></script>
    <script src="{{asset('front2/js/bootstrap.min.js')}}" defer="" crossorigin="anonymous" type="text/javascript"></script>
    <script src="{{asset('front2/js/swiper.min.js')}}" defer="" crossorigin="anonymous" type="text/javascript"></script>
    <script src="{{asset('front2/js/classie.js')}}" defer="" crossorigin="anonymous" type="text/javascript"></script>
    <script src="{{asset('front2/js/modalEffects.js')}}" defer="" crossorigin="anonymous" type="text/javascript"></script>
    <script src="{{asset('front2/js/select2.min.js')}}" defer="" crossorigin="anonymous" type="text/javascript"></script>
    <script src="{{asset('front2/js/script.js')}}" defer="" crossorigin="anonymous" type="text/javascript"></script>

</body>
</html>