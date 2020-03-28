@extends('green.layouts.main')

@section('content')
<!-- Главная -->
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="">{{$h_one ?? $app_h_one}}</h1>
				</div>
				<div class="w-100"></div>
				<form class="catalin" action="{{route('search')}}" method="post">
					@csrf
					<input type="hidden" name="city" value="{{$city->alias}}">
					<label for="">
						<input type="text" name="search" placeholder="Юрист, фирма или услуга" required>
						<button type="submit">Найти</button>
					</label>
				</form>
			</div>
		</div>
	</div>
	<div class="factodes">
		<div class="container">
			<div class="row factodes_blocks">
				<div class="col-sm-4 factodes_block">
					<img src="{{asset('front3/image/Main/Vector1.svg')}}" alt="Icon" class="factodes_img">
					<div class="factodes_text">
						<div class="factodes_textt">Юристы</div>
						<div class="factodes_fact"><a href="{{route('lawyers',['city'=>$city->alias])}}"><span>{{$city->lawyers->count() ?? '538'}}</span> юриста</a></div>
					</div>
				</div>
				<div class="col-sm-4 factodes_block">
					<img src="{{asset('front3/image/Main/Vector2.svg')}}" alt="Icon" class="factodes_img">
					<div class="factodes_text">
						<div class="factodes_textt">Юридические компании</div>
						<div class="factodes_fact"> <a href="{{route('companies',['city'=>$city->alias])}}"><span>{{$city->companies->count() ?? '538'}}</span> компании</a></div>
					</div>
				</div>
				<div class="col-sm-4 factodes_block">
					<img src="{{asset('front3/image/Main/Vector3.svg')}}" alt="Icon" class="factodes_img">
					<div class="factodes_text">
						<div class="factodes_textt">Нотариусы</div>
						<div class="factodes_fact"><a href="{{route('service',['city'=>$city->alias,'id' => 'notariusy'])}}"><span>{{App\Models\Lawyer::getByServiceInCity(65,$city->id,true)}}</span> нотариуса</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Специализация-->
	@if($services)
	<div id="factodes" class="special">
		<div class="container">
			<h4 class="title">Специализация </h4>
			<div class="row special_blocks ">
			@foreach($services as $key => $service)
				@if($key <= 3)
				<div class="col-sm ">
					<div class="special_block">
						<div class="special_text">{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}</div>
						<div class="special_fact">{{App\Models\Lawyer::getByServiceInCity($service->id,$city->id,true)}}
							<a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}" class="special_icon">
								<img src="{{asset('front3/image/Spesial/Group 1.svg')}}" alt="Иконка">
							</a></div>
					</div>
				</div>
				@else
				@break
				@endif
			@endforeach
			</div>

			<div class="row services">
		       <div class="col-sm">
		         	<div class="flex1">
		         	@php $i = 1; @endphp
		         	@foreach($services as $key => $service)
						@if($key > 3)

						@if($i == 1)
						<div>
							<a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
							{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}} 
								<span>({{App\Models\Lawyer::getByServiceInCity($service->id,$city->id,true)}})</span>
							</a>

							@php
							$i++;
							@endphp
						@elseif($i == 4)
							<a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
							{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}} 
								<span>({{App\Models\Lawyer::getByServiceInCity($service->id,$city->id,true)}})</span>
							</a>
						</div>
							@php $i = 1; @endphp
						@else
							<a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
								{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}} 
								<span>({{App\Models\Lawyer::getByServiceInCity($service->id,$city->id,true)}})</span>
							</a>
							@php $i++; @endphp
						@endif

						@else
							@continue
						@endif
					@endforeach
		        		
		         </div>
		       </div>
		   </div>

		</div>
	</div>
	@endif
	<!-- Более 120 юристов-->
	<section class="container law">
		<div class="lawyers">
			<div class="container">
				<h4 class="titles">Более 1000 юристов</h4>
			</div>
			<!-- Карточки юоистов -->
			@foreach($lawyers as $lawyer)
			<div class="lawyer">
				<div class="container">
					<div class="row lawyer_block">

						<div class="col-sm-2 lawyer_block-photo ">
							<a href="yurist.html"><img src="{{$lawyer->image ? '/'.$lawyer->image : asset('front3/image/Lawyers/Empty.png')}}" alt="Фото" class="photo"></a>


							<div class="rewyes">
								<img src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Иконка отзывы" class="rewyes_icon">
								<a href="#"><span class="rewyes_text">{{$lawyer->feedbacks->count()}} отзывов</span></a>
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
						<div class="col-sm-6 lawyer_block-ingo">
							<a href="{{route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])}}">
								<div class="name">{{$lawyer->fullname($lawyer->id)}}</div>
							</a>

							<div class="row">
								<div class="col-sm-4">
									<div class="specialistik">
										<img src="{{asset('front3/image/Lawyers/icon/icon4.svg')}}" alt="Иконка" class="special_img">
										<span class="special">Специализация </span>
										<a href="#"></a>
									</div>
								</div>
								<div class="col-sm-8 uslugi">
                                    @foreach($lawyer->services as $service)               
                                    <a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">
                                    	<span class="spec">{{$service->name_ru}}</span>
                                    </a>
                                    @endforeach
								</div>
								<div class="col-sm-12">
									<div class="specialistik">
										<img src="{{asset('front3/image/Lawyers/icon/icon3.svg')}}" alt="Иконка" class="special_img">
										<span class="special">{{$lawyer->address}}</span>
									</div>
								</div>
								<div class="col-sm">
									<div class="specialistik">
										<img src="{{asset('front3/image/Lawyers/icon/icon2.svg')}}" alt="Иконка" class="special_img">
										<span class="special">График работы:</span>
										<div class="week">
											<span class="{{$lawyer->monday == 1 ? 'weekdays' : 'output'}}">ПН</span>
											<span class="{{$lawyer->tuesday == 1 ? 'weekdays' : 'output'}}">ВТ</span>
											<span class="{{$lawyer->wednesday == 1 ? 'weekdays' : 'output'}}">СР</span>
											<span class="{{$lawyer->thursday == 1 ? 'weekdays' : 'output'}}">ЧТ</span>
											<span class="{{$lawyer->friday == 1 ? 'weekdays' : 'output'}}">ПТ</span>
											<span class="{{$lawyer->saturday == 1 ? 'weekdays' : 'output'}}">СБ</span>
											<span class="{{$lawyer->sunday == 1 ? 'weekdays' : 'output'}}">ВС</span></div><br>
										<span class="time">{{$lawyer->timetext}}</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3 phone_card ">
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
								<div class="yes">{{$lawyer->is_free ? 'Есть' : 'Нет'}}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			<div class="lawyers_mobile">
				<div class="container">
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
									<span>5.0</span>
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
                                    <span class="spec">{{$service->name_ru}}</span>
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
										<div class="phone"><span class="hide-tailMobile">{{$lawyer->telephone}}</span> <a href="#"
												class="click-telMobile">Показать</a></div>

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

				</div>
			</div>


			<div class="col-lg-3 col-12">
				<a href="{{route('lawyers',['city'=>$city->alias])}}"><button class="lawyer_button">Все юристы</button></a></div>
		</div>
	</section>

	<!-- Информация -->
	<div class="info">
		<div class="container">
			<div class="info_title">
				<h2>Мы тщательно отбираем каждого специалиста и совершенно
					бесплатно помогаем найти лучших юристов, адвокатов
					и юридические компании</h2>
				<h3>Три простых шага</h3>
			</div>
			<div class="row info_block ">
				<div class="col-sm">
					<div class="info_img"><img src="{{asset('front3/image/Info/1.svg')}}" alt=""></div>
					<div class="info_title">Выберите специализацию</div>
					<div class="info_subtitle">Кратко опишите задачу или юриста,
						которого вы ищете</div>
				</div>
				<div class="col-sm">
					<div class="info_img"><img src="{{asset('front3/image/Info/2.svg')}}" alt=""></div>
					<div class="info_title">Мы подберем специалиста</div>
					<div class="info_subtitle">Наш специалист свяжется с вами в течение
						часа и предложит вариант</div>
				</div>
				<div class="col-sm">
					<div class="info_img"><img src="{{asset('front3/image/Info/3.svg')}}" alt=""></div>
					<div class="info_title">Юрист решает задачу</div>
					<div class="info_subtitle">Выбранный юрист поможет с решением
						вашей задачи</div>
				</div>
			</div><a href="#factodes"><button class="info_button">Выбрать специализацию</button></a>

		</div>
	</div>

	@if($news)
	<!-- Полезное -->
	<div class="useful">
		<div class="container">
			<h4 class="titles">Полезное</h4>
			<div class="row useful_blocks ">
				@foreach($news as $item)
				<div class="col-sm useful_block">
					<div class="useful_img">
						<img src="{{$item->image}}" alt="Фото" class="photonews">
					</div>
					<div class="useful_date">
						<span>{{Carbon\Carbon::parse($item->date)->format('Y-m-d')}}</span>
					</div>
					<div class="useful_text">{{$item->title}}</div>
					<a href="{{route('news.show',['alias' => $item->alias])}}" class="useful_read">Читать далее</a>
				</div>
				@endforeach
			</div>
			<a href="{{route('news')}}">
				<div class="useful_button">Все статьи</div>
			</a>
		</div>
	</div>
	@endif


	<!-- О сервисе Yuristy.kz -->
	<div class="service">
		<div class="container">
			<h2 class="titles">О сервисе Yuristy.kz</h2>


			<div class="row">
				<div class="col-sm-12">
					<div class="service_text-1">Требуется грамотная консультация юриста или адвоката? Хотите решить возникшую
						проблему цивилизованным способом? Сервис
						Yuristy.kz – это лучший способ найти квалифицированного юриста, адвоката, юридическую фирму в любой
						отрасли права,
						который поможет получить квалифицированную консультацию составить документы, подготовиться к судебному
						разбирательству
						или решить проблему до суда. Данный сервис доступен по всему Казахстану.</div>
					<div class="service_text-2">На нашей площадке собраны лучшие юристы в сфере семейного, гражданского,
						земельного, уголовного, корпоративного и других
						отраслей права. Каждый из юристов имеет высшее образование и опыт судебного представительства.</div>
				</div>
			</div>

			<div class="spoilerpanel">
				<div class="col-sm-10">
					<div class="text-title">Здесь вы найдете ответы на следующие вопросы:</div>
					<div class="text-subtitle">
						<div>1. как правильно составить претензию продавцу, договор о купле-продаже, исковое заявление и другие
							документы;</div>
						<div>2. как правильно инициировать процесс банкротства и обеспечить списание долгов;</div>
						<div>3. какие сроки исковой давности существуют для подачи искового заявления;</div>
						<div>4. как правильно открыть, реорганизовать, ликвидировать организацию;</div>
						<div>5. как разделить имущество в браке или после его расторжения;</div>
						<div>6. как правильно усыновить/удочерить ребенка;</div>
						<div>7. особенности раздела участков земли и определение их границ в соответствии с законодательными
							нормами.</div>
						<div>8. получить бесплатную консультацию юриста и адвоката.</div>
					</div>
					<div class="text">Это лишь часть вопросов, интересующих наших пользователей. Хотите узнать еще больше –
						просто узнайте обо всех
						возможностях сайта на практике!</div>
					<div class="text">Как получить консультацию юриста или адвоката?</div>
					<div class="text">Получить помощь юриста максимально просто: укажите на сайте нужную отрасль права или
						название услуги (например,
						консультация по алиментам, сопровождение в суде или составление претензии). Через несколько секунд вам
						будут открыты
						результаты поиска. Вы можете изучить карточку о частных специалистах и компаниях, ознакомиться с перечнем
						услуг,
						прайс-листом и отзывами клиентов.</div>
					<div class="text">После того, как вы подобрали по параметрам подходящего юриста, вы можете просто позвонить
						ему по телефону и обсудить
						детали сотрудничества или написать онлайн или в месенджер вотсап.</div>
					<div class="text">Затем специалист поможет вам как можно быстрее решить вопросы. Бесплатные и платные
						консультации по телефону или онлайн,
						личный прием, подготовка процессуальных документов – все это открыто с помощью нашего сервиса.</div>
					<div class="text">У нас представлены юридические фирмы, адвокатские конторы или частные юристы, которые
						предоставляют бесплатные
						консультации, а также платные услуги. Сервис абсолютно бесплатен для физических лиц.</div>
					<div class="text">Сервис предусматривает удобные формы взаимодействия. Если вы не хотите звонить сами,
						просто оставьте контактные данные:
						адвокат перезвонит вам в ближайшее время.</div>
					<div class="text">Правила регистрации для юристов или юридических фирм</div>
					<div class="text">Портал сотрудничает не только с теми кому необходима помощь, но и с теми, кто занимается
						оказанием юридической помощи.
						На сайте вы можете выложить информацию о себе, указать профессиональные навыки и стоимость работы. Это
						отличный способ
						найти новых клиентов, получить положительные рекомендации, улучшить имидж.</div>
					<div class="text">Для регистрации укажите ваш статус, основную специализацию, данные о образовании и опыте
						работы по специальности. Если
						есть возможность, дополните анкету ссылками на примеры выигранных дел, судебную практику. Мы тщательно
						проверяем каждую
						анкету, поэтому рекомендуем публиковать только достоверные данные о себе.</div>
					<div class="text">После того, как вы подтвердили информацию о себе, указали контактные данные, вы будете
						получать первые отклики.</div>
					<div class="text-title">Преимущества Yuristy.kz</div>
					<div class="text-2">1. Площадка будет полезна как обычным гражданам, которым нужно оказать юридическую
						помощь, так и профессиональным юристам,
						с желанием регулярно получать разнообразные дела по своей сфере.</div>
					<div class="text-2">2. Здесь можно найти грамотного специалиста по юриспруденции всего за несколько минут.
						Мы гарантируем компетентность и
						безупречную репутацию адвокатов.</div>
					<div class="text-2">3. Вы можете проконсультироваться со специалистом и решить вопрос без дорогостоящего
						юридического сопровождения. Многие
						юристы и фирмы оказывают бесплатную юридическую кансультацию.</div>
					<div class="text-2">4. Простой интерфейс и удобство использования.</div>
					<div class="text-2">5. Широкий спектр услуг, оказываемые правоведами.</div>
					<div class="text">Таким образом, Yuristy.kz делает доступной квалифицированную юридическую помощь для
						каждого человека, помогает выиграть
						спор в суде или прийти к досудебному соглашению, выгодному для сторон. Мы подобрали для вас лучших
						правоведов, они с
						блеском справляются даже с нестандартными ситуациями.</div>
				</div>
			</div>
			<div class="spoiler"><button class="service_button">Подробнее</button></div>
		</div>
	</div>

@endsection