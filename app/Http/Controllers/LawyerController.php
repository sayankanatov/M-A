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
use DB;

use Illuminate\Support\Str;

class LawyerController extends Controller
{
    //
    protected $theme = 'green';
    protected $takeCount;

    public function __construct()
    {
        $this->takeCount = Config::get('constants.pagination.optimize');
    }


    public function index($city)
    {
        $city = City::where('alias',$city)->first();

        $free = Input::get('free');

        $seo_data = SeoPage::where('title','lawyers')->first();

        $h_one = $seo_data->h_one.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_title = $seo_data->seo_title.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_desc = $seo_data->seo_desc.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_keywords = $seo_data->seo_keywords;

        if($city){
            $lawyers = Lawyer::where('city_id',$city->id)
                ->where('is_deleted',0)
                ->where('is_active',1)
                ->where('is_admin_activate',1)
                ->orderBy('created_at','desc')
                ->count();

            return view($this->theme.'.pages.lawyers.index',compact('lawyers','city','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }   
        
    }


    public function show($city, $alias)
    {
        $city = City::where('alias',$city)->first();
        
        if($city){
            $lawyer = Lawyer::where('alias',$alias)->first();
            $lawyer->hits += 1;
            $lawyer->save();

            $h_one = $lawyer->h_one ?? '';
            $seo_title = $lawyer->seo_title ?? '';
            $seo_desc = $lawyer->seo_desc ?? '';
            $seo_keywords = $lawyer->seo_keywords ?? '';

            $service = $lawyer->services->first();

            if($service){
                $relative_lawyers = Lawyer::select('price','first_name','last_name','patronymic','image','alias')->where('city_id',$city->id)->where('is_deleted',0)->where('is_active',1)->where('is_admin_activate',1)->inRandomOrder()->take(4)->get();
            }
            else{
                $relative_lawyers = null;
            }

            return view($this->theme.'.pages.lawyers.show',compact('lawyer','city','seo_title','h_one','seo_desc','seo_keywords','relative_lawyers','service'));
        }else{
            return redirect(route('main'));
        }  
    }

    function loadMore(Request $request)
    {
        if($request->ajax()){
            if($request->id > 0){
                $output = Lawyer::outputByCity($request->city_id,$request->id);
            }else{
                $output = Lawyer::outputByCity($request->city_id);
            }

            echo $output;
        }
    }
}
