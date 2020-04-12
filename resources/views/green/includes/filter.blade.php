<div class="col-sm">
	<div class="head_sort">Сортировать по:</div>
	
	@if(\Route::currentRouteName() == 'lawyers')
		<form action="{{route('lawyers',['city' =>$city->alias,'sort' => 'rating'])}}">
	@else
		<form action="{{route('companies',['city' =>$city->alias,'sort' => 'rating'])}}">
	@endif

	@csrf
		<span class=" head_sort head_sort-info">
			<span class="select-wrapper">
				<select name="rating" id="rating" class="select select-rating">
					<img src="{{asset('front3/image/2. Main/Arrows3.svg')}}" alt="Стрелка">
					<option value="1">Рейтинг</option>
					<option value="2">10</option>
					<option value="3">20</option>
				</select>
			</span>
			<span class="select-wrapper">
				<select name="reviews" id="select" class="select select-reviews ">
					<option value="1">Кол-во отзывов <img src="{{asset('front3/image/2. Main/Arrows3.svg')}}" alt="Стрелка"> </option>
					<option value="2">10</option>
					<option value="3">20</option>
				</select>
			</span>
			<span class="select-wrapper">
				<select name="free" id="select" class="select select-consultation ">
					<option value="1">Бесплатная консультация
					<img src="{{asset('front3/image/2. Main/Arrows3.svg')}}" alt="Стрелка"> </option>
					<option value="1">Есть</option>
					<option value="0">Нет</option>
				</select>
			</span>
		</span>
		<button type="submit">Применить</button>
	</form>
</div>