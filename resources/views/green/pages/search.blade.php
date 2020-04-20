@extends('green.layouts.main')

@section('content')

@php
use Illuminate\Support\Facades\Input;
@endphp
<!-- Форма -->
@include('green.includes.search-form')
<!--Юристы и адвокаты в Нур-Султане (Астана) -->
<div class="title">
	<div class="container">
		<div class="head">
			<div class="row">
				<div class="col-sm">
					<a href="{{route('main')}}">Главная</a>
				<span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка"></span>
				<span class="head_special">Поиск</span></div>
			</div>
			<div class="row">
				<div class="col-sm">
					<div class="head_title">
						<h1>{{$h_one ?? $app_h_one}}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@if($result)
<!-- Карточки юристов -->
<section class=" container low_2">

	@include('green.includes.lawyers.desktop')

	<div class="lawyer_btn">
		<img src="{{asset('front3/image/2. Main/Arrows.svg')}}" alt="Стрелки">
		<button id="loadMore">Показать больше</button>
	</div>

</section>

</div>
@else
	<div class="not-found">Ничего не найдено по вашему запросу</div>
@endif

@endsection
