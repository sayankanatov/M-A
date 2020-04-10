<form method="POST" action="{{ route('register') }}">
	@csrf
	<div class="form">
		<label for=""></label>
		<input type="Name-firm" class="" placeholder="Название компании" name="name{{Config::get('constants.roles.company')}}">
	</div>
	<div class="form">
		<label for=""></label>
		<input type="phone" class="" placeholder="Телефон" name="telephone{{Config::get('constants.roles.company')}}">
	</div>
	<div class="form">
		<label for=""></label>
		<input type="email" placeholder="Эл почта" name="email{{Config::get('constants.roles.company')}}">
	</div>
	<div class="form">
		<label for=""></label>
		<select id="my-select-city" name="city_id{{Config::get('constants.roles.company')}}">
			@foreach(App\Models\City::all() as $city)
            <option value="{{$city->id}}">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}</option>
            @endforeach
		</select>
	</div>
	<div class="form">
		<label for=""></label>

		<select id="my-select-spec" name="specialization{{Config::get('constants.roles.company')}}">
			@foreach($services as $service)
	        <option value="{{$service->id}}">
	            {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}
	        </option>
	        @endforeach
		</select>
	</div>
									{{-- <div class="modal_special">
										<span class="modal_special-cadr">
											Уголовное право <button>Удалить</button>
										</span>
										<span class="modal_special-cadr">
											Административное право <button>Удалить</button>
										</span>
									</div> --}}
	<div class="form">
		<label for=""></label>
		<input type="password" placeholder="Пароль" name="password{{Config::get('constants.roles.company')}}">
	</div>
	<div class="form">
		<label for=""></label>
		<input type="password" placeholder="Повторите пароль" name="password_confirmation{{Config::get('constants.roles.company')}}">
	</div>
	<div class=" form-check">
		<input type="checkbox" id="check3" name="check{{Config::get('constants.roles.company')}}">
		<label for="check3">Даю согласие на обработку персональных данных</label>
	</div>
	<div class="form_btn">
		<button type="submit" class="">Зарегистрироваться</button>
	</div>
</form>