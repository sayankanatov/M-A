@if(isset($result))
@foreach($lawyers as $lawyer)
@else
@foreach(App\Models\Lawyer::where('city_id',$city->id)->where('is_deleted',0)->get() as $lawyer)
@endif
    <div class="law">
        <div class="law_main">
            <a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}" class="law_photo-link">
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
            <a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}"
               class="law_name-link">
                <div class="law_name">{{$lawyer->fullname($lawyer->id)}}</div>
            </a>
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
@endforeach
