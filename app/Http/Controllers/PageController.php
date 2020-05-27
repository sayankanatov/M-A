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

class PageController extends Controller
{
    //
    protected $theme = 'green';
    protected $takeCount;

    public function __construct()
    {
        $this->takeCount = Config::get('constants.pagination.optimize');
    }
    
    
    public function index(Request $request)
    {
        $cities = City::all();
        $city = City::find(Config::get('constants.city'));
        $services = Service::all();
        $faq = Faq::all();
        $lawyers = Lawyer::where('city_id',$city->id)->where('is_deleted',0)->where('is_active',1)->take(4)->inRandomOrder()->get();
        $news = News::orderBy('created_at','desc')->take(4)->get();

        $h_one = $city->h_one;
        $seo_title = $city->seo_title;
        $seo_desc = $city->seo_desc;
        $seo_keywords = $city->seo_keywords;

        return view( $this->theme.'.pages.index',compact(
            'city','cities','services','faq','seo_title',
            'h_one','seo_desc','seo_keywords',
            'lawyers','news')
        );
    }


    public function city($city)
    {
        $city = City::where('alias',$city)->first();
        if($city){
            $cities = City::all();
            $services = Service::all();
            $faq = Faq::all();
            $lawyers = Lawyer::where('city_id',$city->id)->where('is_deleted',0)->where('is_active',1)->take(4)->inRandomOrder()->get();
            $news = News::orderBy('created_at','desc')->take(4)->get();

            $h_one = $city->h_one;
            $seo_title = $city->seo_title;
            $seo_desc = $city->seo_desc;
            $seo_keywords = $city->seo_keywords;

            return view( $this->theme.'.pages.index',compact('city','cities','services','faq','seo_title','h_one','seo_desc','seo_keywords','lawyers','news'));
        }else{
            return redirect(route('main'));
        }
    }
    

    public function service($city, $alias)
    {
        $city = City::where('alias',$city)->first();
        
        if($city){
            $service = Service::where('alias',$alias)->first();

            if(!$service){
                return abort(404);
            }

            $h_one = $service->h_one.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
            $seo_title = $service->seo_title.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
            $seo_desc = $service->seo_desc.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
            $seo_keywords = $service->seo_keywords.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );

            $lawyers = Lawyer::getByServiceInCity($service->id,$city->id);

            $service_id = $service->id;

            $count = Lawyer::where('city_id',$city->id)->where('is_deleted',0)->where('is_active',1)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            })->count();
            
            return view($this->theme.'.pages.services.show',compact('service','city','lawyers','count','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }
    }


    function loadMore(Request $request)
    {
        if($request->ajax()){
            if($request->id > 0){
                $output = Lawyer::outputByCity($request->city_id,$request->id,$service_id);
            }else{
                $output = Lawyer::outputByCity($request->city_id,$service_id);
            }

            echo $output;
        }
    }


    public function search(Request $request)
    {
        $result = true;
        $lang = app()->getLocale();
        $search = $request->get('search');
        $city = City::where('alias',$request->get('city'))->first();

        $lawyers = Lawyer::where('is_deleted',0)
                    ->where('is_active',1)
                    ->where('last_name','like','%'.$search.'%')
                    ->orWhere('first_name','like','%'.$search.'%')
                    ->orWhere('patronymic','like','%'.$search.'%')
                    ->get();
        $companies = Company::where('name','like','%'.$search.'%')->where('city_id',$city->id)->where('is_deleted',0)->where('is_active',1)->get();
        $services = Service::where($lang == 'ru' ? 'name_ru' : 'name_kz','like','%'.$search.'%')->get();

        if(count($lawyers) == 0){
            $result = false;
        }

        $seo_data = SeoPage::where('title','search')->first();

        $h_one = $seo_data->h_one.' '.$search;
        $seo_title = $seo_data->seo_title.' '.$search;
        $seo_desc = $seo_data->seo_desc.' '.$search;
        $seo_keywords = $seo_data->seo_keywords;

        return view($this->theme.'.pages.search',compact('lawyers','companies','services','search','city','seo_title','h_one','seo_desc','seo_keywords','result'));
    }

    public function addFeedback(Request $request){

        $commonStarts = 0;

        if($request->input('lawyer_id')){
            $lawyer = $request->input('lawyer_id');
        }elseif($request->input('company_id')){
            $company = $request->input('company_id');
        }

        $text = $request->input('text');
        $star = $request->input('rating-star');

        $feed = new FeedBack();
        $feed->text = $text;
        $feed->stars = $star;
        $feed->lawyer_id = $lawyer ?? null;
        $feed->company_id = $company ?? null;
        $feed->save();

        //save rating
        if($request->input('lawyer_id')){
            $fLawyer = Lawyer::find($lawyer);
            $countFeedBacks = count($fLawyer->feedbacks);

            foreach ($fLawyer->feedbacks as $key => $feedback) {
                # code...
                $commonStarts += $feedback->stars;
            }
            //save db
            $fLawyer->rating = round($commonStarts / $countFeedBacks, 1);
            $fLawyer->save();
        }elseif($request->input('company_id')){
            $fCompany = Company::find($company);
            $countFeedBacks = count($fCompany->feedbacks);

            foreach ($fCompany->feedbacks as $key => $feedback) {
                # code...
                $commonStarts += $feedback->stars;
            }
            //save db
            $fCompany->rating = round($commonStarts / $countFeedBacks, 1);
            $fCompany->save();
        }

        return redirect()->back();
    }


    public function blockUser($id,Request $request)
    {
        $lawyer = Lawyer::where('id',$id)->first();
        if($lawyer){
            $lawyer->is_deleted = 1;
            $lawyer->save();
        }else{
            $company = Company::where('id',$id)->first();
            $company->is_deleted = 1;
            $company->save();
        }
        \Auth::logout();
        return redirect(route('main'));
    }

    public function activateUser($user_id)
    {
        $user = User::find($user_id);
        $lawyer = Lawyer::where('user_id',$user_id)->first();
        $company = Company::where('user_id',$user_id)->first();
        if($lawyer !== null){
            $lawyer->is_active = 1;
            $lawyer->save();
            return redirect(route('main'));
        }elseif($company !== null){
            $company->is_active = 1;
            $company->save();
            return redirect(route('main'));
        }else{
            return redirect()->back();
        }  
    }


    public function test(Request $request)
    {
        dd('Good');
    }

}