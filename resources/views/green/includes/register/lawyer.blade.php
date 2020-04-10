<form method="POST" action="{{ route('register') }}">
	@csrf
	<div class="form">
		<label for=""></label>
		<input type="surname" class="" placeholder="Фамилия" name="last_name{{Config::get('constants.roles.entity')}}">
	</div>
	<div class="form">
		<label for=""></label>
		<input type="name" placeholder="Имя" name="first_name{{Config::get('constants.roles.entity')}}">
	</div>
	<div class="form">
		<label for=""></label>
		<input type="middlename" placeholder="Отчество" name="patronymic{{Config::get('constants.roles.entity')}}">
	</div>

	<div class="form">
		<label for=""></label>
		<input type="phone" class="" placeholder="Телефон" name="telephone{{Config::get('constants.roles.entity')}}">
	</div>
	<div class="form">
		<label for=""></label>
		<input type="email" placeholder="Эл почта" name="email{{Config::get('constants.roles.entity')}}">
	</div>

	<div class="form">
		<label for=""></label>
		<select id="my-select-city" name="city_id{{Config::get('constants.roles.entity')}}">
			@foreach(App\Models\City::all() as $city)
               <option value="{{$city->id}}">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}</option>
               @endforeach
		</select>
	</div>
	@if($services)
	<div class="form">
		<label for=""></label>
		<select id="my-select-spec" name="specialization{{Config::get('constants.roles.entity')}}">
			<option value="">Специализация</option>
			@foreach($services as $service)
			<option value="{{$service->id}}">
                {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}
            </option>
            @endforeach
		</select>
	</div>
	@endif
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
		<input type="password" placeholder="Пароль" name="password{{Config::get('constants.roles.entity')}}">
	</div>
	<div class="form">
		<label for=""></label>
		<input type="password" placeholder="Повторите пароль" name="password_confirmation{{Config::get('constants.roles.entity')}}">
	</div>
	<div class="form-check">
		<input type="checkbox" id="check2" name="check{{Config::get('constants.roles.entity')}}">
		<label for="check2">Даю согласие на обработку персональных данных</label>
	</div>
	<div class="form_btn"><button type="submit" name="submit{{Config::get('constants.roles.entity')}}">Зарегистрироваться</button></div>
</form>