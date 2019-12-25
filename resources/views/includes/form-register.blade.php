@if(Session::has('message'))
    <div role="alert" class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        <i class="fa fa-check-circle"></i>{!! Session::get('message') !!}
    </div>
@endif
<div class="md-modal md-effect-1" id="formregistr">
        <button class="md-close "> </button>
        <div class="md-content">
            <div class="formregistr_body">

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
                                            <input type="radio" class="input-linck physical-linck" id="physical-{{Config::get('constants.roles.individual')}}" data-face="physical" name="role" checked="checked" value="{{Config::get('constants.roles.individual')}}">
                                            <label for="physical-1">
                                                <span></span>
                                                физическое лицо
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form_reg_list-radio">
                                            <input type="radio" class="input-linck physical-linck" id="physical-{{Config::get('constants.roles.entity')}}" data-face="legal" name="role" value="{{Config::get('constants.roles.entity')}}">
                                            <label for="physical-2">
                                                <span></span>
                                                юрист / адвокат
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form_reg_list-radio">
                                            <input type="radio" class="input-linck physical-linck" id="physical-{{Config::get('constants.roles.company')}}" data-face="company" name="role" value="{{Config::get('constants.roles.company')}}">
                                            <label for="physical-3">
                                                <span></span>
                                                юридическая компания
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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
                                            <option disabled="disabled">Выберите город</option>
                                        @foreach(App\Models\City::all() as $city)
                                            <option value="{{$city->id}}">
                                                {{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}
                                            </option>
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
                                            <option disabled="">Выберите город</option>
                                        @foreach(App\Models\City::all() as $city)
                                            <option value="{{$city->id}}">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if($services)
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        6. 
                                    </div>
                                    <div class="form_reg_list-input">
                                        <select name="specialization{{Config::get('constants.roles.entity')}}">
                                            <option disabled="disabled">Выберите специализацию</option>
                                            @foreach($services as $service)
                                            <option value="{{$service->id}}">
                                                {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        9. 
                                    </div>
                                    <div class="form_reg_list-input">
                                        <input type="text" class="input-linck" name="password{{Config::get('constants.roles.entity')}}" value="" placeholder="Пароль">
                                    </div>
                                </div>
                            </div>
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        10. 
                                    </div>
                                    <div class="form_reg_list-input">
                                        <input type="password" class="input-linck" name="password_confirmation{{Config::get('constants.roles.entity')}}" value="" placeholder="Повторите пароль">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form_reg_list-display form_reg_list-company">
                            
                            
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        2. 
                                    </div>
                                    <div class="form_reg_list-input">
                                        <input type="text" class="input-linck" name="name{{Config::get('constants.roles.company')}}" value="" placeholder="Название компании">
                                    </div>
                                </div>
                            </div>
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        3. 
                                    </div>
                                    <div class="form_reg_list-input">
                                        <input type="text" class="input-linck" name="telephone{{Config::get('constants.roles.company')}}" value="" placeholder="Телефон">
                                    </div>
                                </div>
                            </div>
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        4. 
                                    </div>
                                    <div class="form_reg_list-input">
                                        <input type="email" class="input-linck" name="email{{Config::get('constants.roles.company')}}" value="" placeholder="Эл. почта">
                                    </div>
                                </div>
                            </div>
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        5. 
                                    </div>
                                    <div class="form_reg_list-input">
                                        <select name="city_id{{Config::get('constants.roles.company')}}">
                                            <option disabled="">Выберите город</option>
                                        @foreach(App\Models\City::all() as $city)
                                            <option value="{{$city->id}}">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if($services)
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        6. 
                                    </div>
                                    <div class="form_reg_list-input">
                                        <select name="specialization{{Config::get('constants.roles.company')}}">
                                            <option disabled="disabled">Выберите специализацию</option>
                                            @foreach($services as $service)
                                            <option value="{{$service->id}}">
                                                {{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form_reg_list">
                                <div class="form_reg_list-block">
                                    <div class="form_reg_list-number">
                                        7. 
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


                        <div class="form_reg_list">
                            <div class="form_reg_list-block">
                                <div class="form_reg_list-number">
                                     
                                </div>
                                <div class="form_reg_list-input">
                                    <div class="form_reg_list-radio form_reg_list-checkbox">
                                        <input type="checkbox" class="input-linck physical-linck consent-linck" id="consent" data-face="legal" name="agree">
                                        <label for="consent">
                                            <span></span>
                                            Даю согласие на сбор и обработку персональных данных
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_reg_submit">
                            <input type="submit" class="input-linck popap_linck" value="Зарегистрироваться">
                        </div>
                        
                    </form>


                </div>

            </div>
        </div>
    </div>