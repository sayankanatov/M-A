@foreach($companies as $company)
<div class="lawyer">
	<div class="container">
		<div class="row lawyer_block firms_block ">
			<div class="col-2 lawyer_block-photo ">
				<a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}">		<img src="{{$company->logo ? '/'.$company->logo : asset('front3/image/4. Compani/0.svg')}}" alt="Фото" class="photo">
				</a>

				<div class="rewyes">
					<img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Иконка отзывы" class="rewyes_icon">
					<span class="rewyes_text">{{$company->feedbacks()->count()}} отзывов</span>
				</div>
				<div class="stars">
					<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
					<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
					<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
					<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
					<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
					<span>5.0</span>
				</div>
			</div>
			<div class="col-6 lawyer_block-ingo">
				<div class="name"> <a href="{{route('company',['id'=>$company->alias,'city' => $city->alias])}}">{{$company->name}}</a>
				</div>
				<div class="row">
					<div class="col-4">
						<div class="specialistik">
							<img src="{{asset('front3/image/Lawyers/icon/icon4.svg')}}" alt="Иконка" class="special_img">
							<span class="special">Специализация </span>
							<a href="#"></a>
						</div>
					</div>
					<div class="col-8 uslugi">
					@foreach($company->services as $service)
                        <span class="spec">{{$service->name_ru}}</span>
                    @endforeach
					</div>
					<div class="col-12">
						<div class="specialistik">
							<img src="{{asset('front3/image/Lawyers/icon/icon3.svg')}}" alt="Иконка" class="special_img">
							<span class="special">{{app()->getLocale() == 'ru' ? $company->city->name_ru : $company->city->name_kz}}, {{$company->address}}</span>
						</div>
					</div>
					<div class="col">
						<div class="specialistik">
							<img src="{{asset('front3/image/Lawyers/icon/icon2.svg')}}" alt="Иконка" class="special_img">
							<span class="special">График работы:</span>
							<div class="week">
								<span class="{{$company->monday == 1 ? 'weekdays' : 'output'}}">пн</span>
	                            <span class="{{$company->tuesday == 1 ? 'weekdays' : 'output'}}">вт</span>
	                            <span class="{{$company->wednesday == 1 ? 'weekdays' : 'output'}}">ср</span>
	                            <span class="{{$company->thursday == 1 ? 'weekdays' : 'output'}}">чт</span>
	                            <span class="{{$company->friday == 1 ? 'weekdays' : 'output'}}">пт</span>
	                            <span class="{{$company->saturday == 1 ? 'weekdays' : 'output'}}">сб</span>
	                            <span class="{{$company->sunday == 1 ? 'weekdays' : 'output'}}">вс</span>
							</div>
							<br>
							<span class="time">{{$company->timetext}}</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-3 phone_card ">
				<div class="phone">
					<a href="tel:{{$company->telephone}}">
						<span class="hide-tail">{{$company->telephone}}</span>
					</a>
					<a href="#" class="click-tel">Показать</a>
				</div>
				<div class="WhatsApp_block">
					<a href="#" class="wa_icon"><img class="wa_icon" src="{{asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')}}" alt="Wa_icon"></a>
					<a rel="nofollow" target="_blank" href="https://api.whatsapp.com/send?phone={{$company->telephone}}&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D1%8F%20%D1%81%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0%20Yuristy.kz.%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BD%D1%81%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%86%D0%B8%D1%8E." class="wa_text">WhatsApp</a>
				</div>
				<div class="consultation">
					<div class="cons">Бесплатная консультация:</div>
					<div class="{{$company->is_free ? 'yes' : 'no'}}">{{$company->is_free ? 'Есть' : 'Нет'}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach