<div class="mo2">
	<div class="content2"></div>
	<div class="modal-bg2">
		<div class="modal2">
			<div class="modal-close2"></div>
			<div class="modal_heder">Вход</div>
			<div class="wrapper">
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<div class="form">
						<div class="form">
							<label for=""></label>
							<input type="email" placeholder="Эл почта" required class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
							@if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
						</div>
						<div class="form">
							<label for=""></label>
							<input type="password" placeholder="Пароль" required class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
							@if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
						</div>
							
						<div class="form_btn">
							<button type="submit">Войти</button>
						</div>
					</div>
				</form>
				<div class="model_social">
					<div class="model_social-title">Войти через соцсети</div>
					<div class="model_social-img">
						<img src="{{asset('front3/image/Modal/Icon_google.svg')}}" alt="Google">
						<img src="{{asset('front3/image/Modal/Icon_fb.svg')}}" alt="Google">
						<img src="{{asset('front3/image/Modal/Icon_vk.svg')}}" alt="Google">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>