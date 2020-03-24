<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="{{asset('front3/css/normalize.css')}}">
		<link rel="stylesheet" href="{{asset('front3/css/main.css')}}">
		<link rel="stylesheet" href="{{asset('front3/css/bootstrap-grid.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>{{$seo_title ?? $app_seo_title}}</title>
		<meta name="description" content="{{$seo_desc ?? $app_seo_desc}}">
	    <meta name="keywords" content="{{$seo_keywords ?? $app_seo_keywords}}">

	    <meta property="og:site_name" content="Yuristy.kz">
	    <meta property="og:locale" content="ru_RU">
	    <meta property="og:title" content="{{$seo_title ?? $app_seo_title}}">
	    <meta property="og:description" content="{{$seo_desc ?? $app_seo_desc}}">
	    <meta property="og:image" content="{{asset('front2/img/logo.jpg')}}">
	    <meta property="og:url" content="{{Request::url()}}">
	    <link href="{{Request::url()}}" rel="canonical">
		<script>
			var jQueryroot = jQuery("html, body");
			jQuery('a[href*="#"]').click(function (event) {
				if (jQuery.attr(this, "href") == "#") {
					event.preventDefault();
				} else {
					jQueryroot.animate(
						{
							scrollTop: jQuery(jQuery.attr(this, "href")).offset().top
						},
						1000
					);
				}

				return false;
			});
		</script>
	</head>
<body>
	<!-- новая модалка -->
	<div class="boo-navbar">
		<div class="container">
			<!-- Mobile -->
			<div class="boo-nav-collapsed">
				<a href="{{route('main')}}">
					<img class="mobile-logo" src="{{asset('front3/image/Main/image 1.svg')}}" alt="Logo" />
				</a>
				<button class="boo-nav-toggle">
					<!-- <i class="fa fa-fw fa-bars"></i> -->
					<div class="content">
						<div class="hamburger">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</button>
			</div>
			<!-- Brand -->
			<div class="boo-nav-brand">
				<a href="{{route('main')}}">
					<img src="{{asset('front3/image/Main/image 1.svg')}}" alt="Logo" />
				</a>
			</div>
			@if($cities)
			<div class="dropdown">
				@if($city)
				<div class="select">
					<span class="boo-nav-city ">{{app()->getLocale() == 'ru' ? $city->name_ru : $city->name_kz}}<img src="{{asset('front3/image/Main/Icon.svg')}}" alt="Стрелка"></span>
				</div>
				@endif
				<ul class="dropdown-menu">
					@foreach($cities as $c)
					<li>
						<a href="{{route('city',['city'=>$c->alias])}}">
						<span class="boo-nav-city ">{{app()->getLocale() == 'ru' ? $c->name_ru : $c->name_kz}}<img src="{{asset('front3/image/Main/Icon.svg')}}"
								alt="Стрелка"></span>
							</a>
					</li>
					@endforeach
				</ul>
			</div>
			@endif          
			<!-- Nav items -->
			<div class="boo-nav-collapse">
				<ul class="boo-nav-items">
					<li><a href="{{route('lawyers',['city'=>$city->alias])}}">Специалисты</a></li>
					<li><a href="{{route('companies',['city'=>$city->alias])}}">Юридические компании</a></li>
					<li><a href="#">Нотариусы</a></li>
					<li><a href="{{route('news')}}">Полезное</a></li>
					@auth
					<li><a href="{{route('home')}}" class="nav_btn btn_stroke ">Личный кабинет</a></li>
					@else
					<li><span id="show-modal2" class="nav_btn btn_stroke ">Вход</span></li>
					<li><span id="show-modal" class="nav_btn btn_fill ">Регистрация</span></li>
					@endauth
				</ul>
			</div>
		</div>
	</div>
	
	@include('green.includes.register')
	@include('green.includes.login')

	@yield('content')

	@include('green.includes.footer')

	<script src="{{asset('front3/js/jquery-3.4.0.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('front3/slick/slick.css')}}">
	<link rel="stylesheet" href="{{asset('front3/slick/slick-theme.css')}}">
	<script src="{{asset('front3/js/script.js')}}"></script>
	<script src="{{asset('front3/slick/slick.min.js')}}"></script>

</body>

</html>