<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Backpack\MenuCRUD\app\Models\MenuItem;
use Config;
use Illuminate\Support\Facades\Input;
use App\Models\City;
use App\Models\Company;
use App\Models\Lawyer;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Faq;
use App\Models\SeoPage;
use App\Models\FeedBack;
use App\Models\News;
use App\User;

use Illuminate\Support\Str;

class NewsController extends Controller
{
    //
    protected $theme = 'green';

    public function __construct(){

    }
    
    public function index()
    {
        $news = News::orderBy('created_at','desc')->paginate(10);

        return view( $this->theme.'.pages.news.index',compact('news'));
    }

    public function show($alias)
    {
        $news = News::where('alias',$alias)->firstOrFail();

        return view( $this->theme.'.pages.news.show',compact('news')
        );
    }

}
