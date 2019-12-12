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
    protected $redirectTo = '/ru/home';

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

        $role = $request->role;

        $request_email = 'email'.$role;
        $request_password = 'password'.$role;
        $request_confirm = 'password_confirmation'.$role;

        $email = $request->{$request_email};
        $password = $request->{$request_password};
        $confirm = $request->{$request_confirm};

        $existUser = User::where('email',$email)->first();

        if($existUser){
            Session::flash('message', 'Пользователь с таким email-ол уже существует');
            return redirect(route('register'));
        }

        if($password !== $confirm){
            Session::flash('message', 'Пароль не совпал');
            return redirect(route('register'));
        }

        // Copy the default behaviour here
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if($data['role'] == Config::get('constants.roles.individual')){

            $role = Config::get('constants.roles.individual');

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
            $lawyer->email = $data['email'.$role];
            $lawyer->city_id = $data['city_id'.$role];
            $lawyer->user_id = $user_id;
            $lawyer->save();

            User::sendMail($user_id);

            return $user;
        }
        elseif ($data['role'] == Config::get('constants.roles.entity')) {
            # code...
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
            $lawyer->email = $data['email'.$role];
            $lawyer->city_id = $data['city_id'.$role];
            $lawyer->user_id = $user_id;
            $lawyer->save();

            User::sendMail($user_id);

            return $user;
        }
        elseif ($data['role'] == Config::get('constants.roles.company')) {
            # code...
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
            $company->city_id = $data['city_id'.$role];
            $company->user_id = $user_id;
            $company->save();

            User::sendMail($user_id);

            return $user;
        }
        
    }
}
