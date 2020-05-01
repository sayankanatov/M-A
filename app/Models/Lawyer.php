<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

use Config;
use App\Models\City;
use Illuminate\Support\Facades\Input;

class Lawyer extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'lawyers';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = [
        'last_name',
        'first_name',
        'patronymic',
        'alias',
        'image',
        'company',
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
        'education',
        'extra',
        'advokat_licence',
        'langs',
        'work_experience',
        'practice',
        'work_for',
        'services',
        'is_free',
        'is_member',
        'member_title',
        'price',
        'user_id',

        'h_one',
        'seo_title',
        'seo_desc',
        'seo_keywords',
        'is_deleted',
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function outputByCity($city_id,$id = false,$service_id = false)
    {
        $city = City::find($city_id);
        $free = Input::get('free');
        session_start();
        if(!isset($_SESSION['status'])){
            $_SESSION['status'] = 1;
        }else{
            $_SESSION['status'] = $_SESSION['status'] + 1;
        }
        $take = Config::get('constants.pagination.lawyers');
        $count = self::where('city_id',$city_id)->count();

        if($count < $_SESSION['status']){
            $_SESSION['status'] = 1;
        }
        $skip = $_SESSION['status'];

        if($id){

            if($service_id){
                $items = self::take($take)->where('city_id',$city_id)
                    ->where('is_deleted',0)
                    ->where('id','<',$id)
                    ->whereHas('services', function($query) use ($service_id){
                        $query->where('id',$service_id);
                    })->orderBy('created_at','desc')
                    ->get();
            }else{
                $items = self::take($take)->where('city_id',$city_id)
                    ->where('is_deleted',0)
                    ->where('id','<',$id)
                    ->orderBy('created_at','desc')
                    ->get();

                if(count($items) < Config::get('constants.pagination.lawyers')){
                    $howMany = Config::get('constants.pagination.lawyers') - count($items);
                    $end = self::take($howMany)->where('city_id',$city_id)
                        ->where('is_deleted',0)
                        ->where('id','<',$id)
                        ->orderBy('created_at','desc')
                        ->get();

                    $items = $items->merge($end);

                    $skip = $howMany;
                }    
            }
            
        }else{
            if($service_id){
                $items = self::skip($skip)
                    ->take($take)->where('city_id',$city_id)
                    ->where('is_deleted',0)
                    ->whereHas('services', function($query) use ($service_id){
                        $query->where('id',$service_id);
                    })->orderBy('created_at','desc')
                    ->get();
            }else{
                $items = self::skip($skip)
                    ->take($take)->where('city_id',$city_id)
                    ->where('is_deleted',0)
                    ->orderBy('created_at','desc')
                    ->get();

                if(count($items) < Config::get('constants.pagination.lawyers')){
                    $howMany = Config::get('constants.pagination.lawyers') - count($items);
                    $end = self::take($howMany)->where('city_id',$city_id)
                        ->where('is_deleted',0)
                        ->orderBy('created_at','desc')
                        ->get();

                    $items = $items->merge($end);
                    $skip = $howMany;
                }
            }
        }

        $output = '';
        $last_id = '';
      
        if(!$items->isEmpty()){
            foreach($items as $lawyer){

                $output .= "<div class='law'>";
                $output .= "<div class='law_main'>";
                $output .= "<a href='".route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])."' class='law_photo-link'>";
                $output .= "<img src='".($lawyer->image ? '/'.$lawyer->image : asset('front3/image/Lawyers/Empty.png'))."' alt='Фото' class='photo'>";
                $output .= "</a>";
                $output .= "<div class='inner_mobile'>";
                $output .= "<div class='law_revs'>";
                $output .= "<img src='".asset('front3/image/Lawyers/icon/Vector.svg')."' alt='Иконка отзывы' class='law_revs-icon'>";
                $output .= "<a href='".route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])."'><span class='law_revs-text'>".$lawyer->feedbacks->count()." отзывов</span></a>";
                $output .= "</div>";
                $output .= "<div class='rev_stars'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<img class='r_star' src='".asset('front3/image/Lawyers/icon/Icon_star.svg')."' alt='Звезда'>";
                $output .= "<span>".$lawyer->rating ?? '0.0'."</span>";
                $output .= "</div>";
                $output .= "<a href='".route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])."' class='law_name-mobile-link'>";
                $output .= "<div class='law_name'>".$lawyer->fullname($lawyer->id)."</div>";
                $output .= "</a></div></div>";
                $output .= "<div class='law_info'>";
                $output .= "<a href='".route('lawyer',['id'=>$lawyer->alias,'city' => $city->alias])."' class='law_name-link'>";
                $output .= "<div class='law_name'>".$lawyer->fullname($lawyer->id)."</div></a>";
                $output .= "<div class='law_specs'>";
                $output .= "<div class='law_head'>";
                $output .= "<img src='".asset('front3/image/Lawyers/icon/icon4.svg')."' alt='Иконка' class='law_spec-img'>";
                $output .= "<span class='spec_title'>Специализация: </span><a href='#'></a></div>";
                $output .= "<div class='spec-list'>";

                foreach ($lawyer->services as $service) {
                    # code...
                    $output .= "<a href='".route('service',['city'=>$city->alias,'id'=>$service->alias])."'>";
                    $output .= "<span class='spec'>".$service->name_ru."</span>";
                    $output .= "</a>";
                }
                $output .= "</div></div><div class='law_address'>";
                $output .= "<img src='".asset('front3/image/Lawyers/icon/icon3.svg')."' alt='Иконка' class='law_spec-img'>";
                $output .= "<span class='spec_title'>".$lawyer->address."</span></div>";
                $output .= "<div class='law_graphics'>";
                $output .= "<div class='graph_head'>";
                $output .= "<img src='".asset('front3/image/Lawyers/icon/icon2.svg')."' alt='Иконка' class='law_spec-img'>";
                $output .= "<div class='graph_text'>";
                $output .= "<span class='spec_title'>График работы:</span>";
                $output .= "<span class='time'>".$lawyer->timetext."</span></div></div>";
                $output .= "<div class='week'>";
                $output .= "<span class='".($lawyer->monday == 1 ? 'weekdays' : 'output')."'>ПН</span>";
                $output .= "<span class='".($lawyer->tuesday == 1 ? 'weekdays' : 'output')."'>ВТ</span>";
                $output .= "<span class='".($lawyer->wednesday == 1 ? 'weekdays' : 'output')."'>СР</span>";
                $output .= "<span class='".($lawyer->thursday == 1 ? 'weekdays' : 'output')."'>ЧТ</span>";
                $output .= "<span class='".($lawyer->friday == 1 ? 'weekdays' : 'output')."'>ПТ</span>";
                $output .= "<span class='".($lawyer->saturday == 1 ? 'weekdays' : 'output')."'>СБ</span>";
                $output .= "<span class='".($lawyer->sunday == 1 ? 'weekdays' : 'output')."'>ВС</span></div><br></div></div>";
                $output .= "<div class='law_contacts'><div class='ph_plus_wa'><div class='phone'>";
                $output .= "<a href='tel:".$lawyer->telephone."' class='phone_link'>";
                $output .= "<span class='hide-tail'>".$lawyer->telephone."</span></a>";
                $output .= "<a href='#' class='click-tel' onclick='telToggler()'>Показать</a></div>";
                $output .= "<div class='WhatsApp_block'>";
                $output .= "<a href='#' class='wa_icon'><img class='wa_icon' src='".asset('front3/image/Lawyers/icon/icon_WhatsApp.svg')."' alt='Wa_icon'></a>";
                $output .= "<a rel='nofollow' target='_blank'
                       href='https://api.whatsapp.com/send?phone=".$lawyer->telephone."&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5,%20%D1%8F%20%D1%81%20%D1%81%D0%B0%D0%B9%D1%82%D0%B0%20Yuristy.kz.%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C%20%D0%BA%D0%BE%D0%BD%D1%81%D1%83%D0%BB%D1%8C%D1%82%D0%B0%D1%86%D0%B8%D1%8E.' class='wa_text'>WhatsApp</a>";
                $output .= "</div></div>";
                $output .= "<div class='consultation ".($lawyer->is_free ? 'c_yes' : 'c_no')."'>";
                $output .= "<div class='cons'>Бесплатная консультация:</div>";
                $output .= "<div class='".($lawyer->is_free ? 'yes' : 'no')."'>".($lawyer->is_free ? 'Есть' : 'Нет')."</div>";
                $output .= "</div></div></div>";

                $last_id = $lawyer->id;
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
            return self::where('city_id',$city_id)->where('is_deleted',0)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            })->count();
        }else{
            $query = self::where('city_id',$city_id)
                ->where('is_deleted',0)
                ->whereHas('services', function($query) use ($service_id){
                    $query->where('id',$service_id);
                })->orderBy('created_at','desc')->get();

            return $query;
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

    public function company() 
    {
        return $this->belongsTo('App\Models\Company','company');
    }

    public function top()
    {
        return $this->hasMany('App\Models\TopLawyer','lawyer_id');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\FeedBack','lawyer_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeFullname($query,$id)
    {
        $fullname = $query->find($id);

        return $fullname->last_name.' '.$fullname->first_name.' '.$fullname->patronymic;
    }

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
