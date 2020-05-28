<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Models\Service;
use App\Models\City;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Schema::defaultStringLength(191);
        $app_h_one = "Бесплатный сервис по поиску адвокатов/юристов по всему Казахстану";
        $app_seo_title = "Бесплатный сервис по поиску адвокатов/юристов по всему Казахстану";
        $app_seo_desc = "Бесплатный сервис по поиску адвокатов/юристов по всему Казахстану";
        $app_seo_keywords = "Бесплатный сервис по поиску адвокатов/юристов по всему Казахстану";
        $services = Service::all();
        $cities = City::all();
        // $city = City::find(Config::get('constants.city'));

        view()->composer('*', function($view) use(
            $app_h_one,
            $app_seo_title,
            $app_seo_desc,
            $app_seo_keywords,
            $services,
            $cities
            // $city
        ) {
            $view->with('app_h_one', $app_h_one);
            $view->with('app_seo_title', $app_seo_title);
            $view->with('app_seo_desc', $app_seo_desc);
            $view->with('app_seo_keywords', $app_seo_keywords);
            $view->with('services', $services);
            $view->with('cities', $cities);
            // $view->with('city', $city);
        });
    }
}
