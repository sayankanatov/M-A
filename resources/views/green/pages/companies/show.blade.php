@extends('green.layouts.main')

@section('content')
    <!-- Форма -->
    @include('green.includes.search-form')
    <!--Юр. компания в Нур-Султане (Астана) -->
    <div class="title">
        <div class="container">
            <div class="head">
                <div class="row">
                    <div class="col-sm">
                        <a href="{{route('main')}}">Главная</a>
                        <span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}"
                                                    alt="Стрелка"></span>
                        <a href="{{route('companies',['city' =>$city->alias])}}">Компании</a>
                        <span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}"
                                                    alt="Стрелка"></span>
                        <span class="head_special">{{$company->name}}</span>
                    </div>
                    <h1 class="law_name">{{$company->name}}</h1>
                    <div class="law_solo">
                        <div class="law_main">
                            <a href="#" class="law_photo-link law_solo_img-link">
                                <img
                                    src="{{$company->logo ? '/'.$company->logo : asset('front3/image/4. Compani/0.svg')}}"
                                    alt="Фото" class="photo">
                            </a>
                            <div class="inner_mobile">
                            @auth
                                <!--КНОПКА ОСТАВИТЬ ОТЗЫВ START-->
                                    <div class="profile_btn">
                                        <a href="#win{{$company->id}}">
                                            <button>Оставить отзыв</button>
                                        </a>
                                    </div>
                                    <!--КНОПКА ОСТАВИТЬ ОТЗЫВ END-->
                                @endauth
                                <div class="law_revs">
                                    <img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Иконка отзывы"
                                         class="law_revs-icon">
                                    <a href="#"><span
                                            class="law_revs-text">{{$company->feedbacks()->count()}} отзывов</span></a>
                                </div>
                                <div class="rev_stars">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <span>{{$company->rating ?? '0.0'}}</span>
                                </div>
{{--                                <a href="#"--}}
{{--                                   class="law_name-mobile-link">--}}
{{--                                    <div class="law_name">{{$company->name}}</div>--}}
{{--                                </a>--}}
                            </div>
                        </div>
                        <div class="law_info">
                            <div class="law_solo_head">
{{--                                <a href="#"--}}
{{--                                   class="law_name-link law_solo_name-link">--}}
{{--                                    <h1 class="law_name">{{$company->name}}</h1>--}}
{{--                                </a>--}}
                                <div class="law_revs">
                                    <img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Иконка отзывы"
                                         class="law_revs-icon">
                                    <a href="#"><span
                                            class="law_revs-text">{{$company->feedbacks()->count()}} отзывов</span></a>
                                </div>
                                <div class="rev_stars">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <img class="r_star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}"
                                         alt="Звезда">
                                    <span>{{$company->rating ?? '0.0'}}</span>
                                </div>
                            @auth
                                <!--КНОПКА ОСТАВИТЬ ОТЗЫВ START-->
                                    <div class="profile_btn">
                                        <a href="#win{{$company->id}}">
                                            <button>Оставить отзыв</button>
                                        </a>
                                    </div>
                                    <!--КНОПКА ОСТАВИТЬ ОТЗЫВ END-->
                                @endauth
                            </div>
                            <div class="law_specs">
                                <div class="law_head">
                                    <img src="{{asset('front3/image/Lawyers/icon/icon4.svg')}}" alt="Иконка"
                                         class="law_spec-img">
                                    <span class="spec_title">Специализация: </span>
                                    <a href="#"></a>
                                </div>
                                <div class="spec-list">
                                    @foreach($company->services as $service)
                                        <a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
                                            <span class="spec">{{$service->name_ru}}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="law_address">
                                <img src="{{asset('front3/image/Lawyers/icon/icon3.svg')}}" alt="Иконка"
                                     class="law_spec-img">
                                <span class="spec_title">{{app()->getLocale() == 'ru' ? $company->city->name_ru : $company->city->name_kz}}, {{$company->address}}</span>
                            </div>
                            <div class="law_graphics">
                                <div class="graph_head">
                                    <img src="{{asset('front3/image/Lawyers/icon/icon2.svg')}}" alt="Иконка"
                                         class="law_spec-img">
                                    <div class="graph_text">
                                        <span class="spec_title">График работы:</span>
                                        <span class="time">{{$company->timetext}}</span>
                                    </div>
                                </div>
                                <div class="week">
                                    <span
                                        class="{{$company->monday == 1 ? 'weekdays' : 'output'}}">пн</span>
                                    <span
                                        class="{{$company->tuesday == 1 ? 'weekdays' : 'output'}}">вт</span>
                                    <span class="{{$company->wednesday == 1 ? 'weekdays' : 'output'}}">ср</span>
                                    <span
                                        class="{{$company->thursday == 1 ? 'weekdays' : 'output'}}">чт</span>
                                    <span
                                        class="{{$company->friday == 1 ? 'weekdays' : 'output'}}">пт</span>
                                    <span
                                        class="{{$company->saturday == 1 ? 'weekdays' : 'output'}}">сб</span>
                                    <span
                                        class="{{$company->sunday == 1 ? 'weekdays' : 'output'}}">вс</span>
                                    <br>
                                </div>
                            </div>
                            @include('green.includes.share')
                        </div>
                        <div class="law_contacts">
                            <div class="ph_plus_wa">
                                <div class="phone">
                                    <a href="tel:{{$company->telephone}}" class="phone_link">
                                        <span class="hide-tail">{{$company->telephone}}</span>
                                    </a>
                                    <a href="#" class="click-tel">Показать</a>
                                </div>
                                <div class="WhatsApp_block">
                                    <a href="#" class="wa_icon"><img class="wa_icon"
                                                                     src="{{asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')}}"
                                                                     alt="Wa_icon"></a>
                                    <a rel="nofollow" target="_blank"
                                       href="https://api.whatsapp.com/send?phone={{$company->telephone}}&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D1%8F%20%D1%81%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0%20Yuristy.kz.%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BD%D1%81%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%86%D0%B8%D1%8E."
                                       class="wa_text">WhatsApp</a>
                                </div>
                            </div>
                            <div class="consultation {{$company->is_free ? 'c_yes' : 'c_no'}}">
                                <div class="cons">Бесплатная консультация:</div>
                                <div
                                    class="{{$company->is_free ? 'yes' : 'no'}}">{{$company->is_free ? 'Есть' : 'Нет'}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- О Компании-->
    <div class="about">
        <div class="container">
            <div class="about_title">
                О компании
            </div>
            <div class="row">
                <div class="col-sm-11">
                    <div class="about_text">{!!$company->extra!!}</div>
                </div>
            </div>
            <div class="about_title">
                Предоставляемые услуги:
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="about_text">
						<span>
						@foreach($company->services as $service)
                                <div>{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}</div>
                            @endforeach
						</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Отзывы  -->
    @if($company->feedbacks())
        <div class="review">
            <div class="container">
                <div class="review_title">
                    <h4>Отзывы <a href="#">({{$company->feedbacks()->count()}})</a></h4>
                </div>

                @foreach($company->feedbacks as $feedback)
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="review_users">
                                <div class="review_name">{{$feedback->user->name ?? 'Неизвестный пользователь'}}
                                    <span>
					@for($i=1;$i <= $feedback->stars;$i++)
                                            <img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star">
                                        @endfor
					</span>
                                </div>
                                <div class="review_date">{{$feedback->created_at}}</div>
                                <div class="review_text">{!!$feedback->text!!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="row">
                    <div class="col-sm-11">
                        <div class="lawyer_btn">
                            <img src="image/2. Main/Arrows.svg" alt="Стрелки">
                            <button>Показать больше</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    @endif
    <!-- Похожие Компании -->
    @if($relative_lawyers)
        <div class="similar">
            <div class="container">
                <div class="similar_title">
                    <h4>Похожие компании</h4>
                </div>
                <div class="similar_slider">

                    @foreach($relative_lawyers as $rel_lawyer)
                        <div class="similar_block">
                            <div class="similar_image">
                                <img
                                    src="{{$rel_lawyer->logo ? '/'.$rel_lawyer->logo : asset('front3/image/4. Compani/0.svg')}}"
                                    alt="Photo" class="photo">
                            </div>
                            <div class="similar_name"><a
                                    href="{{route('company',['city' => $city->alias,'alias' => $rel_lawyer->alias])}}">{{$rel_lawyer->name}}</a>
                            </div>
                            <div class="similar_star">
                                <img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star">
                                <img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star">
                                <img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star">
                                <img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star">
                                <img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star">
                                <span>{{$rel_lawyer->rating ?? '0.0'}}</span></div>
                            <div class="similar_review">
                                <span><img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Star"></span>
                                <span>{{$rel_lawyer->feedbacks()->count()}} отзывов</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

    @auth
        <!--FEEDBACK MODAL WINDOW START-->
        @include('green.includes.feedback')
        <!--FEEDBACK MODAL WINDOW END-->
    @endauth

@endsection
