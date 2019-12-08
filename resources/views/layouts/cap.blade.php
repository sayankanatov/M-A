<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(env('APP_NAME') == 'Test')
    <meta name="robots" content="noindex, nofollow" />
    @endif
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    
    <title>Бесплатный сервис по поиску адвокатов/юристов по всему Казахстану</title>
    
    <meta name="yandex-verification" content="7c8e5ee6bac958f1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('cap/style/style.css')}}">
</head>
<body class="home">
    
    <header>
        <div class="container">
            <div class="row justify-content-between">
                <div class="header_left">
                    <div class="logo">
                        <a href="{{route('main')}}">
                            <img src="{{asset('cap/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="section_baner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="baner_h1">
                        Сайт находится в разработке
                    </h1>
                    <h4 class="baner_h4">
                        Сайт начнет свою работу через:
                    </h4>
                    <div class="timer">
                        <script src="https://megatimer.ru/get/407e01911049e11af026adb0d6cb7f1a.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>