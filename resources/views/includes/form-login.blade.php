<div class="md-modal md-effect-1" id="formlogin">
        <button class="md-close "> </button>
        <div class="md-content">
            <div class="formlogin_body">
                <div class="formlogin_form">
                    <div class="content_list-item-title content_list-item-title-center">
                        Авторизация
                    </div>
                    <form class="register-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form_reg_list-display form_reg_list-physical form_reg_list-active">

                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-input">
                                        <input type="text" required class="input-linck{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-input">
                                        <input type="password" required class="input-linck{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" placeholder="Пароль">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-input">
                                        <div class="form_reg_list-radio form_reg_list-checkbox">
                                            <input type="checkbox" class="input-linck physical-linck consent-linck" id="consent" data-face="legal" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="consent">
                                                <span></span>
                                                Запомнить меня
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="form_reg_submit form_reg_submit-linck-block">
                                <input type="submit" class="input-linck popap_linck" value="Войти">
                                <a href="{{ route('password.request') }}" class="form_reg_submit-link">Забыли пароль?</a>
                            </div>
                            @endif
                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>