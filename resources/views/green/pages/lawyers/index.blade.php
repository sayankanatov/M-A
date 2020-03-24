@extends('green.layouts.main')

@section('content')

@php
use Illuminate\Support\Facades\Input;
@endphp
<!-- Форма -->
@include('green.includes.search-form')
<!--Юристы и адвокаты в Нур-Султане (Астана) -->
<div class="title">
	<div class="container">
		<div class="head">
			<div class="row">
				<div class="col-sm">
					<a href="{{route('main')}}">Главная</a>
				<span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка"></span>
				<span class="head_special">Специалисты</span></div>
			</div>
			<div class="row">
				<div class="col-sm">
					<div class="head_title"> 
						<h4>{{$h_one ?? $app_h_one}}</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="head_subtitle">{!!$seo_desc ?? null!!}</div>
				</div>
				<div class="col-sm">
					<div class="head_more"><a href="#">Подробнее</a></div>
				</div>
			</div>
			<div class="row yurists">
				<div class="col-sm-5">
					<span class="dropdown">
						<a href="#" class="js-link">{{app()->getLocale() == 'ru' ? App\Models\Service::first()->name_ru : App\Models\Service::first()->name_kz}}<i class="fa fa-chevron-down"></i></a>
						<ul class="js-dropdown-list">
							@foreach($services as $service)
                                <li><a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}</a></li>
                            @endforeach
						</ul>
					</span>
				</div>

				@include('green.includes.filter')
				
			</div>
		</div>
	</div>
</div>
</div>
@if($lawyers)
<!-- Карточки юристов -->
<section class=" container low_2">
@foreach($lawyers as $lawyer)
	<div class="lawyer">
		<div class="container">
			<div class="row lawyer_block">
				<div class="col-2 lawyer_block-photo ">
					<a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}">
						<img src="{{$lawyer->image ? '/'.$lawyer->image : asset('front2/img/spec-item.png')}}" alt="Фото" class="photo">
					</a>
					<div class="rewyes">
						<img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Иконка отзывы" class="rewyes_icon">
						<span class="rewyes_text">{{$lawyer->feedbacks()->count()}} отзыва</span>
					</div>
					<div class="stars">
						<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
						<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
						<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
						<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
						<img class="star" src="{{asset('front3/image/Lawyers/icon/star_strouk.svg')}}" alt="Звезда">
						<span>4.0</span>
					</div>
				</div>
				<div class="col-6 lawyer_block-ingo">
						<a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}"><div class="name">{{$lawyer->fullname($lawyer->id)}}</div></a>
					
					<div class="row">
						<div class="col-4">
							<div class="specialistik">
								<img src="{{asset('front3/image/Lawyers/icon/icon4.svg')}}" alt="Иконка" class="special_img">
								<span class="special">Специализация </span>
							</div>
						</div>
						<div class="col-8 uslugi">
							@foreach($lawyer->services as $service)
                            <span class="spec">{{$service->name_ru}}</span>
                            @endforeach
						</div>
						<div class="col-12">
							<div class="specialistik">
								<img src="{{asset('front3/image/Lawyers/icon/icon3.svg')}}" alt="Иконка" class="special_img">
								<span class="special">{{$lawyer->address}}</span>
							</div>
						</div>
						<div class="col">
							<div class="specialistik">
								<img src="{{asset('front3/image/Lawyers/icon/icon2.svg')}}" alt="Иконка" class="special_img">
								<span class="special">График работы:</span>
								<div class="week">
									<span class="{{$lawyer->monday == 1 ? 'weekdays' : 'output'}}">
                                        пн
                                    </span>
                                    <span class="{{$lawyer->tuesday == 1 ? 'weekdays' : 'output'}}">
                                        вт
                                    </span>
                                    <span class="{{$lawyer->wednesday == 1 ? 'weekdays' : 'output'}}">
                                        ср
                                    </span>
                                    <span class="{{$lawyer->thursday == 1 ? 'weekdays' : 'output'}}">
                                        чт
                                    </span>
                                    <span class="{{$lawyer->friday == 1 ? 'weekdays' : 'output'}}">
                                        пт
                                    </span>
                                    <span class="{{$lawyer->saturday == 1 ? 'weekdays' : 'output'}}">
                                        сб
                                    </span>
                                    <span class="{{$lawyer->sunday == 1 ? 'weekdays' : 'output'}}">
                                        вс
                                    </span>
								</div>
								<br>
								<span class="time">{{$lawyer->timetext}}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-3 phone_card ">
					<div class="phone">
						<a href="tel:{{$lawyer->telephone}}">
							<span class="hide-tail">{{$lawyer->telephone}}</span>
						</a>
						<a href="#" class="click-tel">Показать</a>
					</div>
					<div class="WhatsApp_block">
						<a href="#" class="wa_icon"><img class="wa_icon" src="{{asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')}}"
								alt="Wa_icon"></a>
						<a rel="nofollow" target="_blank" href="https://api.whatsapp.com/send?phone={{$lawyer->telephone}}&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D1%8F%20%D1%81%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0%20Yuristy.kz.%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BD%D1%81%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%86%D0%B8%D1%8E." class="wa_text">WhatsApp</a>
					</div>
					<div class="consultation">
						<div class="cons">Бесплатная консультация:</div>
						<div class="{{$lawyer->is_free ? 'yes' : 'no'}}">{{$lawyer->is_free ? 'Есть' : 'Нет'}}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach

		{{-- <div class="lawyers_mobile">
			<div class="container">
				<div class="lowers_mobile card">
					<div class="row">
						<div class="col-md-4 col-6">
							<div class="lawyers_photo">
									<a href="yurist.html"><img src="image/Lawyers/Rectangle 26.png" alt="photo"></a>
								
							</div>
						</div>
						<div class="col-md-6 col-6">
							<div class="lawyers_name">
									<a href="yurist.html">Муканов Мурат Муканович</a>
								
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
								<a href="#"><span class="rewyes_text">7 отзывов</span></a>
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
								
			<div class="phone"><span class="hide-tailMobile">7 777 111 22 23</span> <a href="#" class="click-telMobile">Показать</a>
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
				<div class="lowers_mobile card">
					<div class="row">
						<div class="col-md-4 col-6">
							<div class="lawyers_photo">
									<a href="yurist.html"><img src="image/Lawyers/Azamat.png" alt="photo"></a>
								
							</div>
						</div>
						<div class="col-md-6 col-6">
							<div class="lawyers_name">
									<a href="yurist.html">Жилисбаев Азамат Жумадуллович</a>
								
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
								<div class="no">
									Бесплатная консультация:
									<span>
										Нет
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-12">
							<div class="lawyers_phone">
								<div class="phone">
<div class="phone"><span class="hide-tailMobile">7 777 111 22 23</span> <a href="#" class="click-telMobile">Показать</a>
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
				<div class="lowers_mobile card">
					<div class="row">
						<div class="col-md-4 col-6">
							<div class="lawyers_photo">
								<a href="yurist.html"><img src="image/Lawyers/Rectangle 26.png" alt="photo"></a>
							
							</div>
						</div>
						<div class="col-md-6 col-6">
							<div class="lawyers_name">
								<a href="yurist.html">Муканов Мурат Муканович</a>
								
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
								<a href="#"><span class="rewyes_text">7 отзывов</span></a>
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
<div class="phone"><span class="hide-tailMobile">7 777 111 22 23</span> <a href="#" class="click-telMobile">Показать</a>
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
				<div class="lowers_mobile card">
									<div class="row">
										<div class="col-md-4 col-6">
											<div class="lawyers_photo">
													<a href="yurist.html"><img src="image/Lawyers/Rectangle 26.png" alt="photo"></a>
												
											</div>
										</div>
										<div class="col-md-6 col-6">
											<div class="lawyers_name">
													<a href="yurist.html">Муканов Мурат Муканович</a>
												
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
												<a href="#"><span class="rewyes_text">7 отзывов</span></a>
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
				<div class="phone"><span class="hide-tailMobile">7 777 111 22 23</span> <a href="#" class="click-telMobile">Показать</a>
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
				<div class="lowers_mobile card">
									<div class="row">
										<div class="col-md-4 col-6">
											<div class="lawyers_photo">
													<a href="yurist.html"><img src="image/Lawyers/Azamat.png" alt="photo"></a>
												
											</div>
										</div>
										<div class="col-md-6 col-6">
											<div class="lawyers_name">
													<a href="yurist.html">Жилисбаев Азамат Жумадуллович</a>
												
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
												<div class="no">
													Бесплатная консультация:
													<span>
														Нет
													</span>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-12">
											<div class="lawyers_phone">
												<div class="phone">
												<div class="phone"><span class="hide-tailMobile">7 777 111 22 23</span> <a href="#" class="click-telMobile">Показать</a>
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

</div><div class="lawyer_btn">
	<img src="{{asset('front3/image/2. Main/Arrows.svg')}}" alt="Стрелки">
	<button id="loadMore" >Показать больше</button>


</div>
</section>

</div>

@endif

@endsection