@extends('green.layouts.main')

@section('content')

<div class="container">
  	<h1 style="text-align: center;">{{$news->title}}</h1>
	<div class="cs-blog-detail">
    	{{-- <div class="cs-main-post">
        	<figure>
        		<img onload="pagespeed.CriticalImages.checkImageForCriticality(this);" data-pagespeed-url-hash="2714250504" alt="jobline-blog (8)" src="/{{$news->image}}">
        	</figure>
    	</div> --}}
    	<div class="cs-post-title">
     		<div class="post-option">
            	<span class="post-date">
            		<a><i class="cs-color icon-calendar6"></i>{{Carbon\Carbon::parse($news->date)->format('Y-m-d')}}</a>
            	</span>
        	</div>
    	</div>
    	<div class="cs-post-option-panel">
        	<div class="rich-editor-text">
	            {!!$news->text!!}
        	</div>
    	</div>
    	{{-- <div class="cs-tags">
        	<div class="tags">
            	<span>Теги</span>
            	<ul>
	                <li><a rel="tag" href="index.html">Юристы</a></li>
	                <li><a rel="tag" href="index.html">Юристы</a></li>
	                <li><a rel="tag" href="index.html">Юристы</a></li>
	                <li><a rel="tag" href="index.html">Юристы</a></li>
            	</ul>
        	</div>
    	</div> --}}
   		<div id="share">
			<div class="like">Понравилось? Поделитесь с друзьями!</div>
			<div class="social" data-url="<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" data-title="Стильные кнопки поделится всоц сетях без испольбзования сторонних сервисов">
				<a class="push facebook" data-id="fb"><i class="fa fa-facebook"></i> Facebook</a>
				<a class="push vkontakte" data-id="vk"><i class="fa fa-vk"></i> Вконтакте</a>
			    <a class="push ok" data-id="ok"><i class="fa fa-odnoklassniki"></i> OK</a>		
				<a class="push twitter" data-id="tw"><i class="fa fa-twitter"></i> Twitter</a>
				<a class="push google" data-id="gp"><i class="fa fa-google-plus"></i> Google+</a>
				<a class="push pinterest" data-id="pin"><i class="fa fa-pinterest"></i> Pinterest </a>
				<a class="push viber" data-id="viber"><i class="fa fa-phone"></i> Viber </a>
			</div>
		</div>
	</div>
</div>

@endsection