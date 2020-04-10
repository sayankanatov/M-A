<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function company()
    {
        return $this->belongsTo('App\Models\Company','user_id');
    }

    public function lawyer()
    {
        return $this->belongsTo('App\Models\Lawyer','user_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role','role_id');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\FeedBack','user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function hasRole($user_id)
    {
        //1 - физ лицо
        //2 - юрист
        //3 - компания
        $user = self::find($user_id);
        return $user->role_id ?? false;
    }

    public static function sendMail($user_id)
    {
        $user ="info@yuristy.kz";
        $subject = 'Зарегистрирован новый пользователь';
        $message = 'Зарегистрирован новый пользователь '.$user->email;

        $headers  = "From: yuristy.kz < info@yuristy.kz >\n";
        $headers .= "Cc: yuristy.kz < info@yuristy.kz >\n"; 
        $headers .= "X-Sender: yuristy.kz < info@yuristy.kz >\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!
        $headers .= "Return-Path: info@yuristy.kz\n"; // Return path for errors
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

        return mail($to, $subject, $message, $headers);
    }
}
