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

use Illuminate\Support\Str;
use Carbon\Carbon;

class SiteMapController extends Controller
{

    public $url = 'https://yuristy.kz';
    public $serviceUrl = 'specializaciya';
    public $companiesUrl = 'yuridicheskie-kompanii';
    public $companyUrl = 'yuridicheskaya-kompaniya';
    public $lawyersUrl = 'yuristy';
    public $lawyerUrl = 'yurist';
    
    public function index(Request $request)
    {
        $urls = [
            'main' => $this->url,
            'service' => $this->serviceUrl,
            'companies' => $this->companiesUrl,
            'company' => $this->companyUrl,
            'lawyers' => $this->lawyersUrl,
            'lawyer' => $this->lawyerUrl
        ];

        $now = Carbon::now()->format('Y-m-d\TH:i:s.uP');
        $cities = City::all();
        $services = Service::select('alias','updated_at')->get();

        return response()
            ->view('xml.sitemap', compact('now','cities','urls','services'))
            ->header('Content-Type', 'text/xml');
    }
}
