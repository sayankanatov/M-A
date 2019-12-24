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
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

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
