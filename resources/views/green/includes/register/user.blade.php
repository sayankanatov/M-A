<form method="POST" action="{{ route('register') }}">
    @csrf
	<div class="form">
		<label></label>
		<input type="Name" class="" placeholder="Имя" name="first_name{{Config::get('constants.roles.individual')}}">
	</div>
	<div class="form">
		<label></label>
		<input type="email" placeholder="Эл почта" name="email{{Config::get('constants.roles.individual')}}">
	</div>
	<div class="form">
		<label></label>
		<input type="password" placeholder="Пароль" name="password{{Config::get('constants.roles.individual')}}">
	</div>
	<div class="form">
		<label></label>
		<input type="password" placeholder="Повторите пароль" name="password_confirmation{{Config::get('constants.roles.individual')}}">
	</div>
	<div class="form-check">
		<input type="checkbox" id="check{{Config::get('constants.roles.individual')}}" name="check{{Config::get('constants.roles.individual')}}">
		<label for="check1">Даю согласие на обработку персональных данных</label>
	</div>
	<div class="form_btn">
		<button type="submit" name="submit{{Config::get('constants.roles.individual')}}">Зарегистрироваться</button>
	</div>
</form>