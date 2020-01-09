@extends('layouts.category')

@section('content')

<div class="content">
    <div class="content-top">
                <div class="container">

                    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                            <a itemprop="item" href="{{route('main')}}">
                                <span itemprop="name">Главная</span>
                                <meta itemprop="position" content="1">
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a itemprop="item" href="{{route('companies',['city' =>$city->alias])}}">
                                <span itemprop="name">Компании</span>
                                <meta itemprop="position" content="2">
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a itemprop="item">
                                <span itemprop="name">{{$company->name}}</span>
                                <meta itemprop="position" content="3">
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>


            <div class="content-bottom" itemscope="" itemtype="http://schema.org/LegalService">

                <div class="container">
                    <div class="page_content-top">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="content_item-left">
                                    <div class="content_item_img">
                                        <img itemprop="image" src="{{asset('front2/img/company-item.png')}}" alt="">
                                    </div>
                                    <div class="content_item_reviews">
                                        <div class="content_item_rev-linck">
                                            <a href="/">12 Отзывов</a>
                                        </div>
                                        <div class="content_item_rev-assessment">
                                            9.1
                                        </div>
                                    </div>

                                    <div class="rating">
                                        <input type="radio" name="rating-star" class="rating__control" id="rc1">
                                        <input type="radio" name="rating-star" class="rating__control" id="rc2">
                                        <input type="radio" name="rating-star" class="rating__control" id="rc3">
                                        <input type="radio" name="rating-star" class="rating__control" id="rc4">
                                        <input type="radio" name="rating-star" class="rating__control" id="rc5">
                                        <label for="rc1" class="rating__item">
                                            <svg class="rating__star">
                                            <use xlink:href="#star"></use>
                                            </svg>
                                            <span class="rating__label">1</span>
                                        </label>
                                        <label for="rc2" class="rating__item">
                                            <svg class="rating__star">
                                            <use xlink:href="#star"></use>
                                            </svg>
                                            <span class="rating__label">2</span>
                                        </label>
                                        <label for="rc3" class="rating__item">
                                            <svg class="rating__star">
                                            <use xlink:href="#star"></use>
                                            </svg>
                                            <span class="rating__label">3</span>
                                        </label>
                                        <label for="rc4" class="rating__item">
                                            <svg class="rating__star">
                                            <use xlink:href="#star"></use>
                                            </svg>
                                            <span class="rating__label">4</span>
                                        </label>
                                        <label for="rc5" class="rating__item">
                                            <svg class="rating__star">
                                            <use xlink:href="#star"></use>
                                            </svg>
                                            <span class="rating__label">5</span>
                                        </label>    
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                                        <symbol id="star" viewBox="0 0 26 28">
                                            <path d="M26 10.109c0 .281-.203.547-.406.75l-5.672 5.531 1.344 7.812c.016.109.016.203.016.313 0 .406-.187.781-.641.781a1.27 1.27 0 0 1-.625-.187L13 21.422l-7.016 3.687c-.203.109-.406.187-.625.187-.453 0-.656-.375-.656-.781 0-.109.016-.203.031-.313l1.344-7.812L.39 10.859c-.187-.203-.391-.469-.391-.75 0-.469.484-.656.875-.719l7.844-1.141 3.516-7.109c.141-.297.406-.641.766-.641s.625.344.766.641l3.516 7.109 7.844 1.141c.375.063.875.25.875.719z"/>
                                        </symbol>
                                    </svg>
                                    
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">

                                    <div class="col-xl-12">
                                        <div class="content_item-info">
                                            <h1 class="content_item-title" itemprop="name">
                                                {{$company->name}}
                                            </h1>
                                            <div class="content_item_ul">

                                                <div class="content_item_li content_item_li-right-active">
                                                    <strong class="content_item_li-left">
                                                        Специализация:  
                                                    </strong>
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
                                                        {{$service->name_ru.','}}
                                                    </a>

                                                    @endif

                                                    @php
                                                        $i++;
                                                    @endphp

                                                @endforeach
                                                </div>
                                                
                                                <div class="content_item_li">
                                                    <strong class="content_item_li-left">
                                                        Бесплатная консультация:
                                                    </strong>
                                                    {{$company->is_free ? 'Есть' : 'Нет'}}
                                                </div>
                                                {{-- <div class="content_item_li">
                                                    <strong class="content_item_li-left">
                                                        Стоимость услуг:
                                                    </strong>
                                                    {{$company->price}}
                                                </div> --}}
                                                <div class="content_item_li">
                                                    <strong class="content_item_li-left content_item_li-image">
                                                        <img src="{{asset('front2/img/adres-icon.png')}}" alt="">
                                                    </strong>
                                                    <span itemscope="" itemprop="address" itemtype="http://schema.org/PostalAddress">
                                                        <span itemprop="AddressLocality">{{app()->getLocale() == 'ru' ? $company->city->name_ru : $company->city->name_kz}}</span>,
                                                        <span itemprop="streetAddress">{{$company->address}}</span>
                                                    </span>
                                                </div>
                                                <div class="content_item_li">
                                                    <strong class="content_item_li-left">
                                                        График работы:  
                                                    </strong>
                                                    <span class="schedule_block_info">
                                                        <span class="schedule_block">
                                                            <span class="schedule_item {{$company->monday == 1 ? '' : 'schedule_item-off'}}">
                                                                пн
                                                            </span>
                                                            <span class="schedule_item {{$company->tuesday == 1 ? '' : 'schedule_item-off'}}">
                                                                вт
                                                            </span>
                                                            <span class="schedule_item {{$company->wednesday == 1 ? '' : 'schedule_item-off'}}">
                                                                ср
                                                            </span>
                                                            <span class="schedule_item {{$company->thursday == 1 ? '' : 'schedule_item-off'}}">
                                                                чт
                                                            </span>
                                                            <span class="schedule_item {{$company->friday == 1 ? '' : 'schedule_item-off'}}">
                                                                пт
                                                            </span>
                                                            <span class="schedule_item {{$company->saturday == 1 ? '' : 'schedule_item-off'}}">
                                                                сб
                                                            </span>
                                                            <span class="schedule_item {{$company->sunday == 1 ? '' : 'schedule_item-off'}}">
                                                                вс
                                                            </span>
                                                        </span>
                                                        {{$company->timetext}}
                                                    </span>
                                                </div>
                                                

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="content_item_right page_content_item_right">
                                            <a class="content_item-phone"><span class="num_hide">{{$company->telephone}}</span> <span class="sh_nmr">Показать</span></a>
                                            <a class="content_item-connect" rel="nofollow" target="_blank" href="https://api.whatsapp.com/send?phone=77773080833&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D1%8F%20%D1%81%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0%20Yuristy.kz.%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BD%D1%81%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%86%D0%B8%D1%8E.">WhatsApp</a>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="page_content-bottom">

                        <div class="page_info-block">
                            <div class="page_info-top">
                                О компании
                            </div>
                            <div class="page_info-desc">
                                {!!$company->extra!!}
                            </div>
                        </div>
                        <div class="page_info-block">
                            <div class="page_info-top">
                                Предоставляемые услуги
                            </div>
                            <div class="page_info-desc">
                                <ul>
                                @foreach($company->services as $service)
                                    <li>
                                    {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- <div class="page_info-block">
                            <div class="page_info-top page_info-top-litle">
                                Опыт работы:
                            </div>
                            <div class="page_info-desc">
                                <div class="page_info-desc-item">
                                    <strong>Директор</strong><br/>
                                    ООО Центр медиации и права «Де-юре» <br>
                                    2013 — до настоящего момента.
                                </div>
                                <div class="page_info-desc-item">
                                    <strong>Начальник отдела правового сопровождения Управления земельных ресурсов</strong><br/>
                                    Мэрия городского округа Тольятти <br>
                                    2002 — 2012
                                </div>
                            </div>
                        </div>
                        <div class="page_info-block">
                            <div class="page_info-top page_info-top-litle">
                                Образование:
                            </div>
                            <div class="page_info-desc">
                                <div class="page_info-desc-item">
                                    <strong>АНО «Центр медиации и права»</strong><br/>
                                    Медиация<br>
                                    2013 — 2014
                                </div>
                                <div class="page_info-desc-item">
                                    <strong>Волжский университет им. Татищева</strong><br/>
                                    Специалитет гражданско-правовая и арбитраж <br>
                                    2002 — 2003
                                </div>
                                <div class="page_info-desc-item">
                                    <strong>Современный гуманитарный университет</strong><br/>
                                    Гражданско-правовая <br>
                                    1997 — 2001
                                </div>
                            </div>
                        </div>
                        <div class="page_info-block">
                            <div class="page_info-top">
                                Отзывы
                            </div>
                            <div class="reviews-block-2">
                                <div class="page_info-desc reviews-block">
                                    
                                    <div class="reviews-item">
                                        <div class="row">
                                            
                                            <div class="col-sm-9">
                                                <div class="reviews-item-text">
                                                    DD зарекомендовала себя надёжным деловым партнёром, обладающим большим потенциалом для решения практически любых задач 
                                                    во внешнеэкономической деятельности. Хочется отметить профессионализм и внимательное отношение, творческий подход 
                                                    и принятие оптимальных решений в нештатных ситуациях. 
                                                    Рассчитываю на дальнейшее плодотворное сотрудничество. 
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="reviews-item-autor-img">
                                                    <img src="{{asset('front2/img/spec-item.png')}}" alt="">
                                                </div>
                                                <div class="reviews-item-autor-title">
                                                    Евгения Купрюшина
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="reviews-item">
                                        <div class="row">
                                            
                                            <div class="col-sm-9">
                                                <div class="reviews-item-text">
                                                    DD зарекомендовала себя надёжным деловым партнёром, обладающим большим потенциалом для решения практически любых задач 
                                                    во внешнеэкономической деятельности. Хочется отметить профессионализм и внимательное отношение, творческий подход 
                                                    и принятие оптимальных решений в нештатных ситуациях. 
                                                    Рассчитываю на дальнейшее плодотворное сотрудничество. 
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="reviews-item-autor-img">
                                                    <img src="{{asset('front2/img/spec-item.png')}}" alt="">
                                                </div>
                                                <div class="reviews-item-autor-title">
                                                    Евгения Купрюшина
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="reviews-item">
                                        <div class="row">
                                            
                                            <div class="col-sm-9">
                                                <div class="reviews-item-text">
                                                    DD зарекомендовала себя надёжным деловым партнёром, обладающим большим потенциалом для решения практически любых задач 
                                                    во внешнеэкономической деятельности. Хочется отметить профессионализм и внимательное отношение, творческий подход 
                                                    и принятие оптимальных решений в нештатных ситуациях. 
                                                    Рассчитываю на дальнейшее плодотворное сотрудничество. 
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="reviews-item-autor-img">
                                                    <img src="{{asset('front2/img/spec-item.png')}}" alt="">
                                                </div>
                                                <div class="reviews-item-autor-title">
                                                    Евгения Купрюшина
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="content_item_right page_content_item_right">
                                <a class="reviews-connect md-trigger" data-modal="formreviews">Оставить отзыв</a>
                            </div>
                        </div> --}}

                        {{-- <div class="page_info-block">
                            <div class="page_info-top">
                                Похожие компании
                            </div>
                            <div class="page_info-desc">

                                <div class="similar_slider similar_slider-container swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="similar_slider-item">
                                                <a href="/" class="similar_slider-item-linck">Подробнее</a>
                                                <div class="similar_slider_img">
                                                    <img src="{{asset('front2/img/company-item.png')}}" alt="">
                                                </div>
                                                <div class="similar_slider_info">
                                                    <div class="similar_slider_title">
                                                        Степанова Елена Анатольевна
                                                    </div>
                                                    <div class="similar_slider_spec">
                                                        Арбитраж и еще одна специализация
                                                    </div>
                                                    <div class="similar_slider_price">
                                                        Консультация от 10000 тг.
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="similar_slider-item">
                                                <a href="/" class="similar_slider-item-linck">Подробнее</a>
                                                <div class="similar_slider_img">
                                                    <img src="{{asset('front2/img/company-item.png')}}" alt="">
                                                </div>
                                                <div class="similar_slider_info">
                                                    <div class="similar_slider_title">
                                                        Степанова Елена Анатольевна
                                                    </div>
                                                    <div class="similar_slider_spec">
                                                        Арбитраж и еще одна специализация
                                                    </div>
                                                    <div class="similar_slider_price">
                                                        Консультация от 10000 тг.
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="similar_slider-item">
                                                <a href="/" class="similar_slider-item-linck">Подробнее</a>
                                                <div class="similar_slider_img">
                                                    <img src="{{asset('front2/img/company-item.png')}}" alt="">
                                                </div>
                                                <div class="similar_slider_info">
                                                    <div class="similar_slider_title">
                                                        Степанова Елена Анатольевна
                                                    </div>
                                                    <div class="similar_slider_spec">
                                                        Арбитраж и еще одна специализация
                                                    </div>
                                                    <div class="similar_slider_price">
                                                        Консультация от 10000 тг.
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="similar_slider-item">
                                                <a href="/" class="similar_slider-item-linck">Подробнее</a>
                                                <div class="similar_slider_img">
                                                    <img src="{{asset('front2/img/company-item.png')}}" alt="">
                                                </div>
                                                <div class="similar_slider_info">
                                                    <div class="similar_slider_title">
                                                        Степанова Елена Анатольевна
                                                    </div>
                                                    <div class="similar_slider_spec">
                                                        Арбитраж и еще одна специализация
                                                    </div>
                                                    <div class="similar_slider_price">
                                                        Консультация от 10000 тг.
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="similar_slider-pagination"></div>
                                </div>
                               
                            </div>
                        </div> --}}


                    </div>
                </div>
                
            </div>


        </div>

@endsection