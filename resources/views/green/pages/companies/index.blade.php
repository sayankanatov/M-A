@extends('green.layouts.main')

@section('content')

@php
use Illuminate\Support\Facades\Input;
@endphp
<!-- Форма -->
@include('green.includes.search-form')
<!--Юридические фирмы в Нур-Султане (Астана) -->
<div class="title">
	<div class="container">
		<div class="head">
			<div class="row">
				<div class="col-sm">
					<a href="{{route('main')}}">Главная</a>
					<span class="head_img"><img src="{{asset('front3/image/2. Main/Arrows1.svg')}}" alt="Стрелка"></span>
					<span class="head_special">Компании</span>
				</div>
			</div>
				<div class="row">
					<div class="col-sm">
						<div class="head_title">
							<h1>{{$h_one ?? $app_h_one}}</h1>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="wrapperss">
							<label class="hidetext" for="button">подробнее</label>
							<input type="checkbox" id="button" class="head_more">
							<div class="xpandable-block">
								{!!$seo_desc ?? null!!}
							</div>
						</div>
					</div>

				</div>
				<div class="row yurists">
					<div class="col-sm-5">
						<span class="dropdown">
							<a href="#" class="js-link">{{app()->getLocale() == 'ru' ? App\Models\Service::first()->name_ru : App\Models\Service::first()->name_kz}}<i class="fa fa-chevron-down"></i></a>
							<ul class="js-dropdown-list">
								@foreach($services as $service)
                                <li>
                                	<a href="{{route('service',['city'=>$city->alias,'id'=>$service->alias])}}">{{app()->getLocale() == 'ru' ? $service->name_ru : $service->name_kz}}
                                	</a>
                                </li>
                            	@endforeach
							</ul>
						</span>
					</div>

					@include('green.includes.filter')

				</div>
			</div>
		</div>
</div>
@if($companies)
<div class="container firms">
	@include('green.includes.companies.desktop')

		<div class="lawyer_btn">
			<img src="{{asset('front3/image/2. Main/Arrows.svg')}}" alt="Стрелки">
			<button id="loadMore">Показать больше</button>
		</div>
</div>
@endif

@endsection
