<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

use Config;
use Session;
use App\Models\Lawyer;
use App\Models\Company;
use Exception;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    public function register(Request $request) {

        try{
            if( $request->check1 == 'on' ){
                $role = Config::get('constants.roles.individual');
            }elseif( $request->check2 == 'on' ){
                $role = Config::get('constants.roles.entity');
            }else{
                $role = Config::get('constants.roles.company');
            }

            $request_email = 'email'.$role;
            $request_password = 'password'.$role;
            $request_confirm = 'password_confirmation'.$role;

            $email = $request->{$request_email};
            $password = $request->{$request_password};
            $confirm = $request->{$request_confirm};

            $existUser = User::where('email',$email)->first();

            if($existUser){
                Session::flash('message', 'Пользователь с таким email уже существует');
                return redirect(route('main'));
            }

            if($password !== $confirm){
                Session::flash('message', 'Пароль не совпал');
                return redirect(route('main'));
            }
            // Copy the default behaviour here
            event(new Registered($user = $this->create($request->all())));

            $this->guard()->login($user);

            return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());

        }catch(Exception $e){
            Session::flash('message', 'Не верно введены данные');
            return redirect(route('main'));
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if( isset($data['check1']) && $data['check1'] == 'on' ){

            $role = Config::get('constants.roles.individual');

            $user = new User();
            $user->name = $data['first_name'.$role];
            $user->email = $data['email'.$role];
            $user->password = Hash::make($data['password'.$role]);
            $user->role_id = $role;
            $user->save();

            $user_id = $user->id;
            User::sendMail($user_id);
            return $user;
        }
        elseif( isset($data['check2']) && $data['check2'] == 'on' ){
            $role = Config::get('constants.roles.entity');

            $user = new User();
            $user->name = $data['first_name'.$role];
            $user->email = $data['email'.$role];
            $user->password = Hash::make($data['password'.$role]);
            $user->role_id = $role;
            $user->save();

            $user_id = $user->id;

            $lawyer = new Lawyer();
            $lawyer->last_name = $data['last_name'.$role];
            $lawyer->first_name = $data['first_name'.$role];
            $lawyer->patronymic = $data['patronymic'.$role];
            $lawyer->telephone = $data['telephone'.$role];

            $cut_name = str_limit($data['last_name'.$role].'-'.$data['first_name'.$role].'-'.$data['patronymic'.$role], $limit = 200, $end = '-');
            $alias = Str::slug($cut_name.'-'.rand(1,9999), '-');

            $lawyer->alias = $alias;
            $lawyer->email = $data['email'.$role];
            $lawyer->city_id = $data['city_id'.$role];
            $lawyer->user_id = $user_id;
            $lawyer->save();

            User::sendMail($user_id);
            return $user;
        }
        elseif( isset($data['check3']) && $data['check3'] == 'on'){
            $role = Config::get('constants.roles.company');

            $user = new User();
            $user->name = $data['name'.$role];
            $user->email = $data['email'.$role];
            $user->password = Hash::make($data['password'.$role]);
            $user->role_id = $role;
            $user->save();

            $user_id = $user->id;

            $company = new Company();
            $company->name = $data['name'.$role];
            $company->telephone = $data['telephone'.$role];
            $company->email = $data['email'.$role];

            $cut_name = str_limit($data['name'.$role], $limit = 200, $end = '-');
            $alias = Str::slug($cut_name.'-'.rand(1,9999), '-');

            $company->alias = $alias;
            $company->city_id = $data['city_id'.$role];
            $company->user_id = $user_id;
            $company->save();

            User::sendMail($user_id);
            return $user;
        }
    }
}
