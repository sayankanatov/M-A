<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="header_left">
                <div class="logo">
                    <a href="/">
                        <img src="{{asset('front/img/footer-logo.png')}}" alt="">
                    </a>
                </div>
                <div class="footer_menu">
                    <ul class="menu">
                        <li><a href="{{route('lawyers',['city'=>$city->alias])}}">Специалисты</a></li>
                        <li><a href="{{route('services',['city'=>$city->alias])}}">Услуги</a></li>
                        <li><a href="{{route('companies',['city'=>$city->alias])}}">Юридические компании</a></li>
                    </ul>
                </div>
            </div>
            <div class="header_right">
                <a href="{{route('login')}}" class="login login_block">
                    <img src="{{asset('front/img/friends.png')}}" alt="">
                        Вход
                </a>
                <a href="{{route('register')}}" class="register login_block">
                    <img src="{{asset('front/img/voter.png')}}" alt="">
                        Регистрация 
                </a>
            </div>
        </div>
    </div>
</footer>