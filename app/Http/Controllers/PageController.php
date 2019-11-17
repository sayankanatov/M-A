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

class PageController extends Controller
{
    //
    public function __construct(){

        $this->menus = MenuItem::getTree();
    }
    
    public function index(Request $request)
    {
        $cities = City::all();
        $city = City::find(Config::get('constants.city'));

        $company_count = Company::count();
        $lawyer_count = Lawyer::count();
        $service_count = Service::count();

        $services = Service::take(15)->get();
        $faq = Faq::all();

        return view('pages.main',compact('city','cities','company_count','lawyer_count','service_count','services','faq'));
    }

    public function city($city)
    {
        $city = City::where('alias',$city)->first();
        if($city){
            $cities = City::all();
            $company_count = Company::count();
            $lawyer_count = Lawyer::count();
            $service_count = Service::count();

            $services = Service::take(15)->get();
            $faq = Faq::all();

            return view('pages.main',compact('city','cities','company_count','lawyer_count','service_count','services','faq'));
        }else{
            return redirect(route('main'));
        }
    }

    public function lawyers($city)
    {
        $city = City::where('alias',$city)->first();

        $sort = Input::get('sort');

        if($city){

            if(isset($sort)){

                switch ($sort) {
                    case 'rating':
                        # code...
                        $lawyers = Lawyer::where('city_id',$city->id)
                        ->orderBy('rating','desc')
                        ->paginate(Config::get('constants.pagination.lawyers'));
                        break;
                    case 'experience':
                        # code...
                        $lawyers = Lawyer::where('city_id',$city->id)
                        ->orderBy('work_experience','desc')
                        ->paginate(Config::get('constants.pagination.lawyers'));
                        break;
                    default:
                        # code...
                        $lawyers = Lawyer::where('city_id',$city->id)
                        ->paginate(Config::get('constants.pagination.lawyers'));
                        break;
                }

            }else{
                $lawyers = Lawyer::where('city_id',$city->id)
                ->paginate(Config::get('constants.pagination.lawyers'));
            }

            return view('pages.lawyers',compact('lawyers','city'));
        }else{
            return redirect(route('main'));
        }   
        
    }

    public function lawyer($city, $id)
    {
        $city = City::where('alias',$city)->first();
        
        if($city){
            $lawyer = Lawyer::find($id);
            return view('pages.lawyer',compact('lawyer','city'));
        }else{
            return redirect(route('main'));
        }   
        
    }

    public function services($city)
    {   
        $city = City::where('alias',$city)->first();
        if($city){

            return view('pages.services',compact('city'));
        }else{
            return redirect(route('main'));
        }
    }

    public function service($city, $id)
    {
        $city = City::where('alias',$city)->first();
        
        if($city){
            $service = Service::find($id);

            $lawyers = Lawyer::getByServiceInCity($id,$city->id);

            $count = count($lawyers);
            
            return view('pages.service',compact('service','city','lawyers','count'));
        }else{
            return redirect(route('main'));
        }
    }

    public function companies($city)
    {   
        $city = City::where('alias',$city)->first();

        $sort = Input::get('sort');

        if($city){

            if(isset($sort)){

                switch ($sort) {
                    case 'rating':
                        # code...
                        $companies = Company::where('city_id',$city->id)
                        ->orderBy('rating','desc')
                        ->paginate(Config::get('constants.pagination.lawyers'));
                        break;
                    case 'experience':
                        # code...
                        $companies = Company::where('city_id',$city->id)
                        ->orderBy('extra','desc')
                        ->paginate(Config::get('constants.pagination.lawyers'));
                        
                        break;
                    default:
                        # code...
                        $companies = Company::where('city_id',$city->id)
                        ->paginate(Config::get('constants.pagination.lawyers'));
                        break;
                }

            }else{
                $companies = Company::where('city_id',$city->id)
                ->paginate(Config::get('constants.pagination.lawyers'));
            }
            
            

            return view('pages.companies',compact('city','companies'));
        }else{
            return redirect(route('main'));
        }
    }

    public function company($city, $id)
    {
        $city = City::where('alias',$city)->first();
        
        if($city){
            $company = Company::find($id);
            return view('pages.company',compact('company','city'));
        }else{
            return redirect(route('main'));
        }   
        
    }
    
}
