@foreach($companies as $company)
    <div class="law company">
        <div class="law_main">
            <a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}" class="law_photo-link">
                <img
                    src="{{$company->logo ? '/'.$company->logo : asset('front3/image/4. Compani/0.svg')}}"
                    alt="Фото" class="photo">
            </a>
            <div class="inner_mobile">
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
                <a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}"
                   class="law_name-mobile-link">
                    <div class="law_name">{{$company->name}}</div>
                </a>
            </div>
        </div>
        <div class="law_info">
            <a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}"
               class="law_name-link">
                <div class="law_name">{{$company->name}}</div>
            </a>
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
                    <span class="{{$company->monday == 1 ? 'weekdays' : 'output'}}">пн</span>
                    <span class="{{$company->tuesday == 1 ? 'weekdays' : 'output'}}">вт</span>
                    <span class="{{$company->wednesday == 1 ? 'weekdays' : 'output'}}">ср</span>
                    <span class="{{$company->thursday == 1 ? 'weekdays' : 'output'}}">чт</span>
                    <span class="{{$company->friday == 1 ? 'weekdays' : 'output'}}">пт</span>
                    <span class="{{$company->saturday == 1 ? 'weekdays' : 'output'}}">сб</span>
                    <span class="{{$company->sunday == 1 ? 'weekdays' : 'output'}}">вс</span>
                    <br>
                </div>
            </div>
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
@endforeach
