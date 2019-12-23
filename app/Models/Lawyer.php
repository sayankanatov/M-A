<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

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
        'worktime',
        'time',
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
            return self::where('city_id',$city_id)->whereHas('services', function($query) use ($service_id){
                $query->where('id',$service_id);
            })->inRandomOrder()->get();
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
