<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

use Config;

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
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function getByServiceInCity($service_id,$city_id,$count = false)
    {
        if($count == true){
            return self::where('city_id',$city_id)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            })->count();
        }else{
            session_start();

            if(!isset($_SESSION['status'])){
                $_SESSION['status'] = 1;
            }else{
                $_SESSION['status'] = $_SESSION['status'] + 1;
            }

            $skip = $_SESSION['status'];

            $count = 20;
            
            if($count < $skip){
                $int = $count;
            }else{
                $int = $count - $skip;
            }

            $query = self::skip($skip)
                    ->take($int)
                    ->where('city_id',$city_id)
                    ->whereHas('services', function($query) use ($service_id){
                        $query->where('id',$service_id);
                    })->orderBy('created_at','desc')->get();

            $end = self::take($skip)
                    ->where('city_id',$city_id)
                    ->whereHas('services', function($query) use ($service_id){
                        $query->where('id',$service_id);
                    })->orderBy('created_at','desc')
                    ->get();
            $query = $query->merge($end);

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
