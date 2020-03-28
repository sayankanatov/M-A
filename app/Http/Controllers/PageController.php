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
    
    public function index(Request $request)
    {
        $cities = City::all();
        $city = City::find(Config::get('constants.city'));
        $services = Service::all();
        $faq = Faq::all();
        $lawyers = Lawyer::where('city_id',$city->id)->take(4)->inRandomOrder()->get();
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
            $lawyers = Lawyer::where('city_id',$city->id)->take(4)->inRandomOrder()->get();
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

            return view($this->theme.'.pages.lawyers.index',compact('lawyers','city','seo_title','h_one','seo_desc','seo_keywords'));
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

            $h_one = $lawyer->h_one ?? '';
            $seo_title = $lawyer->seo_title ?? '';
            $seo_desc = $lawyer->seo_desc ?? '';
            $seo_keywords = $lawyer->seo_keywords ?? '';

            $service = $lawyer->services->first();

            if($service){
                $relative_lawyers = Lawyer::select('price','first_name','last_name','patronymic','image','alias')->where('city_id',$city->id)->whereHas('services',function($q) use ($service){
                    $q->where('id',$service->id);
                // })->inRandomOrder()->take(4)->get();
                })->orderBy('created_at','desc')->take(4)->get();
            }
            else{
                $relative_lawyers = null;
            }

            return view($this->theme.'.pages.lawyers.show',compact('lawyer','city','seo_title','h_one','seo_desc','seo_keywords','relative_lawyers','service'));
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

            $count = Lawyer::where('city_id',$city->id)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            })->count();
            
            return view($this->theme.'.pages.services.show',compact('service','city','lawyers','count','seo_title','h_one','seo_desc','seo_keywords'));
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

            return view($this->theme.'.pages.companies.index',compact('city','companies','seo_title','h_one','seo_desc','seo_keywords'));
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

            return view($this->theme.'.pages.companies.show',compact('company','city','seo_title','h_one','seo_desc','seo_keywords'));
        }else{
            return redirect(route('main'));
        }   
        
    }

    public function search(Request $request)
    {
        $result = true;
        $lang = app()->getLocale();
        $search = $request->get('search');
        $city = City::where('alias',$request->get('city'))->first();

        $lawyers = Lawyer::where('last_name','like','%'.$search.'%')
                    ->orWhere('first_name','like','%'.$search.'%')
                    ->orWhere('patronymic','like','%'.$search.'%')
                    ->get();
        $companies = Company::where('name','like','%'.$search.'%')->where('city_id',$city->id)->get();
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

    public function test(Request $request)
    {
        
        $lawyers = Lawyer::where('alias',null)->get();
        $companies = Company::where('alias',null)->get();

        foreach ($lawyers as $key => $lawyer) {
            # code...
            $cut_name = str_limit($lawyer->last_name.'-'.$lawyer->first_name.'-'.$lawyer->patronymic, $limit = 200, $end = '-');
            $alias = Str::slug($cut_name.'-'.rand(1,9999), '-');

            $lawyer->alias = $alias;
            $lawyer->save();
        }

        foreach ($companies as $key => $company) {
            # code...
            $cut_name = str_limit($company->name, $limit = 200, $end = '-');
            $alias = Str::slug($cut_name.'-'.rand(1,9999), '-');

            $company->alias = $alias;
            $company->save();
        }

        return redirect(route('main'));
    }

    public function news()
    {
        $news = News::orderBy('created_at','desc')->paginate(10);

        return view($this->theme.'.pages.news.index',compact('news'));
    }

    public function showNews($alias)
    {
        $news = News::where('alias',$alias)->firstOrFail();

        return view( $this->theme.'.pages.news.show',compact('news')
        );
    }

}
