<footer class="footer">
		<div class="container">
			<div class="row footer_blocks">
				<div class="footer_special footer_logo"><img src="{{asset('front3/image/Footer/Logo.svg')}}" alt="Лого"></div>
				@if($cities)
				<div class="footer_special footer_city">
					<div class="dropdown">
						@if($city)
						<div class="select">
							<span class="footer_drop">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
								<img src="{{asset('front3/image/Footer/Arrow.svg')}}" alt="Стрелка">
							</span>
						</div>
						@endif
						<input type="hidden" name="gender">
						<ul class="dropdown-menu">
							@foreach($cities as $c)
							<li id="male">
								<a href="{{route('city',['city'=>$c->alias])}}">
									<span class="footer_drop-city ">
										{{app()->getLocale() == 'ru' ? $c->name_ru : $c->name_kz}}
										<img src="{{asset('front3/image/Footer/Arrow.svg')}}" alt="Стрелка">
									</span>
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				@endif
				<div class="footer_special footer_specialists"><a href="{{route('lawyers',['city'=>$city->alias])}}">Специалисты</a></div>
				<div class="footer_special footer_companies"><a href="{{route('companies',['city'=>$city->alias])}}">Юридические компании</a></div>
				<div class="footer_special footer_notaries"><a href="{{route('service',['city'=>$city->alias,'id' => 'notariusy'])}}">Нотариусы</a></div>
				<div class="footer_special footer_notaries"><a href="{{route('news')}}">Полезное</a></div>
				<div class="col-sm">
					<div class="footer_btns">
						@auth
						@else
						<button id="show-modal2" class="footer_btn-1" href="#">Вход</button>
						<button id="show-modal" class="footer_btn-2" href="#">Регистрация</button>
						@endauth
					</div>
				</div>
			</div>
			<div class="row info">
				<div class="">
					<div class="footer_info">По всем вопросам пишите нам на почту <a href="#">info@yuristy.kz</a></div>
				</div>
				<div class="col-sm footer_socials ">
					<a href="https://www.facebook.com/yuristy.yuristy" target="_blank"><img src="{{asset('front3/image/Footer/Facebook.svg')}}" alt="Facebook"></a>
					<a href="https://www.instagram.com/yuristy_kz" target="_blank"><img src="{{asset('front3/image/Footer/Instagram.svg')}}" alt="Instagram"></a></div>

			</div>
		</div>

	</footer>