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
						<span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка"></span>
						<a href="{{route('companies',['city' =>$city->alias])}}">Компании</a>
						<span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка"></span>
						<span class="head_special">{{$company->name}}</span></div>
					<div class="lawyer">
						<div class="container">
							<div class="row lawyer">

								<div class="col-2 lawyer_block-photo ">
									<img src="{{$company->logo ? '/'.$company->logo : asset('front3/image/4. Compani/3.png')}}" alt="Фото" class="photo">
								</div>
								<div class="col-7 lawyer_block-ingo block">
									<div class="name">{{$company->name}}
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<small>5.0</small>
										<span><img class="block-span" src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Icon"></span>
										<small class="rewyes_text">{{$company->feedbacks()->count()}} отзывов</small>
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
												<div class="week socio_week">
													<span class="{{$company->monday == 1 ? 'weekdays' : 'output'}}">пн</span>
				                                    <span class="{{$company->tuesday == 1 ? 'weekdays' : 'output'}}">вт</span>
				                                    <span class="{{$company->wednesday == 1 ? 'weekdays' : 'output'}}">ср</span>
				                                    <span class="{{$company->thursday == 1 ? 'weekdays' : 'output'}}">чт</span>
				                                    <span class="{{$company->friday == 1 ? 'weekdays' : 'output'}}">пт</span>
				                                    <span class="{{$company->saturday == 1 ? 'weekdays' : 'output'}}">сб</span>
				                                    <span class="{{$company->sunday == 1 ? 'weekdays' : 'output'}}">вс</span>
													
													@include('green.includes.share')
												</div><br>
												<span class="time">{{$company->timetext}}</span>
												
											</div>
										</div>
									</div>
								</div>
								<div class="col-2 urist ">
									<div class="phone">
										<a href="tel:{{$company->telephone}}">
											<span class="hide-tail">{{$company->telephone}}</span>
										</a>
										<a href="#" class="click-tel">Показать</a></div>
									<div class="WhatsApp_block">
										<a href="#" class="wa_icon"><img class="wa_icon" src="{{asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')}}"
												alt="Wa_icon"></a>
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
					{{-- <div class="lawyers_mobile">
						<div class="container">
							<div class="lowers_mobile card">
								<div class="row">
									<div class="col-md-4 col-6">
										<div class="lawyers_photo">
											<a href="Compan.html"><img src="image/4. Compani/3.png" alt="photo"></a>
					
										</div>
									</div>
									<div class="col-md-6 col-6">
										<div class="lawyers_name">
											<a href="Compan.html">ТОО "Агентство юридических услуг"</a>
					
										</div>
										<div class="lawyers_stars">
					
											<img class="star" src="image/Lawyers/icon/Icon_star.svg" alt="Звезда">
											<img class="star" src="image/Lawyers/icon/Icon_star.svg" alt="Звезда">
											<img class="star" src="image/Lawyers/icon/Icon_star.svg" alt="Звезда">
											<img class="star" src="image/Lawyers/icon/Icon_star.svg" alt="Звезда">
											<img class="star" src="image/Lawyers/icon/Icon_star.svg" alt="Звезда">
											<span>5.0</span>
										</div>
										<div class="lawyers_rewyes">
											<img src="image/Lawyers/icon/Vector.svg" alt="rewyes">
											<a href="#"><span class="rewyes_text">12 отзывов</span></a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="lawyers_specialization">
											<img src="image/Lawyers/icon/icon4.svg" alt="Icon">
											Специализация:
										</div>
									</div>
									<div class="col-12">
										<div class="lawyers_uslugi">
											<span class="spec">Уголовное право</span>
											<span class="spec">Земельное право</span>
											<span class="spec">Семейное право</span>
											<span class="spec">Арбитраж</span>
											<span class="spec">Корпоративное право</span>
											<span class="spec">Алименты</span>
											<span class="spec">Наследство</span>
										</div>
									</div>
									<div class="col-12">
										<div class="lawyers_adress">
											<img src="image/Lawyers/icon/icon3.svg" alt="Icon">
											Нур-Султан (Астана), г. Нур-Султан, пр. Женис, 20 (ВП-1)
										</div>
									</div>
									<div class="col-12">
										<div class="lawyers_graphick">
											<img src="image/Lawyers/icon/icon2.svg" alt="Icon">
											График работы: <span>9:00 - 18:00</span>
											<div class="lawyers_week">
												<span class="weekdays">ПН</span>
												<span class="weekdays">ВТ</span>
												<span class="weekdays">СР</span>
												<span class="weekdays">ЧТ</span>
												<span class="weekdays">ПТ</span>
												<span class="output">СБ</span>
												<span class="output">ВС</span></div>
										</div>
									</div>
									<div class="col-md-12 col-12">
										<div class="lawyers_consultation">
											<div class="yes">
												Бесплатная консультация:
												<span>
													<img src="image/Lawyers/icon/Cons_galka.svg" alt="Icon">
													Есть
												</span>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-12">
										<div class="lawyers_phone">
											<div class="phone">
																				<div class="phone">
																					<div class="phone"><span class="hide-tailMobile">7 777 111 22 23</span> <a href="#"
																							class="click-telMobile">Показать</a>
																					</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 col-12">
										<div class="lawyers_whtasapp">
											<div class="whtasapp">
					
												<a href="#"><img src="image/Lawyers/icon/icon_WhatsApp.svg" alt="Icon"></a>
												<a href="#" class="whtasapp-text">WhatsApp</a>
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
					
						</div>
					</div> --}}
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
				{{-- <div class="col-sm-3">
					<div class="about_text">
						<div>Право собственности</div>
						<div>Трудовое право</div>
						<div>Арбитраж</div>
						<div>Корпоративное право</div>
						<div>ЖКХ</div>
						<div>Авторское право</div>
					</div>
				</div> --}}
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
				<div class="review_name">{{$feedback->user->name}}
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
{{-- <div class="similar">
	<div class="container">
		<div class="similar_title">
			<h4>Похожие компании</h4>
		</div>
		<div class="similar_slider">
			<div class="similar_block">
				<div class="similar_image"><img src="image/4. Compani/2.png" alt="Photo"></div>
				<div class="similar_name">ТОО "Агентство юридических услуг"</div>
				<div class="similar_star">
					<img src="image/Lawyers/icon/Icon_star.svg" alt="Star">
					<img src="image/Lawyers/icon/Icon_star.svg" alt="Star">
					<img src="image/Lawyers/icon/Icon_star.svg" alt="Star">
					<img src="image/Lawyers/icon/Icon_star.svg" alt="Star">
					<img src="image/Lawyers/icon/Icon_star.svg" alt="Star">
					<span>5.0</span></div>
				<div class="similar_review">
					<span><img src="image/Lawyers/icon/Vector.svg" alt="Star"></span>
					<span>12 отзывов</span>
				</div>
			</div>
			<div class="similar_block">
				<div class="similar_image"><img src="image/4. Compani/0.svg" alt="Photo"></div>
				<div class="similar_name">ТОО "ЮРИСТ 365" <br></div>
				<div class="similar_star">
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span>5.0</span></div>
				<div class="similar_review">
					<span><img src="image/Lawyers/icon/Vector.svg" alt="Star"></span>
					<span>12 отзывов</span>
				</div>
			</div>
			<div class="similar_block">
				<div class="similar_image"><img src="image/4. Compani/3.png" alt="Photo"></div>
				<div class="similar_name">ZAN KENES</div>
				<div class="similar_star">
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span>5.0</span></div>
				<div class="similar_review">
					<span><img src="image/Lawyers/icon/Vector.svg" alt="Star"></span>
					<span>12 отзывов</span>
				</div>
			</div>
			<div class="similar_block">
				<div class="similar_image"><img src="image/4. Compani/0.svg" alt="Photo"></div>
				<div class="similar_name">ИП «Zanger»</div>
				<div class="similar_star">
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span><img src="image/Lawyers/icon/Icon_star.svg" alt="Star"></span>
					<span>5.0</span></div>
				<div class="similar_review">
					<span><img src="image/Lawyers/icon/Vector.svg" alt="Star"></span>
					<span>12 отзывов</span>
				</div>
			</div>

		</div>
	</div>
</div> --}}
@endsection