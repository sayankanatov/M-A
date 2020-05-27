<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\City;
use Illuminate\Support\Facades\Input;
use Config;

class Company extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'companies';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'alias',
        'logo',
        'address',
        'telephone',
        'extra_telephone',
        'email',
        'link',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'timetext',
        'extra',
        'advokat_licence',
        'langs',
        'work_for',
        'is_free',
        'is_member',
        'member_title',
        'price',
        'user_id',
        'city_id',

        'h_one',
        'seo_title',
        'seo_desc',
        'seo_keywords',
        'is_deleted',
        'is_admin_activate'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function outputByCity($city_id,$id = false)
    {
        $city = City::find($city_id);
        $free = Input::get('free');
        $count = self::where('city_id',$city_id)->where('is_deleted',0)->where('is_active',1)->where('is_admin_activate',1)->count();
        session_start();
        if(!isset($_SESSION['status'])){
            $_SESSION['status'] = 0;
        }else{
            $_SESSION['status'] = $_SESSION['status'] + 1;

            if($count < $_SESSION['status']){
                $_SESSION['status'] = 0;
            }
        }
        $take = Config::get('constants.pagination.companies');
        $skip = $_SESSION['status'];

        if($id){
            $items = self::take($take)->where('city_id',$city_id)
                ->where('is_deleted',0)
                ->where('is_active',1)
                ->where('is_admin_activate',1)
                ->where('id','>',$id)
                ->get();

            if(count($items) < Config::get('constants.pagination.companies')){
                $end = self::take($skip)->where('city_id',$city_id)
                    ->where('is_deleted',0)
                    ->where('is_active',1)
                    ->where('is_admin_activate',1)
                    ->where('id','>',$id)
                    ->get();

                $items = $items->merge($end);
            }
        }else{
            $items = self::skip($skip)
                ->take($take)->where('city_id',$city_id)
                ->where('is_deleted',0)
                ->where('is_active',1)
                ->where('is_admin_activate',1)
                ->orderBy('created_at','desc')
                ->get();

            if(count($items) < Config::get('constants.pagination.companies')){
                $howMany = Config::get('constants.pagination.companies') - count($items);
                $end = self::take($howMany)->where('city_id',$city_id)
                    ->where('is_deleted',0)
                    ->where('is_active',1)
                    ->where('is_admin_activate',1)
                    ->orderBy('created_at','desc')
                    ->get();

                $items = $items->merge($end);
                $skip = $howMany;
            }
        }

        $output = '';
        $last_id = '';
      
        if(!$items->isEmpty()){
            foreach($items as $company){

                $output .= "<div class='law company'>";
                $output .= "<div class='law_main'>";
                $output .= "<a href='".route('company',['id'=>$company->alias,'city' => $city->alias])."' class='law_photo-link'>";
                $output .= "<img src='".($company->logo ? '/'.$company->logo : asset('front3/image/4. Compani/0.svg'))."' alt='Фото' class='photo'>";
                $output .= "</a>";
                $output .= "<div class='inner_mobile'>";
                $output .= "<div class='law_revs'>";
                $output .= "<img src='".asset('front3/image/Lawyers/icon/Vector.svg')."' alt='Иконка отзывы' class='law_revs-icon'>";
                $output .= "<a href='".route('company',['id'=>$company->alias,'city' => $city->alias])."'><span class='law_revs-text'>".$company->feedbacks->count()." отзывов</span></a>";
                $output .= "</div>";
                $output .= "<div class='rev_stars'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<span>".$company->rating ?? '0.0'."</span>";
                $output .= "</div>";
                $output .= "<a href='".route('company',['id'=>$company->alias,'city' => $city->alias])."' class='law_name-mobile-link'>";
                $output .= "<div class='law_name'>".$company->name."</div>";
                $output .= "</a></div></div>";
                $output .= "<div class='law_info'>";
                $output .= "<a href='".route('company',['id'=>$company->alias,'city' => $city->alias])."' class='law_name-link'>";
                $output .= "<div class='law_name'>".$company->name."</div></a>";
                $output .= "<div class='law_specs'>";
                $output .= "<div class='law_head'>";
                $output .= "<img src='".asset('front3/image/Lawyers/icon/icon4.svg')."' alt='Иконка' class='law_spec-img'>";
                $output .= "<span class='spec_title'>Специализация: </span><a href='#'></a></div>";
                $output .= "<div class='spec-list'>";

                foreach ($company->services as $service) {
                    # code...
                    $output .= "<a href='".route('service',['city'=>$city->alias,'id'=>$service->alias])."'>";
                    $output .= "<span class='spec'>".$service->name_ru."</span>";
                    $output .= "</a>";
                }
                $output .= "</div></div><div class='law_address'>";
                $output .= "<img src='".asset('front3/image/Lawyers/icon/icon3.svg')."' alt='Иконка' class='law_spec-img'>";
                $output .= "<span class='spec_title'>".$company->address."</span></div>";
                $output .= "<div class='law_graphics'>";
                $output .= "<div class='graph_head'>";
                $output .= "<img src='".asset('front3/image/Lawyers/icon/icon2.svg')."' alt='Иконка' class='law_spec-img'>";
                $output .= "<div class='graph_text'>";
                $output .= "<span class='spec_title'>График работы:</span>";
                $output .= "<span class='time'>".$company->timetext."</span></div></div>";
                $output .= "<div class='week'>";
                $output .= "<span class='".($company->monday == 1 ? 'weekdays' : 'output')."'>ПН</span>";
                $output .= "<span class='".($company->tuesday == 1 ? 'weekdays' : 'output')."'>ВТ</span>";
                $output .= "<span class='".($company->wednesday == 1 ? 'weekdays' : 'output')."'>СР</span>";
                $output .= "<span class='".($company->thursday == 1 ? 'weekdays' : 'output')."'>ЧТ</span>";
                $output .= "<span class='".($company->friday == 1 ? 'weekdays' : 'output')."'>ПТ</span>";
                $output .= "<span class='".($company->saturday == 1 ? 'weekdays' : 'output')."'>СБ</span>";
                $output .= "<span class='".($company->sunday == 1 ? 'weekdays' : 'output')."'>ВС</span></div><br></div></div>";
                $output .= "<div class='law_contacts'><div class='ph_plus_wa'><div class='phone'>";
                $output .= "<a href='tel:".$company->telephone."' class='phone_link'>";
                $output .= "<span class='hide-tail'>".$company->telephone."</span></a>";
                $output .= "<a href='#' class='click-tel'>Показать</a></div>";
                $output .= "<div class='WhatsApp_block'>";
                $output .= "<a href='#' class='wa_icon'><img class='wa_icon' src='".asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')."' alt='Wa_icon'></a>";
                $output .= "<a rel='nofollow' target='_blank'
                       href='https://api.whatsapp.com/send?phone=".$company->telephone."&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D1%8F%20%D1%81%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0%20Yuristy.kz.%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BD%D1%81%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%86%D0%B8%D1%8E.' class='wa_text'>WhatsApp</a>";
                $output .= "</div></div>";
                $output .= "<div class='consultation ".($company->is_free ? 'c_yes' : 'c_no')."'>";
                $output .= "<div class='cons'>Бесплатная консультация:</div>";
                $output .= "<div class='".($company->is_free ? 'yes' : 'no')."'>".($company->is_free ? 'Есть' : 'Нет')."</div>";
                $output .= "</div></div></div>";

                $last_id = $company->id;
            }
            $output .= '<div class="lawyer_btn">';
            $output .= "<img src='".asset('front3/image/2. Main/Arrows.svg')."' alt='Стрелки'>";
            $output .= "<button type='button' name='load_more_button' id='loadMore' data-id=".$last_id.">Показать больше</button>";
            $output .= '</div>';

            $output .= '<script>';
            $output .= "$.fn.textToggle = function (d, b, e) {
                    return this.each(function (f, a) {
                        a = $(a);
                        var c = $(d).eq(f),
                            g = [b, c.text()],
                            h = [a.text(), e];
                        c.text(b).show();
                        $(a).click(function (b) {
                            b.preventDefault();
                            c.text(g.reverse()[0]);
                            a.text(h.reverse()[0])
                        })
                    })
                };
                $(function () {
                    $('.click-tel').textToggle('.hide-tail', '8 7XX XX XX', 'Скрыть')
                });
                $(function () {
                    $('.click-telMobile').textToggle('.hide-tailMobile', '8 7 ', 'Скрыть')
                });";
            $output .= '</script>';
        }

        return $output;
    }



    public static function getByServiceInCity($service_id,$city_id,$count = false)
    {
        if($count == true){
            return self::where('city_id',$city_id)->where('is_deleted',0)->where('is_active',1)
                    ->where('is_admin_activate',1)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            })->count();
        }else{
            return self::where('city_id',$city_id)->where('is_deleted',0)->where('is_active',1)
                    ->where('is_admin_activate',1)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            // })->inRandomOrder()->get();
            })->orderBy('created_at','desc')
            ->paginate(Config::get('constants.pagination.companies'));
        }
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function services() 
    {
        return $this->belongsToMany('App\Models\Service');
    }

    public function user() 
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function city() 
    {
        return $this->belongsTo('App\Models\City','city_id');
    }

    public function lawyers()
    {
        return $this->hasMany('App\Models\Lawyer','company');
    }

    public function top()
    {
        return $this->hasMany('App\Models\TopCompany','company_id');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\FeedBack','company_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
