<!DOCTYPE html>
<html lang="ru">
<head>
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

    <title>{{"Личный кабинет"}}</title>
    <meta name="description" content="{{"Личный кабинет"}}">
    <meta name="keywords" content="{{"Личный кабинет"}}">

    <meta property="og:site_name" content="Yuristy.kz">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:title" content="{{"Личный кабинет"}}">
    <meta property="og:description" content="{{"Личный кабинет"}}">
    <meta property="og:image" content="{{asset('front2/img/logo.jpg')}}">
    <meta property="og:url" content="{{Request::url()}}">
    <link href="{{Request::url()}}" rel="canonical">

    <link rel="preload" href="{{asset('front2/fonts/FuturaPT-Light.woff')}}" as="font">
    <link rel="preload" href="{{asset('front2/fonts/FuturaPT-Medium.woff')}}" as="font">
    <link rel="preload" href="{{asset('front2/fonts/FuturaPT-Bold.woff')}}" as="font">
    <link rel="preload" href="{{asset('front2/fonts/FuturaPT-Book.woff')}}" as="font">

    <link rel="stylesheet" href="{{asset('front2/css/full.css')}}">

    <link rel="stylesheet" href="{{asset('front2/css/style.css?v=0.0.8')}}">
    <link rel="stylesheet" href="{{asset('front2/css/media.css?v=0.0.8')}}">

</head>
<body class="page page-profile">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ6XV78"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

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