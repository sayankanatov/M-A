@extends('green.layouts.main')

@section('content')
    <!-- Форма -->
    @include('green.includes.search-form')
    <!--Юристы и адвокаты в Нур-Султане (Астана) -->
    <div class="title">
        <div class="container">
            <div class="head">
                <div class="row">
                    <div class="col-sm">
                        <a href="{{route('main')}}">Главная</a>
                        <span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}"
                                                    alt="Стрелка"></span>
                        <a href="{{route('lawyers',['city' =>$city->alias])}}">Специалисты</a>
                        <span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}"
                                                    alt="Стрелка"></span>
                        <span class="head_special">{{$lawyer->fullname($lawyer->id)}}</span>
                    </div>
                    <div class="law_solo">
                        <div class="law_main">
                            <a href="yurist.html" class="law_photo-link">
                                <img
                                    src="{{$lawyer->image ? '/'.$lawyer->image : asset('front3/image/Lawyers/Empty.png')}}"
                                    alt="Фото" class="photo">
                            </a>
                            <div class="inner_mobile">
                                <div class="law_revs">
                                    <img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Иконка отзывы"
                                         class="law_revs-icon">
                                    <a href="#"><span
                                            class="law_revs-text">{{$lawyer->feedbacks->count()}} отзывов</span></a>
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
                                    <span>5.0</span>
                                </div>
                                <a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}"
                                   class="law_name-mobile-link">
                                    <div class="law_name">{{$lawyer->fullname($lawyer->id)}}</div>
                                </a>
                            </div>
                        </div>
                        <div class="law_info">
                            <div class="law_solo_head">
                                <a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}"
                                   class="law_name-link">
                                    <h1 class="law_name">{{$lawyer->fullname($lawyer->id)}}</h1>
                                </a>
                                <div class="law_revs">
                                    <img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Иконка отзывы"
                                         class="law_revs-icon">
                                    <a href="#"><span
                                            class="law_revs-text">{{$lawyer->feedbacks->count()}} отзывов</span></a>
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
                                    <span>5.0</span>
                                </div>
                            @auth
                                <!--КНОПКА ОСТАВИТЬ ОТЗЫВ START-->
                                    <div class="profile_btn">
                                        <a href="#win{{ $lawyer->id }}">
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
                                    @foreach($lawyer->services as $service)
                                        <a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
                                            <span class="spec">{{$service->name_ru}}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="law_address">
                                <img src="{{asset('front3/image/Lawyers/icon/icon3.svg')}}" alt="Иконка"
                                     class="law_spec-img">
                                <span class="spec_title">{{$lawyer->address}}</span>
                            </div>
                            <div class="law_graphics">
                                <div class="graph_head">
                                    <img src="{{asset('front3/image/Lawyers/icon/icon2.svg')}}" alt="Иконка"
                                         class="law_spec-img">
                                    <div class="graph_text">
                                        <span class="spec_title">График работы:</span>
                                        <span class="time">{{$lawyer->timetext}}</span>
                                    </div>
                                </div>
                                <div class="week">
                                    <span class="{{$lawyer->monday == 1 ? 'weekdays' : 'output'}}">ПН</span>
                                    <span class="{{$lawyer->tuesday == 1 ? 'weekdays' : 'output'}}">ВТ</span>
                                    <span class="{{$lawyer->wednesday == 1 ? 'weekdays' : 'output'}}">СР</span>
                                    <span class="{{$lawyer->thursday == 1 ? 'weekdays' : 'output'}}">ЧТ</span>
                                    <span class="{{$lawyer->friday == 1 ? 'weekdays' : 'output'}}">ПТ</span>
                                    <span class="{{$lawyer->saturday == 1 ? 'weekdays' : 'output'}}">СБ</span>
                                    <span class="{{$lawyer->sunday == 1 ? 'weekdays' : 'output'}}">ВС</span></div>
                                <br>

                            </div>
                            @include('green.includes.share')
                        </div>
                        <div class="law_contacts">
                            <div class="ph_plus_wa">
                                <div class="phone">
                                    <a href="tel:{{$lawyer->telephone}}" class="phone_link">
                                        <span class="hide-tail">{{$lawyer->telephone}}</span>
                                    </a>
                                    <a href="#" class="click-tel">Показать</a>
                                </div>
                                <div class="WhatsApp_block">
                                    <a href="#" class="wa_icon"><img class="wa_icon"
                                                                     src="{{asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')}}"
                                                                     alt="Wa_icon"></a>
                                    <a rel="nofollow" target="_blank"
                                       href="https://api.whatsapp.com/send?phone={{$lawyer->telephone}}&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D1%8F%20%D1%81%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0%20Yuristy.kz.%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BD%D1%81%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%86%D0%B8%D1%8E."
                                       class="wa_text">WhatsApp</a>
                                </div>
                            </div>
                            <div class="consultation {{$lawyer->is_free ? 'c_yes' : 'c_no'}}">
                                <div class="cons">Бесплатная консультация:</div>
                                <div
                                    class="{{$lawyer->is_free ? 'yes' : 'no'}}">{{$lawyer->is_free ? 'Есть' : 'Нет'}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- О специалисте-->
    <div class="about">
        <div class="container">
            <div class="about_title">
                О специалисте
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="about_text">{!!$lawyer->extra!!}</div>
                </div>
            </div>
            <div class="about_title">
                Опыт работы:
            </div>
            <div class="row">
                <div class="col-sm-11">
                    <div class="about_text">{{$lawyer->work_experience}}</div>
                </div>
            </div>
            <div class="about_title">
                Образование:
            </div>
            <div class="row">
                <div class="col-sm-11">
                    <div class="about_text">{{$lawyer->education}}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Отзывы  -->

    @if($lawyer->feedbacks())
        <div class="review">
            <div class="container">
                <div class="review_title">
                    <h4>Отзывы <a href="#">({{$lawyer->feedbacks()->count()}})</a></h4>
                </div>

                @foreach($lawyer->feedbacks as $feedback)
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

    @if($relative_lawyers)
        <!-- Похожие юристы -->
        <div class="similar">
            <div class="container">
                <div class="similar_title">
                    <h4>Похожие юристы</h4>
                </div>
                <div class="similar_slider">

                    @foreach($relative_lawyers as $rel_lawyer)
                        <div class="similar_block">
                            <div class="similar_image">
                                <img
                                    src="{{$rel_lawyer->image ? '/'.$rel_lawyer->image : asset('front3/image/Lawyers/Empty.png')}}"
                                    alt="Photo" class="photo">
                            </div>
                            <div class="similar_name"><a
                                    href="{{route('lawyer',['city' => $city->alias,'alias' => $rel_lawyer->alias])}}">{{$rel_lawyer->last_name.' '.$rel_lawyer->first_name.' '.$rel_lawyer->patronymic}}</a>
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
