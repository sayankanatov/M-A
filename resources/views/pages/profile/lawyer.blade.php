<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="content_item-left">
                <div class="content_item_img">
                    <img src="{{$info->image ? $info->image : asset('front2/img/spec-item.png')}}" alt="" width="150" height="150">
                </div>
                <a id="modal-444213" href="#modal-container-444213" role="button" class="btn" data-toggle="modal" style="margin-left: 33%;">Изменить</a>
            
                <div class="modal fade" id="modal-container-444213" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Изменить фотографию
                                </h5> 
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form role="form" method="post" action="{{route('home.lawyer.photo',['id' => $info->id])}}" enctype="multipart/form-data">
                            <div class="modal-body">
                                
                                    @csrf
                                    <input type="file" class="form-control" name="image" value="Изменить" />
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    Изменить
                                </button> 
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Закрыть
                                </button>
                            </div>
                            </form> 
                        </div>
                        
                    </div>
                    
                </div>             
            </div>
        </div>
        <div class="col-md-3">
            <div class="content_item_rev-linck">
                <h5>{{$info->last_name}} {{$info->first_name}}<br>{{$info->patronymic}}
                </h5>
            </div>

            <div class="content_item_rev-linck">
                Рейтинг <a href="{{route('lawyer',['id' => $info->alias,'city' => $city->alias])}}">12 Отзывов</a> 9.1
            </div>
            <div class="stars">
                <input type="radio" name="rating-star" class="rating__control" id="rc1">
                <input type="radio" name="rating-star" class="rating__control" id="rc2">
                <input type="radio" name="rating-star" class="rating__control" id="rc3">
                <input type="radio" name="rating-star" class="rating__control" id="rc4">
                <input type="radio" name="rating-star" class="rating__control" id="rc5">
                <label for="rc1" class="rating__item">
                    <svg class="rating__star">
                        <use xlink:href="#star"></use>
                    </svg>
                    <span class="rating__label">1</span>
                </label>
                <label for="rc2" class="rating__item">
                    <svg class="rating__star">
                        <use xlink:href="#star"></use>
                    </svg>
                    <span class="rating__label">2</span>
                </label>
                <label for="rc3" class="rating__item">
                    <svg class="rating__star">
                        <use xlink:href="#star"></use>
                    </svg>
                    <span class="rating__label">3</span>
                </label>
                <label for="rc4" class="rating__item">
                    <svg class="rating__star">
                    <use xlink:href="#star"></use>
                    </svg>
                    <span class="rating__label">4</span>
                </label>
                <label for="rc5" class="rating__item">
                    <svg class="rating__star">
                    <use xlink:href="#star"></use>
                    </svg>
                    <span class="rating__label">5</span>
                </label>    
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                <symbol id="star" viewBox="0 0 26 28">
                    <path d="M26 10.109c0 .281-.203.547-.406.75l-5.672 5.531 1.344 7.812c.016.109.016.203.016.313 0 .406-.187.781-.641.781a1.27 1.27 0 0 1-.625-.187L13 21.422l-7.016 3.687c-.203.109-.406.187-.625.187-.453 0-.656-.375-.656-.781 0-.109.016-.203.031-.313l1.344-7.812L.39 10.859c-.187-.203-.391-.469-.391-.75 0-.469.484-.656.875-.719l7.844-1.141 3.516-7.109c.141-.297.406-.641.766-.641s.625.344.766.641l3.516 7.109 7.844 1.141c.375.063.875.25.875.719z"/>
                </symbol>
            </svg>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable" id="tabs-338158">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab1" data-toggle="tab">Управлением профилем</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab2" data-toggle="tab">Статистика</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">

        <div class="col-lg-6 center">
            <form role="form" action="{{route('home.lawyer.update',['id' => $info->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Фамилия</label>
                    <input type="text" class="form-control" name="last_name" value="{{$info->last_name}}" />
                </div>

                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control" name="first_name" value="{{$info->first_name}}"/>
                </div>

                <div class="form-group">
                    <label>Отчество</label>
                    <input type="text" class="form-control" name="patronymic" value="{{$info->patronymic}}" />
                </div>

                <div class="form-group">
                    <label>Телефон</label>
                    <input type="text" class="form-control" name="telephone" value="{{$info->telephone}}"/>
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{$info->email}}" />
                </div>

                <div class="form-group">
                    <label>Город</label>
                    <select class="form-control" name="city_id" value="{{$info->city_id}}">
                        <option>Выберите свой город</option>
                    @foreach($cities as $c)
                        <option value="{{$c->id}}" {{$c->id == $info->city_id ? 'selected' : ''}}>{{$c->name_ru}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Стаж</label>
                    <input type="text" class="form-control" name="work_experience" value="{{$info->work_experience}}" />
                </div>

                <div class="form-group">
                    <label>Адрес</label>
                    <input type="text" class="form-control" name="address" value="{{$info->address}}"/>
                </div>

                <div class="form-group">
                    <label>График работы</label>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" name="monday" {{$info->monday ? 'checked' : ''}}>
                        </div>
                      </div>
                      <input type="text" class="form-control" disabled="disabled" value="Понедельник">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" name="tuesday" {{$info->tuesday ? 'checked' : ''}}>
                        </div>
                      </div>
                      <input type="text" class="form-control" disabled="disabled" value="Вторник">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" name="wednesday" {{$info->wednesday ? 'checked' : ''}}>
                        </div>
                      </div>
                      <input type="text" class="form-control" disabled="disabled" value="Среда">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" name="thursday" {{$info->thursday ? 'checked' : ''}}>
                        </div>
                      </div>
                      <input type="text" class="form-control" disabled="disabled" value="Четверг">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" name="friday" {{$info->friday ? 'checked' : ''}}>
                        </div>
                      </div>
                      <input type="text" class="form-control" disabled="disabled" value="Пятница">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" name="saturday" {{$info->saturday ? 'checked' : ''}}>
                        </div>
                      </div>
                      <input type="text" class="form-control" disabled="disabled" value="Суббота">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" name="sunday" {{$info->sunday ? 'checked' : ''}}>
                        </div>
                      </div>
                      <input type="text" class="form-control" disabled="disabled" value="Воскресенье">
                    </div>

                </div>

                <div class="form-group">
                    <label>О себе</label>
                    <textarea class="form-control" name="extra" value="{{$info->extra}}"></textarea>
                </div>

                <div class="form-group">
                    <label>Образование</label>
                    <textarea class="form-control" name="education" value="{{$info->education}}"></textarea>
                </div>

                <div class="form-group">
                    <label>Опыт работы</label>
                    <textarea class="form-control" name="practice" value="{{$info->practice}}"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Сохранить изменения
                </button>
            </form>
        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Критерии</th>
                              <th scope="col">Дата</th>
                              <th scope="col">За неделю</th>
                              <th scope="col">За месяц</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Просмотры</th>
                              <td>{{$info->hits}}</td>
                              <td>{{$info->hits}}</td>
                              <td>{{$info->hits}}</td>
                            </tr>
                            <tr>
                              <th scope="row">Клики</th>
                              <td>{{$info->telephone_hits}}</td>
                              <td>{{$info->telephone_hits}}</td>
                              <td>{{$info->telephone_hits}}</td>
                            </tr>
                            <tr>
                              <th scope="row">Отзывы</th>
                              <td>{{$info->feedbacks->count()}}</td>
                              <td>{{$info->feedbacks->count()}}</td>
                              <td>{{$info->feedbacks->count()}}</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>