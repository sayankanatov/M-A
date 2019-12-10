<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
	return redirect('/'. App\Http\Middleware\LocaleMiddleware::$mainLanguage);
});

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::match(['get','post'],'/search','PageController@search')->name('search');
	
    Route::get('/', 'PageController@index')->name('main');
    Route::get('/{city}', 'PageController@city')->name('city');

    Route::get('/{city}/lawyers', 'PageController@lawyers')->name('lawyers');
    Route::get('/{city}/lawyer/{alias}', 'PageController@lawyer')->name('lawyer');

    Route::get('/{city}/services', 'PageController@services')->name('services');
    Route::get('/{city}/service/{alias}', 'PageController@service')->name('service');

    Route::get('/{city}/companies', 'PageController@companies')->name('companies');
    Route::get('/{city}/company/{alias}', 'PageController@company')->name('company');
});

//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl();; //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    } 
    
    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    array_splice($segments, 1, 0, $lang); 

    //формируем полный URL
    $url = Request::root().implode("/", $segments);
    
    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу                            

})->name('setlocale');

