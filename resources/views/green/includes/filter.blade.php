<div class="col-sm">
	<div class="head_sort">Сортировать по:</div>
	<form action="{{route('lawyers',['city' =>$city->alias,'sort' => 'rating'])}}">
	@csrf
		<span class=" head_sort head_sort-info">
			<span class="select-wrapper">
				<select name="select" id="select" class="select  select-rating ">
					<img src="image/2. Main/Arrows3.svg" alt="Стрелка">
								<option value="1">Рейтинг</option>
								<option value="2">10</option>
								<option value="3">20</option>
				</select>
			</span>
			<span class="select-wrapper">
				<select name="select" id="select" class="select select-reviews ">
					<option value="1">Кол-во отзывов <img src="image/2. Main/Arrows3.svg" alt="Стрелка"> </option>
					<option value="2">10</option>
					<option value="3">20</option>
				</select>
			</span>
			<span class="select-wrapper">
				<select name="select" id="select" class="select select-consultation ">
					<option value="1">Бесплатная консультация<img src="image/2. Main/Arrows3.svg" alt="Стрелка"> </option>
					<option value="2">Есть</option>
					<option value="3">Нет</option>
				</select>
			</span>
		</span>
	</form>
</div>