<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Lawyer;
use App\Models\Company;
use App\Models\City;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        $cities = City::all();

        if($user->role_id == 1){

            $info = $user;
            $city = '';

        }elseif($user->role_id == 2){

            $info = Lawyer::where('user_id',$user->id)->first();
            $city = City::where('id',$info->city_id)->first();

        }elseif($user->role_id == 3){

            $info = Company::where('user_id',$user->id)->first();
            $city = City::where('id',$info->city_id)->first();
        }

        return view('home',compact('info','city','user','cities'));
    }

    public function updateLawyer(Request $request, $id)
    {
        try{
            $lawyer = Lawyer::find($id);

            $lawyer->update([
                'last_name' => $request->get('last_name'),
                'first_name' => $request->get('first_name'),
                'patronymic' => $request->get('patronymic'),
                'address' => $request->get('address'),
                'telephone' => $request->get('telephone'),
                'email' => $request->get('email'),
                'monday' => $request->get('monday') == 'on' ? 1 : 0,
                'tuesday' => $request->get('tuesday') == 'on' ? 1 : 0,
                'wednesday' => $request->get('wednesday') == 'on' ? 1 : 0,
                'thursday' => $request->get('thursday') == 'on' ? 1 : 0,
                'friday' => $request->get('friday') == 'on' ? 1 : 0,
                'saturday' => $request->get('saturday') == 'on' ? 1 : 0,
                'sunday' => $request->get('sunday') == 'on' ? 1 : 0,
                'timetext' => $request->get('timetext'),
                'education' => $request->get('education'),
                'extra' => $request->get('extra'),
                'work_experience' => $request->get('work_experience'),
                'practice' => $request->get('practice')
            ]);

            return redirect(route('home'));

        }catch(Exception $e){

            return redirect(route('home'));
        }

    }

    public function storePhotoLawyer(Request $request, $id)
    {
        try{
            $lawyer = Lawyer::find($id);

            $image = $request->file('image');
            $unique = str_random(8); // For unique naming
            $src = "";

            if($image){
                // Upload images
                $destinationPath = 'uploads/lawyers/images';
                $fileName = "image".$unique.'.'.$image->getClientOriginalExtension();
                $uploadSuccess = $image->move($destinationPath, $fileName);
                $src = '/'.$destinationPath.'/'.$fileName;            
            }
            //Save in db row
            $lawyer->update(['image' => $src ? $src : '']);

            return redirect(route('home'));

        }catch(Exception $e){
            
            return redirect(route('home'));
        }

    }


    public function updateCompany(Request $request, $id)
    {
        try{
            $lawyer = Company::find($id);

            $lawyer->update([
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'telephone' => $request->get('telephone'),
                'email' => $request->get('email'),
                'monday' => $request->get('monday') == 'on' ? 1 : 0,
                'tuesday' => $request->get('tuesday') == 'on' ? 1 : 0,
                'wednesday' => $request->get('wednesday') == 'on' ? 1 : 0,
                'thursday' => $request->get('thursday') == 'on' ? 1 : 0,
                'friday' => $request->get('friday') == 'on' ? 1 : 0,
                'saturday' => $request->get('saturday') == 'on' ? 1 : 0,
                'sunday' => $request->get('sunday') == 'on' ? 1 : 0,
                'extra' => $request->get('extra')
            ]);

            return redirect(route('home'));

        }catch(Exception $e){

            return redirect(route('home'));
        }

    }

    public function storePhotoCompany(Request $request, $id)
    {
        try{
            $lawyer = Company::find($id);

            $image = $request->file('image');
            $unique = str_random(8); // For unique naming
            $src = "";

            if($image){
                // Upload images
                $destinationPath = 'uploads/companies/images';
                $fileName = "image".$unique.'.'.$image->getClientOriginalExtension();
                $uploadSuccess = $image->move($destinationPath, $fileName);
                $src = '/'.$destinationPath.'/'.$fileName;            
            }
            //Save in db row
            $lawyer->update(['logo' => $src ? $src : '']);

            return redirect(route('home'));

        }catch(Exception $e){
            
            return redirect(route('home'));
        }

    }
}
