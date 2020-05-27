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

class CompanyController extends Controller
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
        
        $seo_data = SeoPage::where('title','companies')->first();
        $h_one = $seo_data->h_one.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_title = $seo_data->seo_title.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_desc = $seo_data->seo_desc.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_keywords = $seo_data->seo_keywords;

        if($city){
            
            $companies = Company::where('city_id',$city->id)
                ->where('is_deleted',0)
                ->where('is_active',1)
                ->orderBy('created_at','desc')
                ->count();

            return view($this->theme.'.pages.companies.index',compact('city','companies','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }
    }


    public function show($city, $alias)
    {
        $city = City::where('alias',$city)->first();
        
        if($city){
            $company = Company::where('alias',$alias)->first();
            $company->hits += 1;
            $company->save();

            $h_one = $company->h_one;
            $seo_title = $company->seo_title;
            $seo_desc = $company->seo_desc;
            $seo_keywords = $company->seo_keywords;

            $relative_lawyers = Company::select('price','name','logo','alias')->where('city_id',$city->id)->where('is_deleted',0)->where('is_active',1)->inRandomOrder()->take(4)->get();

            return view($this->theme.'.pages.companies.show',compact('company','city','seo_title','h_one','seo_desc','seo_keywords','relative_lawyers'));
        }else{
            return redirect(route('main'));
        }
    }


    function loadMore(Request $request)
    {
        if($request->ajax()){
            if($request->id > 0){
                $output = Company::outputByCity($request->city_id,$request->id);
            }else{
                $output = Company::outputByCity($request->city_id);
            }

            echo $output;
        }
    }
}
