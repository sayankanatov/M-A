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
    <meta property="og:url" content="https://yuristy.kz">
    <link href="https://yuristy.kz" rel="canonical">
    
	<!--
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/component.css">
    -->
    <link rel="stylesheet" href="{{asset('front2/css/full.css')}}">

    <link rel="stylesheet" href="{{asset('front2/css/style.css?v=0.0.8')}}">
    <link rel="stylesheet" href="{{asset('front2/css/media.css?v=0.0.8')}}">

</head>
<body class="home">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ6XV78"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
                                <a href="{{route('main')}}" class="logo" title="logo">
                                    <img src="{{asset('front2/img/logo.png')}}" title="{{asset('front2/img/logo.png')}}" alt="{{asset('front2/img/logo.png')}}">
                                </a>
                            </div>
                            @if($cities)
                            <div class="city_block">
                                @if($city)
                                <div class="city_top">
                                    {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
                                </div>
                                @endif
                                <div class="city_list">
                                    <ul class="menu">
                                        @foreach($cities as $c)
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

        <div class="section_baner">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="baner_h1">
                            {{$h_one ?? $app_h_one}}
                        </h1>
                        <div class="serch_home serch">
                            <form action="{{route('search')}}" id="form-serch" class="serch" method="post">
                                @csrf
                                <input type="hidden" name="city" value="{{$city->alias}}">
                                <select class="js-example-basic-single input-serch" name="search" placeholder="Адвокат / юрист или услуга">
                                    @if($services)
                                    <optgroup label="Юристы">
                                        @foreach($services as $service)
                                        <option value="{{$service->id}}">
                                            {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}
                                        </option>
                                        @endforeach
                                    </optgroup> 
                                    @endif
                                </select>    
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
                            <div class="col-lg-4 col-md-12 banner_item_block-item">
                                <div class="banner_item">
                                    <img src="{{asset('front2/img/court.png')}}" alt="">
                                    <div class="banner_item_block-body">
                                        <div class="banner_menu_title">
                                            Специалисты
                                        </div>
                                        <div class="banner_menu_number">
                                            Всего юристов {{$city->lawyers->count() ?? '538'}}
                                        </div>
                                    </div>
                                    <a href="{{route('lawyers',['city'=>$city->alias])}}">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 banner_item_block-item">
                                <div class="banner_item">
                                    <img src="{{asset('front2/img/law.png')}}" alt="">
                                    <div class="banner_item_block-body">
                                        <div class="banner_menu_title">
                                            Юридические компании
                                        </div>
                                        <div class="banner_menu_number">
                                            Всего компании {{$city->companies->count() ?? '538'}}
                                        </div>
                                    </div>
                                    <a href="{{route('companies',['city'=>$city->alias])}}">Подробнее</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 banner_item_block-item">
                                <div class="banner_item">
                                    <img src="{{asset('front2/img/support.png')}}" alt="">
                                    <div class="banner_item_block-body">
                                        <div class="banner_menu_title">
                                            Нотариусы
                                        </div>
                                        <div class="banner_menu_number">
                                            Всего услуг 0
                                        </div>
                                    </div>
                                    <a href="#">Подробнее</a>
                                </div>
                            </div>
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
                    <div class="col-xl-4 col-lg-6 col-md-12">
                    @foreach($services as $service)
                        <div class="a-special-item-li">
                            <a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
                                <span>{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}</span> ({{App\Models\Lawyer::getByServiceInCity($service->id,$city->id,true)}})
                            </a>
                        </div>
                    @endforeach                   
                    </div>
                </div>
            </div>
        </div>
@endif

        <div class="sectoion sectoion-advantages">
            <div class="section_title section_title-min">
                Мы тщательно отбираем каждого специалиста и совершенно<br> 
                бесплатно помогаем найти лучших юристов, адвокатов и юридические компании
                <br>
                <strong>Три простых шага</strong>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="advan_item">
                            <div class="advan_item-img">
                                <img src="{{asset('front2/img/advan1.png')}}" alt="">
                            </div>
                            <div class="advan_item_title">
                                Выбирите специализацию
                            </div>
                            <div class="advan_item_text">
                                Кратко опишите задачу или
                                юриста, которого вы ищете
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="advan_item">
                            <div class="advan_item-img">
                                <img src="{{asset('front2/img/advan2.png')}}" alt="">
                            </div>
                            <div class="advan_item_title">
                                Мы подберем специалиста
                            </div>
                            <div class="advan_item_text">
                                Наш специалист свяжется 
                                с вами в течение часа 
                                и предложит вариант
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="advan_item">
                            <div class="advan_item-img">
                                <img src="{{asset('front2/img/advan3.png')}}" alt="">
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
        <div class="sectoion sectoion-question">

            <div class="section_title">
                О сервисе Yuristy.kz
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="sectoion-question-text">
                            <div class="question-text-intro text_intro">
                                <p>
                                    Требуется грамотная консультация юриста или адвоката? Хотите решить возникшую проблему цивилизованным способом? Сервис Yuristy.kz – это лучший способ найти квалифицированного юриста, адвоката, юридическую фирму в любой отрасли права, который поможет получить квалифицированную консультацию составить документы, подготовиться к судебному разбирательству или решить проблему до суда. Данный сервис доступен по всему Казахстану. 
                                </p>
                                <p>
                                    На нашей площадке собраны лучшие юристы в сфере семейного, гражданского, земельного, уголовного, корпоративного и других отраслей права. Каждый из юристов имеет высшее образование и опыт судебного представительства.
                                </p>
                            </div>
                            <div class="question-text-full text_full">
                                <p><strong>Здесь вы найдете ответы на следующие вопросы:</strong></p>
                                <ol>
                                    <li>как правильно составить претензию продавцу, договор о купле-продаже, исковое заявление и другие документы;</li>
                                    <li>как правильно инициировать процесс банкротства и обеспечить списание долгов;</li>
                                    <li>какие сроки исковой давности существуют для подачи искового заявления;</li>
                                    <li>как правильно открыть, реорганизовать, ликвидировать организацию;</li>
                                    <li>как разделить имущество в браке или после его расторжения;</li>
                                    <li>как правильно усыновить/удочерить ребенка;</li>
                                    <li>особенности раздела участков земли и определение их границ в соответствии с законодательными нормами.</li>
                                    <li>Получить бесплатную консультацию юриста и адвоката.</li>
                                </ol>
                                <p>Это лишь часть вопросов, интересующих наших пользователей. Хотите узнать еще больше &ndash; просто узнайте обо всех возможностях сайта на практике!</p>
                                <p>Как получить консультацию юриста или адвоката?</p>
                                <p>Получить помощь юриста максимально просто: укажите на сайте нужную отрасль права или название услуги (например, консультация по алиментам, сопровождение в суде или составление претензии). Через несколько секунд вам будут открыты результаты поиска. Вы можете изучить карточку о частных специалистах и компаниях, ознакомиться с перечнем услуг, прайс-листом и отзывами клиентов.</p>
                                <p>После того, как вы подобрали по параметрам подходящего юриста, вы можете просто позвонить ему по телефону и обсудить детали сотрудничества или написать онлайн или в месенджер вотсап.</p>
                                <p>Затем специалист поможет вам как можно быстрее решить вопросы. Бесплатные и платные консультации по телефону или онлайн, личный прием, подготовка процессуальных документов &ndash; все это открыто с помощью нашего сервиса.</p>
                                <p>У нас представлены юридические фирмы, адвокатские конторы или частные юристы, которые предоставляют бесплатные консультации, а также платные услуги. Сервис абсолютно бесплатен для физических лиц.</p>
                                <p>Сервис предусматривает удобные формы взаимодействия. Если вы не хотите звонить сами, просто оставьте контактные данные: адвокат перезвонит вам в ближайшее время.</p>
                                <p>Правила регистрации для юристов или юридических фирм</p>
                                <p>Портал сотрудничает не только с теми кому необходима помощь, но и с теми, кто занимается оказанием юридической помощи. На сайте вы можете выложить информацию о себе, указать профессиональные навыки и стоимость работы. Это отличный способ найти новых клиентов, получить положительные рекомендации, улучшить имидж.</p>
                                <p>Для регистрации укажите ваш статус, основную специализацию, данные о образовании и опыте работы по специальности. Если есть возможность, дополните анкету ссылками на примеры выигранных дел, судебную практику. Мы тщательно проверяем каждую анкету, поэтому рекомендуем публиковать только достоверные данные о себе.</p>
                                <p>После того, как вы подтвердили информацию о себе, указали контактные данные, вы будете получать первые отклики.</p>
                                <p><strong>Преимущества Yuristy.kz</strong></p>
                                <p>Приведем достоинства нашего ресурса:</p>
                                <ol>
                                    <li>Площадка будет полезна как обычным гражданам, которым нужно оказать юридическую помощь, так и профессиональным юристам, с желанием регулярно получать разнообразные дела по своей сфере.</li>
                                    <li>Здесь можно найти грамотного специалиста по юриспруденции всего за несколько минут. Мы гарантируем компетентность и безупречную репутацию адвокатов.</li>
                                    <li>Вы можете проконсультироваться со специалистом и решить вопрос без дорогостоящего юридического сопровождения. Многие юристы и фирмы оказывают бесплатную юридическую кансультацию.</li>
                                    <li>Простой интерфейс и удобство использования.</li>
                                    <li>Широкий спектр услуг, оказываемые правоведами.</li>
                                </ol>
                                <p>Таким образом, Yuristy.kz делает доступной квалифицированную юридическую помощь для каждого человека, помогает выиграть спор в суде или прийти к досудебному соглашению, выгодному для сторон. Мы подобрали для вас лучших правоведов, они с блеском справляются даже с нестандартными ситуациями.</p>
                            </div>
                            <div class="sectoion-question-linck text_linck">
                                <a>Подробнее...</a>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>


    @include('includes.footer') 

    </div>
    
    @include('includes.form-login')  
    @include('includes.form-register')

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