@extends('layouts.category')

@section('content')

@if(Session::has('message'))
    <div role="alert" class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        <i class="fa fa-check-circle"></i>{!! Session::get('message') !!}
    </div>
@endif
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="content">
        
        <div class="register_page">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <div class="register_form">
                            <div class="content_list-item-title content_list-item-title-center">
                                Регистрация
                            </div>
                            <form class="register-form" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form_reg_list">
                                    <div class="form_reg_list-title">
                                        1.   Выберите пункт под каким лицом Вы хотите зарегистрироваться?
                                    </div>
                                    <div class="form_reg_list-check">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form_reg_list-radio">
                                                    <input type="radio" class="input-linck physical-linck" id="physical-1" data-face="physical" name="role" checked="checked" value="{{Config::get('constants.roles.individual')}}">
                                                    <label for="physical-1">
                                                        <span></span>
                                                        физическое лицо
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form_reg_list-radio">
                                                    <input type="radio" class="input-linck physical-linck" id="physical-2" data-face="legal" name="role" value="{{Config::get('constants.roles.entity')}}">
                                                    <label for="physical-2">
                                                        <span></span>
                                                        юридическое лицо
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form_reg_list-radio">
                                                    <input type="radio" class="input-linck physical-linck" id="physical-3" data-face="company" name="role" value="{{Config::get('constants.roles.company')}}">
                                                    <label for="physical-3">
                                                        <span></span>
                                                        компания
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="form_reg_list-display form_reg_list-physical form_reg_list-active">
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                2. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="last_name{{Config::get('constants.roles.individual')}}" value="" placeholder="Фамилия">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                3. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="first_name{{Config::get('constants.roles.individual')}}" value="" placeholder="Имя">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                4. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="patronymic{{Config::get('constants.roles.individual')}}" value="" placeholder="Отчество">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                5. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="telephone{{Config::get('constants.roles.individual')}}" value="" placeholder="Телефон">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                6. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="email" class="input-linck" name="email{{Config::get('constants.roles.individual')}}" value="" placeholder="Эл. почта">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                7. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <select name="city_id{{Config::get('constants.roles.individual')}}">
                                                    <option disabled>Выберите город</option>
                                                @foreach(App\Models\City::all() as $city)
                                                    <option value="{{$city->id}}">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}</option>
                                                @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                8. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="password{{Config::get('constants.roles.individual')}}" value="" placeholder="Пароль">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                9. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="password" class="input-linck" name="password_confirmation{{Config::get('constants.roles.individual')}}" value="" placeholder="Повторите пароль">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="form_reg_list-display form_reg_list-legal">
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                2. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="last_name{{Config::get('constants.roles.entity')}}" value="" placeholder="Фамилия">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                3. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="first_name{{Config::get('constants.roles.entity')}}" value="" placeholder="Имя">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                4. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="patronymic{{Config::get('constants.roles.entity')}}" value="" placeholder="Отчество">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                5. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="telephone{{Config::get('constants.roles.entity')}}" value="" placeholder="Телефон">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                6. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="email" class="input-linck" name="email{{Config::get('constants.roles.entity')}}" value="" placeholder="Эл. почта">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                7. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <select name="city_id{{Config::get('constants.roles.entity')}}">
                                                    <option disabled>Выберите город</option>
                                                @foreach(App\Models\City::all() as $city)
                                                    <option value="{{$city->id}}">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                8. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="password{{Config::get('constants.roles.entity')}}" value="" placeholder="Пароль">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                9. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="password" class="input-linck" name="password_confirmation{{Config::get('constants.roles.entity')}}" value="" placeholder="Повторите пароль">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="form_reg_list-display form_reg_list-company">
                                    
                                    
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                5. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="name{{Config::get('constants.roles.company')}}" value="" placeholder="Название компании">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                6. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="telephone{{Config::get('constants.roles.company')}}" value="" placeholder="Телефон">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                7. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="email" class="input-linck" name="email{{Config::get('constants.roles.company')}}" value="" placeholder="Эл. почта">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                8. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <select name="city_id{{Config::get('constants.roles.company')}}">
                                                    <option disabled>Выберите город</option>
                                                @foreach(App\Models\City::all() as $city)
                                                    <option value="{{$city->id}}">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                9. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="text" class="input-linck" name="password{{Config::get('constants.roles.company')}}" value="" placeholder="Пароль">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_reg_list">
                                        <div class="form_reg_list-block">
                                            <div class="form_reg_list-number">
                                                10. 
                                            </div>
                                            <div class="form_reg_list-input">
                                                <input type="password" class="input-linck" name="password_confirmation{{Config::get('constants.roles.company')}}" value="" placeholder="Повторите пароль">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form_reg_submit">
                                    <input type="submit" class="input-linck popap_linck" value="Оставить заявку">
                                </div>
                                
                            </form>


                        </div>

                    </div>

                </div>
            </div>
        </div>
        
    </div>
@endsection
