<!---Личный кабинет -->
<div class="profile">
	<div class="title">
		<div class="container">
			<div class="head">
				<div class="row">
					<div class="col-sm">
						<a href="{{route('main')}}">Главная</a>
						<span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка"></span>
						<span class="head_special">Личный кабинет</span>
						<span class="head_img">
							<img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка">
						</span>
						<span class="head_special">
							<a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   	            {{ __('Выйти') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
						</span>
					</div>
					<div class="lawyer">
						<div class="container">
							<div class="row lawyer">
	
								<div class="col-2 lawyer_block-photo ">
									<img src="{{$info->image ? $info->image : asset('front3/image/Lawyers/Empty.png')}}" alt="Фото" class="photo">
									<div class="redacted"><a href="#win3" ><button>Изменить фото</button></a></div>
	
								</div>
								<div class="col-7 lawyer_block-ingo block">
									<div class="name name-mobile"><a href="{{route('lawyer',['id' => $info->alias,'city' => $city->alias])}}">{{$info->last_name}} {{$info->first_name}} {{$info->patronymic}}</a>
										<div>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<span><img src="{{asset('front3/image/Lawyers/icon/Icon_star.svg')}}" alt="Star"></span>
										<small>0.0</small>
										<span><img class="block-span" src="{{asset('front3/image/Lawyers/icon/Vector.svg')}}" alt="Icon"></span>
										<small class="rewyes_text">{{$info->feedbacks->count()}} отзывов</small>
										</div>
									</div>
									<div class="row uslugi-inner">
										<div class="col uslugi">
											@foreach($info->services as $service)
				                           	<span class="spec">{{$service->name_ru}}</span>
				                            @endforeach
											
											<div class="profile_btn">
												<a href="#win1">
													<button>Редактировать специализацию</button>
												</a>
											</div>
											<div class="profile_btn">
												<a href="#win2" >
													<button>Оставить отзыв</button>
												</a>
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

	<br>
	<div class="container">
		<main>
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1">Управление профилем</label>
			<input  id="tab2" type="radio" name="tabs">
			<label  for="tab2">Статистика</label>
		
			<section id="content1">
				<form role="form" action="{{route('home.lawyer.update',['id' => $info->id])}}" method="post">
					@csrf
					<div class="row hr">
						<div class="col">
							<div class="profile_form">
								<div class="col"><span class="name">Фамилия</span></div>
								<div class="col"><input type="text" placeholder="Фамилия" name="last_name" value="{{$info->last_name}}"></div>
							</div>
							<div class="profile_form">
								<div class="col"><span class="name">Имя</span></div>
								<div class="col"><input type="text" placeholder="Имя" name="first_name" value="{{$info->first_name}}"></div>
							</div>
							<div class="profile_form">
								<div class="col"><span class="name">Отчество</span></div>
								<div class="col"><input type="text" placeholder="Отчество" name="patronymic" value="{{$info->patronymic}}"></div>
							</div>
						</div>
					
						<div class="col">
							<div class="profile_form">
								<div class="col"><span class="name">Телефон</span></div>
								<div class="col"><input type="input" placeholder="Телефон" name="telephone" value="{{$info->telephone}}"></div>
							</div>
							<div class="profile_form">
								<div class="col"><span class="name">E-mail</span></div>
								<div class="col"><input type="email" placeholder="E-mail" name="email" value="{{$info->email}}"></div>
							</div>
							<div class="profile_form">
								<div class="col"><span class="name">Город </span></div>
								<div class="col">
									<select class="cities" name="city_id" value="{{$info->city_id}}">
				                        <option>Выберите свой город</option>
				                    @foreach($cities as $c)
				                        <option value="{{$c->id}}" {{$c->id == $info->city_id ? 'selected' : ''}}>{{$c->name_ru}}</option>
				                    @endforeach
				                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="row hr">
						<div class="col">
							<div class="profile_form">
								<div class="col"><span class="name">Адрес</span></div>
								<div class="col"><input type="input" placeholder="Адрес" name="address" value="{{$info->address}}"></div>
							</div>
							<div class="profile_form">
								<div class="col"><span class="name">График работы</span></div>
								<div class="col"><input type="text" placeholder="" value="{{$info->timetext}}" name="timetext"></div>
							</div>					
						</div>
							
						<div class="col">
							<div class="profile_form">
								<div class="col"><span class="name">Образование</span></div>
								<div class="col"><input type="input" placeholder="Образование" name="education" value="{{$info->education}}"></div>
							</div>
							<div class="profile_form">
								<div class="col"><span class="name">Стаж</span></div>
								<div class="col"><input type="input" placeholder="5 лет" name="work_experience" value="{{$info->work_experience}}"></div>
							</div>
						</div>
					</div>
					<div class="row hr">
						<div class="col">
							<div class="profile_form">
								<div class="col"><span class="name">Опыт работы</span></div>
								<div class="col"><input type="input" placeholder="Опыт работы" name="practice" value="{{$info->practice}}"></div>
							</div>
							{{-- <div class="profile_form">
								<div class="col"><span class="name"></span></div>
								<div class="col"><input type="input" placeholder="Стаж"></div>
							</div> --}}
							{{-- <div class="col offset-3 remargin">
								<div class="form_btn">
									<img src="{{asset('front3/image/Profile/plus.svg')}}" alt="icon">
										<button>Добавить место работы</button>
								</div>
							</div>	 --}}	
						</div>
								
						<div class="col">
							<div class="profile_form">
								<div class="col"><span class="name">О себе</span></div>
								<div class="col">
									<textarea name="extra">{{$info->extra}}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="profile-section_btn">
						<button>Сохранить изменения</button>
					</div>
				</form>
			</section>

			<section id="content2">
				<div class="tab">
					<table>
						<tr class="txt">
							<th scope="col" class="wid">Критерий</th>
							{{-- <th scope="col" class="cen wid">За сегодня</th> --}}
							{{-- <th scope="col" class="cen wid">За неделю</th> --}}
							{{-- <th scope="col" class="cen wid">За месяц</th> --}}
							<th scope="col" class="cen wid">Количество</th>
						</tr>
						<tr>
						 	<td><img src="{{asset('front3/image/is/1.png')}}" alt="">  Просмотры</td>
						 	<td class="razmer">{{$info->hits}}</td>
						 	{{-- <td class="razmer">51</td> --}}
						 	{{-- <td class="razmer">79</td> --}}
						</tr>
						<tr>
						 	<td><img src="{{asset('front3/image/is/2.png')}}" alt="">  Клики</td>
						 	<td class="razmer">{{$info->telephone_hits}}</td>
						 	{{-- <td class="razmer">34</td> --}}
						 	{{-- <td class="razmer">48</td> --}}
						</tr>
						<tr>
						 	<td><img src="{{asset('front3/image/is/3.png')}}" alt="">  Отзывы</td>
						 	<td class="razmer">{{$info->feedbacks->count()}}</td>
						 	{{-- <td class="razmer">57</td> --}}
						 	{{-- <td class="razmer">36</td> --}}
						</tr>
					   </table>
				</div>
			</section>
		</main>
	</div>
</div>

 	<div class="dm-overlay" id="win1">
        <div class="dm-table">
            <div class="dm-cell">
                <div class="dm-modal">
                	<form role="form" method="post" action="{{route('home.lawyer.services',['id' => $info->id])}}">
                		@csrf
                		<a href="#close" class="close"></a>
	                    <p class="body-title2">Выберите вашу специализацию</p>
	        			<p class="body-text2">Специализация</p>
	         			<ul class="ks-cboxtags">
	    					<li>
	    						@foreach($services as $service)
	    						<input type="checkbox" name="services[]" id="service{{$service->id}}" value="{{$service->id}}" {{in_array($service->id, $info->services()->pluck('id')->toArray()) ? 'checked' : ''}}>
	    						<label for="service{{$service->id}}">{{$service->name_ru}}</label>
	    						@endforeach
	    					</li>
	  					</ul>
	       				<button type="submit" class="butot">Сохранить</button>
	            		<a href="#close">
	            			<button type="button" class="boutcloseot" >Отменить</button>
	            		</a>
                	</form>
        		</div>
            </div>
        </div>
    </div>

</div>

	{{-- <div class="dm-overlay" id="win2">
        <div class="dm-table">
            <div class="dm-cell">
                <div class="dm-modal ">
                    <a href="#close" class="close"></a>
                    <h2 class="otz4">Отзыв о сотрудничестве с Муканов Мурат Муканович </h2>
                    <p class="comne">Оценка по пятибальной шкале</p>
	               	<div class="rating-area">
						<input type="radio" id="star-5" name="rating" value="5">
						<label for="star-5" title="Оценка «5»"></label>	
						<input type="radio" id="star-4" name="rating" value="4">
						<label for="star-4" title="Оценка «4»"></label>    
						<input type="radio" id="star-3" name="rating" value="3">
						<label for="star-3" title="Оценка «3»"></label>  
						<input type="radio" id="star-2" name="rating" value="2">
						<label for="star-2" title="Оценка «2»"></label>    
						<input type="radio" id="star-1" name="rating" value="1">
						<label for="star-1" title="Оценка «1»"></label>
					</div>

					<div class="form-group">
						<p class="comne">Ваш комментарий</p>

					    <textarea class="form-control"></textarea>
					</div>
        			<button type="button" class="butot">Отправить отзыв</button>
                </div>
            </div>
        </div>
    </div> --}}



<!--ИЗМЕНИТЬ ФОТО START-->
 <div class="dm-overlay" id="win3">
 	<form role="form" method="post" action="{{route('home.lawyer.photo',['id' => $info->id])}}" enctype="multipart/form-data">
 		@csrf
 		<div class="dm-table">
	        <div class="dm-cell">
	            <div class="dm-modal">
	                <a href="#close" class="close"></a>
	               	<div class="file-upload">
	  					<div class="file-select">
						    <div class="file-select-button" id="fileName">Выбрать файл</div>
						    <div class="file-select-name" id="noFile">Файл не выбран...</div>
							<input type="file" name="image" id="chooseFile"/>
						</div>
	  					<button type="submit" class="butot_1">Сохранить</button>
					</div>
	            </div>
	        </div>
	    </div>
 	</form>
</div>
<!--ИЗМЕНИТЬ ФОТО END