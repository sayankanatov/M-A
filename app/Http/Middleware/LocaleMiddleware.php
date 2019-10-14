<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Request;

class LocaleMiddleware
{

    public static $mainLanguage = 'ru'; //основной язык, который не должен отображаться в URl
    public static $languages = ['ru', 'kz', 'en']; // Указываем, какие языки будем использовать в приложении. 

    /*
    * Проверяет наличие корректной метки языка в текущем URL
    * Возвращает метку или значеие null, если нет метки
    */
    public static function getLocale()
    {
        $uri = Request::path(); //получаем URI 

        $segmentsURI = explode('/',$uri); //делим на части по разделителю "/"

        //Проверяем метку языка  - есть ли она среди доступных языков
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], self::$languages)) {

            return $segmentsURI[0]; 

        } else {
            return  self::$mainLanguage; 
        }
    }

    /*
    * Устанавливает язык приложения в зависимости от метки языка из URL
    */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();

        if($locale) App::setLocale($locale); 

        return $next($request); //пропускаем дальше - передаем в следующий посредник
    }
}
