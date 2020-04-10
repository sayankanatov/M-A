@foreach($lawyers as $lawyer)
<div class="lowers_mobile card">
	<div class="row">
		<div class="col-md-4 col-6">
			<div class="lawyers_photo">
				<a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}"><img src="{{$lawyer->image ? '/'.$lawyer->image : asset('front3/image/Lawyers/Empty.png')}}" alt="photo"></a>
			</div>
		</div>
		<div class="col-md-6 col-6">
			<div class="lawyers_name">
				<a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}">{{$lawyer->fullname($lawyer->id)}}</a>
			</div>
			<div class="lawyers_stars">
				<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
				<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
				<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
				<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
				<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
				<span>0.0</span>
			</div>
			<div class="lawyers_rewyes">
				<img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="rewyes">
				<a href="#"><span class="rewyes_text">{{$lawyer->feedbacks->count()}} отзывов</span></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="lawyers_specialization">
				<img src="{{asset('front3/image/Lawyers/icon/icon4.svg')}}" alt="Icon">
				Специализация:
			</div>
		</div>
		<div class="col-12">
			<div class="lawyers_uslugi">
				@foreach($lawyer->services as $service)               
                <span class="spec">
                	<a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">{{$service->name_ru}}</a>
                </span>
                @endforeach
			</div>
		</div>
		<div class="col-12">
			<div class="lawyers_adress">
				<img src="{{asset('front3/image/Lawyers/icon/icon3.svg')}}" alt="Icon">
				{{$lawyer->address}}
			</div>
		</div>
		<div class="col-12">
			<div class="lawyers_graphick">
				<img src="{{asset('front3/image/Lawyers/icon/icon2.svg')}}" alt="Icon">
				График работы: <span>{{$lawyer->timetext}}</span>
				<div class="lawyers_week">
					<span class="{{$lawyer->monday == 1 ? 'weekdays' : 'output'}}">ПН</span>
					<span class="{{$lawyer->tuesday == 1 ? 'weekdays' : 'output'}}">ВТ</span>
					<span class="{{$lawyer->wednesday == 1 ? 'weekdays' : 'output'}}">СР</span>
					<span class="{{$lawyer->thursday == 1 ? 'weekdays' : 'output'}}">ЧТ</span>
					<span class="{{$lawyer->friday == 1 ? 'weekdays' : 'output'}}">ПТ</span>
					<span class="{{$lawyer->saturday == 1 ? 'weekdays' : 'output'}}">СБ</span>
					<span class="{{$lawyer->sunday == 1 ? 'weekdays' : 'output'}}">ВС</span>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-12">
			<div class="lawyers_consultation">
				<div class="yes">
					Бесплатная консультация:
					<span>
						<img src="{{asset('front3/image/Lawyers/icon/Cons_galka.svg')}}" alt="Icon">
						{{$lawyer->is_free ? 'Есть' : 'Нет'}}
					</span>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-12">
			<div class="lawyers_phone">
				<div class="phone">
					<div class="phone">
						<a href="tel:{{$lawyer->telephone}}">
							<span class="hide-tailMobile">
								{{$lawyer->telephone}}
							</span>
						</a>
						<a href="#" class="click-telMobile">Показать</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-12">
			<div class="lawyers_whtasapp">
				<div class="whtasapp">
					<a href="#"><img src="{{asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')}}" alt="Icon"></a>
					<a rel="nofollow" target="_blank" href="https://api.whatsapp.com/send?phone={{$lawyer->telephone}}&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D1%8F%20%D1%81%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0%20Yuristy.kz.%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BD%D1%81%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%86%D0%B8%D1%8E." class="whtasapp-text">WhatsApp</a>
					<span></span>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach