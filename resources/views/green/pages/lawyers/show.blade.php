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
						<span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка"></span>
						<a href="{{route('lawyers',['city' =>$city->alias])}}">Специалисты</a>
						<span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка"></span>
						<span class="head_special">{{$lawyer->fullname($lawyer->id)}}</span></div>
					<div class="lawyer">
						<div class="container">
							<div class="row lawyer">

								<div class="col-2 lawyer_block-photo ">
									<img src="{{$lawyer->image ? '/'.$lawyer->image : asset('front3/image/Lawyers/Empty.png')}}" alt="Фото" class="photo">
								</div>
								<div class="col-7 lawyer_block-ingo block">
                                    <div class="name"><h1>{{$lawyer->fullname($lawyer->id)}}</h1>
									<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
									<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
									<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
									<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
									<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
									<small>{{$lawyer->rating ?? '0.0'}}</small>
									<span><img class="block-span" src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Icon"></span>
									<small class="rewyes_text">{{$lawyer->feedbacks()->count()}} отзывов</small>
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
											@foreach($lawyer->services as $service)
											<span class="spec">
												<a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">{{$service->name_ru}}</a>
											</span>
                                            @endforeach

                                            @auth
                                            <!--КНОПКА ОСТАВИТЬ ОТЗЫВ START-->
				                            <div class="profile_btn">
				                                <a href="#win{{$lawyer->id}}">
				                                	<button>Оставить отзыв</button>
				                                </a>
				                            </div>
				                            <!--КНОПКА ОСТАВИТЬ ОТЗЫВ END-->
				                            @endauth
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
												<span class="time">{{$lawyer->timetext}}</span>
												<div class="week socio_week">
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

													@include('green.includes.share')

												</div><br>
											</div>
										</div>
									</div>
								</div>
								<div class="col-2 urist ">
									<div class="phone">
										<a href="tel:{{$lawyer->telephone}}">
											<span class="hide-tail">{{$lawyer->telephone}}</span>
										</a>
										<a href="#" class="click-tel">Показать</a>
									</div>
									<div class="WhatsApp_block">
										<a href="#" class="wa_icon"><img class="wa_icon" src="{{asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')}}" alt="Wa_icon"></a>
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
		<div class="lawyers_mobile">
			<div class="container">
				<div class="lowers_mobile card">
					<div class="row">
						<div class="col-md-4 col-6">
							<div class="lawyers_photo">
								<img src="{{$lawyer->image ? '/'.$lawyer->image : asset('front3/image/Lawyers/Empty.png')}}" alt="photo">
							</div>
						</div>
						<div class="col-md-6 col-6">
							<div class="lawyers_name">
                                <h1>{{$lawyer->fullname($lawyer->id)}}</h1>

							</div>
							<div class="lawyers_stars">
								<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
								<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
								<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
								<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
								<img class="star" src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Звезда">
								<span>{{$lawyer->rating ?? '0.0'}}</span>
							</div>
							<div class="lawyers_rewyes">
								<img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="rewyes">
								<a href="#"><span class="rewyes_text">{{$lawyer->feedbacks()->count()}} отзывов</span></a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="lawyers_specialization">
								<img src="{{asset('front3/')}}image/Lawyers/icon/icon4.svg" alt="Icon">
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
							</div>
						</div>
						<div class="col-md-12 col-12">
							<div class="lawyers_consultation">
								<div class="{{$lawyer->is_free ? 'yes' : 'no'}}">
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
										<span class="hide-tailMobile">{{$lawyer->telephone}}</span>
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
					<img src="{{$rel_lawyer->image ? '/'.$rel_lawyer->image : asset('front3/image/Lawyers/Empty.png')}}" alt="Photo" class="photo">
				</div>
				<div class="similar_name"><a href="{{route('lawyer',['city' => $city->alias,'alias' => $rel_lawyer->alias])}}">{{$rel_lawyer->last_name.' '.$rel_lawyer->first_name.' '.$rel_lawyer->patronymic}}</a></div>
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
