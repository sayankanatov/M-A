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
        'image',
        'company',
        'address',
        'telephone',
        'extra_telephone',
        'email',
        'link',
        'worktime',
        'time',
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
        'user_id'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function getByServices($city,$service_id){

        $lawyers = self::where('city_id',$city)->get();

        $array = array();

        foreach ($lawyers as $key => $lawyer) {
            # code...
            foreach ($lawyer->services as $key => $service) {
                # code...
                if($service->id == $service_id){
                    array_push($array, $lawyer->id);
                }
            }
        }

        $lawyers = self::whereIn('id',$array)->get();

        return $lawyers;
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
