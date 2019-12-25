<footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="header_left">
                            <div class="logo_block">
                                <a href="{{route('main')}}" class="logo" title="">
                                    <img src="{{asset('front2/img/logo.png')}}" title="{{asset('front2/img/logo.png')}}" alt="{{asset('front2/img/logo.png')}}">
                                </a>
                            </div>
            
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-6 col-md-6">

                        <div class="footer_right">
                            <div class="footer_menu">
                                <div class="menu">
                                    <li><a href="{{route('lawyers',['city'=>$city->alias])}}">Специалисты</a></li>
                                    <li><a href="#">Нотариусы</a></li>
                                    <li><a href="{{route('companies',['city'=>$city->alias])}}">Юридические компании</a></li>
                                </div>
                            </div>
                    
                            <div class="header_right">
                                <div class="header_right-block">
                                    <a class="header_btn header_btn_login md-trigger" data-modal="formlogin">
                                        Вход
                                    </a>
                                    <a class="header_btn header_btn_reg md-trigger" data-modal="formregistr">
                                        <img src="{{asset('front2/img/register-f.png')}}" alt=""> Регистрация 
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="footer_right-bottom_block">
                            <div class="footer_right-bottom">
                                <div class="footer_right-contacts">
                                    По всем вопросам пишите нам на почту <a href="mailto:info@yuristy.kz">info@yuristy.kz</a>
                                </div>
                            </div>

                            <div class="footer_right-bottom">
                                <a href="https://www.instagram.com/yuristy_kz/">
                                    <img src="{{asset('front2/img/instagram.svg')}}" alt="">
                                </a>
                                <a href="https://www.facebook.com/yuristy.kz/">
                                    <img src="{{asset('front2/img/facebook.svg')}}" alt="">
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </footer>