@extends('green.layouts.main')

@section('content')

<div class="container">
	<div>
		<h1 style="text-align: center;">Полезные статьи</h1>
		<div class="wrap1">
		   	<div class="search1">
		   		<form action="{{route('news.search')}}" method="post">
		   			@csrf
		   			<input type="text" class="searchTerm" placeholder="Поиск записи">
			      	<button type="submit" class="searchButton1">
			        	<i class="fa fa-search"></i>
			     	</button>
		   		</form>
		   </div>
		</div>
	</div>

@if($news)
	<div class="news-block">
		<div class="news-block__wrap">
		@foreach($news as $item)
			<div class="news-block__item">
				<a href="{{route('news.show',['alias' => $item->alias])}}" class="news-block__img">
					<img src="/{{$item->image}}" alt="{{$item->title}}">
				</a>
				<a href="{{route('news.show',['alias' => $item->alias])}}" class="news-block__title">
					<h3>{{$item->title}}</h3>
					
				</a>
				<div class="date">{{$item->created_at}}
					<a href="{{route('news.show',['alias' => $item->alias])}}">
						<button class="butpod">Читать</button>
					</a>
				</div>
			</div>
		@endforeach	
		</div>
	</div>
{{-- 
	<div class="lawyer_btn">
		<img src="{{asset('front3/image/2. Main/Arrows.svg')}}" alt="Стрелки">
		<button id="loadMore" >Показать больше</button>
	</div> --}}
@endif
</div>

@endsection