<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

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

        view()->composer('*', function($view) use(
            $app_h_one,
            $app_seo_title,
            $app_seo_desc,
            $app_seo_keywords
        ) {
            $view->with('app_h_one', $app_h_one);
            $view->with('app_seo_title', $app_seo_title);
            $view->with('app_seo_desc', $app_seo_desc);
            $view->with('app_seo_keywords', $app_seo_keywords);
        });
    }
}
