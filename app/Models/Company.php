<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

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
            return self::where('city_id',$city_id)->where('is_deleted',0)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            })->count();
        }else{
            return self::where('city_id',$city_id)->where('is_deleted',0)->whereHas('services', function($query) use ($service_id){
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
