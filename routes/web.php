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

Route::get('/test', 'PageController@test')->name('test');
Route::get('/activate/{user_id}', 'PageController@activateUser')->name('activate.user');
//sitemap.xml
Route::get('/sitemap.xml', 'SiteMapController@index')->name('sitemap');

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){
    
    Auth::routes();
    Route::match(['get','post'],'/forgot-password','PageController@forgotPassword')->name('forgot.password');
    //Личный кабинет пользователя
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home/lawyer/{id}/update', 'HomeController@updateLawyer')->name('home.lawyer.update');
    Route::post('/home/lawyer/{id}/photo', 'HomeController@storePhotoLawyer')->name('home.lawyer.photo');
    Route::post('/home/lawyer/{id}/services', 'HomeController@updateLawyerServices')->name('home.lawyer.services');

    Route::post('/home/company/{id}/update', 'HomeController@updateCompany')->name('home.company.update');
    Route::post('/home/company/{id}/photo', 'HomeController@storePhotoCompany')->name('home.company.photo');
    Route::post('/home/company/{id}/services', 'HomeController@updateCompanyServices')->name('home.company.services');
    //Поиск
    Route::match(['get','post'],'/search','PageController@search')->name('search');
    //Оставить отзыв
    Route::match(['get','post'],'/feedback/add','PageController@addFeedback')->name('feedback.add');
    //Удаление анкеты
    Route::match(['get','post'],'/user/block/{id}','PageController@blockUser')->name('user.block');
	
    //Главная
    Route::get('/', 'PageController@index')->name('main');
    Route::get('/{city}', 'PageController@city')->name('city');

    //Юристы
    Route::get('/{city}/yuristy', 'LawyerController@index')->name('lawyers');
    Route::get('/{city}/yurist/{alias}', 'LawyerController@show')->name('lawyer');
    //Load more lawyers
    Route::post('/lawyers/load_more', 'LawyerController@loadMore')->name('lawyers.loadmore');

    //Юристы по специализацией
    Route::get('/{city}/specializaciya/{alias}', 'PageController@service')->name('service');
    //Load more lawyers by service
    Route::post('/service/load_more', 'PageController@loadMore')->name('service.loadmore');
    //Компании
    Route::get('/{city}/yuridicheskie-kompanii', 'CompanyController@index')->name('companies');
    Route::get('/{city}/yuridicheskaya-kompaniya/{alias}', 'CompanyController@show')->name('company');
    //Load more companies
    Route::post('/companies/load_more', 'CompanyController@loadMore')->name('companies.loadmore');

    //Новости
    Route::get('/news/polesnoe', 'NewsController@index')->name('news');
    Route::get('/news/polesnoe/{alias}', 'NewsController@show')->name('news.show');
    Route::post('/news/search', 'NewsController@search')->name('news.search');
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

