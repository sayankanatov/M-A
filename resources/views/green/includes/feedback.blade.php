@if(isset($lawyer))
    <div class="dm-overlay" id="win{{$lawyer->id}}">
@elseif(isset($company))
    <div class="dm-overlay" id="win{{$company->id}}">
@endif
		<form class="register-form" method="post" action="{{route('feedback.add')}}">
        @csrf
        @if(isset($lawyer))
            <input type="hidden" name="lawyer_id" value="{{$lawyer->id}}">
        @elseif(isset($company))
            <input type="hidden" name="company_id" value="{{$company->id}}">
        @endif
            <div class="dm-table">
                <div class="dm-cell">
                    <div class="dm-modal ">
                        <a href="#close" class="close"></a>
                        @if(isset($lawyer))
        				<h2 class="otz4">Отзыв о сотрудничестве o {{$lawyer->fullname($lawyer->id)}} </h2>
    				    @elseif(isset($company))
    				    <h2 class="otz4">Отзыв о сотрудничестве o {{$company->name}}</h2>
    				    @endif
                        
                        <p class="comne">Оценка по пятибальной шкале</p>
    	               	<div class="rating-area">
    						<input type="radio" id="star-5" name="rating-star" value="5">
    						<label for="star-5" title="Оценка «5»"></label>
    						<input type="radio" id="star-4" name="rating-star" value="4">
    						<label for="star-4" title="Оценка «4»"></label>
    						<input type="radio" id="star-3" name="rating-star" value="3">
    						<label for="star-3" title="Оценка «3»"></label>
    						<input type="radio" id="star-2" name="rating-star" value="2">
    						<label for="star-2" title="Оценка «2»"></label>
    						<input type="radio" id="star-1" name="rating-star" value="1">
    						<label for="star-1" title="Оценка «1»"></label>
    					</div>

    					<div class="form-group">
    						<p class="comne">Ваш комментарий</p>

    					    <textarea class="form-control" name="text"></textarea>
    					</div>
            			<button type="submit" class="butot">Отправить отзыв</button>
                    </div>
                </div>
            </div>
        </form>
    </div>