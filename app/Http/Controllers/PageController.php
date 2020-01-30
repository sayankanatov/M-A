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
use App\User;

class PageController extends Controller
{
    //
    public function __construct(){

    }
    
    public function index(Request $request)
    {
        $cities = City::all();
        $city = City::find(Config::get('constants.city'));

        $services = Service::all();
        $faq = Faq::all();

        $h_one = $city->h_one;
        $seo_title = $city->seo_title;
        $seo_desc = $city->seo_desc;
        $seo_keywords = $city->seo_keywords;

        return view('pages.main',compact('city','cities','services','faq','seo_title','h_one','seo_desc','seo_keywords'));
    }

    public function city($city)
    {
        $city = City::where('alias',$city)->first();
        if($city){
            $cities = City::all();

            $services = Service::all();
            $faq = Faq::all();

            $h_one = $city->h_one;
            $seo_title = $city->seo_title;
            $seo_desc = $city->seo_desc;
            $seo_keywords = $city->seo_keywords;

            return view('pages.main',compact('city','cities','services','faq','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }
    }

    public function lawyers($city, Request $request)
    {
        $city = City::where('alias',$city)->first();

        $sort = Input::get('sort');

        session_start();

        if(!isset($_SESSION['status'])){
            $_SESSION['status'] = 1;
        }else{
            $_SESSION['status'] = $_SESSION['status'] + 1;
        }

        $skip = $_SESSION['status'];

        $count = Lawyer::where('city_id',$city->id)->count();
        
        if($count < $skip){
            $int = $count;
        }else{
            $int = $count - $skip;
        }

        $seo_data = SeoPage::where('title','lawyers')->first();

        $h_one = $seo_data->h_one.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_title = $seo_data->seo_title.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_desc = $seo_data->seo_desc.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_keywords = $seo_data->seo_keywords;

        if($city){

            if(isset($sort)){

                switch ($sort) {
                    case 'rating':
                        # code...
                        $lawyers = Lawyer::skip($skip)
                            ->take($int)->where('city_id',$city->id)
                            ->orderBy('rating','desc')
                            ->get();

                        $end = Lawyer::take($skip)
                            ->where('city_id',$city->id)
                            ->orderBy('rating','desc')
                            ->get();
                        $lawyers = $lawyers->merge($end);
                        break;
                    case 'experience':
                        # code...
                        $lawyers = Lawyer::skip($skip)
                            ->take($int)
                            ->where('city_id',$city->id)
                            ->orderBy('work_experience','desc')
                            ->get();

                        $end = Lawyer::take($skip)
                            ->where('city_id',$city->id)
                            ->orderBy('work_experience','desc')
                            ->get();
                        $lawyers = $lawyers->merge($end);
                        break;
                    default:
                        # code...
                        $lawyers = Lawyer::skip($skip)
                            ->take($int)
                            ->where('city_id',$city->id)
                            ->orderBy('created_at','desc')
                            ->get();
                        $end = Lawyer::take($skip)
                            ->where('city_id',$city->id)
                            ->orderBy('created_at','desc')
                            ->get();
                        $lawyers = $lawyers->merge($end);
                        break;
                }

            }else{
                
                $lawyers = Lawyer::skip($skip)
                    ->take($int)
                    ->where('city_id',$city->id)
                    ->orderBy('created_at','desc')
                    // ->paginate(Config::get('constants.pagination.lawyers'));
                    ->get();
                $end = Lawyer::take($skip)
                    ->where('city_id',$city->id)
                    ->orderBy('created_at','desc')
                    // ->paginate(Config::get('constants.pagination.lawyers'));
                    ->get();
                $lawyers = $lawyers->merge($end);
            }

            return view('pages.lawyers',compact('lawyers','city','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }   
        
    }

    public function lawyer($city, $alias)
    {
        $city = City::where('alias',$city)->first();
        
        if($city){
            $lawyer = Lawyer::where('alias',$alias)->first();
            $lawyer->hits += 1;
            $lawyer->save();

            $h_one = $lawyer->h_one;
            $seo_title = $lawyer->seo_title;
            $seo_desc = $lawyer->seo_desc;
            $seo_keywords = $lawyer->seo_keywords;

            $service = $lawyer->services->first();

            $relative_lawyers = Lawyer::select('price','first_name','last_name','patronymic','image','alias')->where('city_id',$city->id)->whereHas('services',function($q) use ($service){
                $q->where('id',$service->id);
            // })->inRandomOrder()->take(4)->get();
            })->orderBy('created_at','desc')->take(4)->get();

            return view('pages.lawyer',compact('lawyer','city','seo_title','h_one','seo_desc','seo_keywords','relative_lawyers','service'));
        }else{
            return redirect(route('main'));
        }   
        
    }

    public function services($city)
    {   
        $city = City::where('alias',$city)->first();
        
        $seo_data = SeoPage::where('title','services')->first();

        $h_one = $seo_data->h_one.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_title = $seo_data->seo_title.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_desc = $seo_data->seo_desc.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_keywords = $seo_data->seo_keywords;

        if($city){

            return view('pages.services',compact('city','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }
    }

    public function service($city, $alias)
    {
        $city = City::where('alias',$city)->first();
        
        if($city){
            $service = Service::where('alias',$alias)->first();

            $h_one = $service->h_one.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
            $seo_title = $service->seo_title.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
            $seo_desc = $service->seo_desc.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
            $seo_keywords = $service->seo_keywords.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );

            $lawyers = Lawyer::getByServiceInCity($service->id,$city->id);

            $service_id = $service->id;

            $count = Lawyer::where('city_id',$city->id)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            })->count();
            
            return view('pages.service',compact('service','city','lawyers','count','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }
    }

    public function companies($city)
    {   
        $city = City::where('alias',$city)->first();

        $sort = Input::get('sort');

        session_start();

        if(!isset($_SESSION['status'])){
            $_SESSION['status'] = 1;
        }else{
            $_SESSION['status'] = $_SESSION['status'] + 1;
        }

        $skip = $_SESSION['status'];

        $count = Company::where('city_id',$city->id)->count();

        if($count < $skip){
            $int = $count;
        }else{
            $int = $count - $skip;
        }

        $seo_data = SeoPage::where('title','companies')->first();

        $h_one = $seo_data->h_one.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_title = $seo_data->seo_title.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_desc = $seo_data->seo_desc.' '.(app()->getLocale() == 'ru' ? $city->prepositional_ru : $city->prepositional_kz );
        $seo_keywords = $seo_data->seo_keywords;

        if($city){

            if(isset($sort)){

                switch ($sort) {
                    case 'rating':
                        # code...
                        $companies = Company::skip($skip)
                            ->take($int)
                            ->where('city_id',$city->id)
                            ->orderBy('rating','desc')
                            ->get();

                        $end = Company::take($skip)
                            ->where('city_id',$city->id)
                            ->orderBy('rating','desc')
                            ->get();

                        $companies = $companies->merge($end);
                        break;
                    case 'experience':
                        # code...
                        $companies = Company::skip($skip)
                            ->take($int)
                            ->where('city_id',$city->id)
                            ->orderBy('extra','desc')
                            ->get();

                        $end = Company::take($skip)
                                ->where('city_id',$city->id)
                                ->orderBy('extra','desc')
                                ->get();

                        $companies = $companies->merge($end);
                        
                        break;
                    default:
                        # code...
                        $companies = Company::skip($skip)
                            ->take($int)
                            ->where('city_id',$city->id)
                            ->orderBy('created_at','desc')
                            ->get();

                        $end = Company::take($skip)
                                ->where('city_id',$city->id)
                                ->orderBy('created_at','desc')
                                ->get();

                        $companies = $companies->merge($end);
                        break;
                }

            }else{
                $companies = Company::skip($skip)
                    ->take($int)
                    ->where('city_id',$city->id)
                    ->orderBy('created_at','desc')
                    ->get();

                $end = Company::take($skip)
                        ->where('city_id',$city->id)
                        ->orderBy('created_at','desc')
                        ->get();

                $companies = $companies->merge($end);
            }
            
            

            return view('pages.companies',compact('city','companies','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }
    }

    public function company($city, $alias)
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

            return view('pages.company',compact('company','city','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }   
        
    }

    public function search(Request $request)
    {
        $lang = app()->getLocale();
        $result = null;
        $search = $request->get('search');

        $city = City::where('alias',$request->get('city'))->first();

        $lawyers = Lawyer::where('last_name','like','%'.$search.'%')
                    ->orWhere('first_name','like','%'.$search.'%')
                    ->orWhere('patronymic','like','%'.$search.'%')
                    ->get();
        $companies = Company::where('name','like','%'.$search.'%')->get();
        $services = Service::where($lang == 'ru' ? 'name_ru' : 'name_kz','like','%'.$search.'%')->get();

        if(count($lawyers) > 0 || count($companies) > 0 || count($services) > 0){
             $result = true;
         }else{
            $result = false;
        }

        $seo_data = SeoPage::where('title','search')->first();

        $h_one = $seo_data->h_one.' '.$search;
        $seo_title = $seo_data->seo_title.' '.$search;
        $seo_desc = $seo_data->seo_desc.' '.$search;
        $seo_keywords = $seo_data->seo_keywords;

        return view('pages.search',compact('lawyers','companies','services','search','result','city','seo_title','h_one','seo_desc','seo_keywords'));
    }

    public function sendMail(Request $request){

        User::sendMail(10);

        return redirect(route('lawyers',['city' => 'almaty']));
    }

    public function addFeedback(Request $request){

        if($request->input('lawyer_id')){
            $lawyer = $request->input('lawyer_id');
        }elseif($request->input('company_id')){
            $company = $request->input('company_id');
        }

        $text = $request->input('text');
        $star = $request->input('rating-star');

        // dd($star);

        $feed = new FeedBack();
        $feed->text = $text;
        $feed->stars = $star;
        $feed->lawyer_id = $lawyer ?? null;
        $feed->company_id = $company ?? null;
        $feed->save();

        return redirect()->back();
    }

}
