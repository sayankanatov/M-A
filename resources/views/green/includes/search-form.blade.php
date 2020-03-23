<div class="form">
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<form class="catalin" action="{{route('search')}}" method="post">
					@csrf
					<input type="hidden" name="city" value="{{$city->alias}}">
					<input type="text" placeholder="Юрист, фирма или услуга" name="search" required>
					<button type="submit">Найти</button>
				</form>
			</div>
		</div>
	</div>
</div>