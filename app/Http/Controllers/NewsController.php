<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Backpack\MenuCRUD\app\Models\MenuItem;
use Config;
use Illuminate\Support\Facades\Input;
use App\Models\News;
use App\Models\City;

use Illuminate\Support\Str;

class NewsController extends Controller
{
    //
    protected $theme = 'green';

    public function index()
    {
        $city = City::find(Config::get('constants.city'));
        $news = News::orderBy('created_at','desc')->get();

        return view($this->theme.'.pages.news.index',compact('news','city'));
    }

    public function show($alias)
    {
        $city = City::find(Config::get('constants.city'));
        $news = News::where('alias',$alias)->first();

        $seo_title = $news->seo_title;
        $seo_desc = $news->seo_desc;
        $seo_keywords = $news->seo_keywords;

        return view( $this->theme.'.pages.news.show',compact('news','city','seo_title','seo_desc','seo_keywords'));
    }

    public function search(Request $request)
    {
        $city = City::find(Config::get('constants.city'));
        $news = News::where('title','like','%'.$request->get('search').'%')->get();

        return view( $this->theme.'.pages.news.index',compact('news','city'));
    }

}