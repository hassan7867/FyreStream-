<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Route;
use App\User;
use Session;
use Carbon\Carbon;
use App\Country;
use App\State;
use App\City;
use App\Category;
use Hash;

class LoginController extends Controller {

    public $record_per_page;

    /**
     * Function __construct
     *
     * function constructor
     * @param  NULL
     * @return NULL
     */
    public function __construct() {
    }

    /**
     * Function index
     *
     * function to load admin dashboard
     * @param  ARRAY
     * @return NULL
     */
    public function login(Request $request) {

      return view('web.user.login',[]); 

    }

    function authenticate(Request $request)
    {
        
        $email = strtolower(trim($request->email));
        $password = trim($request->password);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->route('user-login')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $user = User::where('email',$email)->where('user_type','1')->where('status','=',1)->first();
            
           
            if($user)
            {
                 $check = Hash::check($password, $user->password);
                
                if(!$check)
                {
                    $validator->errors()->add('password', 'Invalid email or password!');
                    return redirect()->route('user-login')
                            ->withErrors($validator)
                            ->withInput();
                }
                else
                {
                    Auth::login($user);
                    $user->touch();
                    $user_data = array();
                    $user_data = array('id'=>$user->id,'email'=>$user->email,'name'=>$user->name,'user_type'=>'1');
                   
                    $request->session()->put('user_login', '1');
                    session(['email' => $user->email]);
                    session(['id' => $user->id]);
                    session(['name' => $user->name]);
                    session(['user_type' => '1']);
                    session(['user_data'=>$user_data]);
                   
                    return redirect()->route('timeline'); 
                }
            }
            else{
                $validator->errors()->add('password', 'Invalid email or password!');
                return redirect()->route('user-login')
                            ->withErrors($validator)
                            ->withInput();
            }
        }
    }



    public function register(Request $request){
        return view('web.user.register',[]); 
    }

    public function save_user(Request $request){
        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'gender' => 'required'

            
        ]);
        if ($validator->fails()) {
            return redirect()->route('user-register')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            //dd($request->all());

            $user = new User();
            if ($request->gender=='male'){
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->user_type = 1;
                $user->ip_address =  \Request::ip();
                $user->password = Hash::make($request->password);
                $user->gender = $request->gender;
                $user->profile_pic = 'avatar.png';
                $user->save();
                //send regsiter link templete
                $msg = 'Registered Successfully';
                $request->session()->flash('add_message', $msg);
                return redirect()->route('user-login');
            }
            elseif ($request->gender=='female'){
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->user_type = 1;
                $user->ip_address =  \Request::ip();
                $user->password = Hash::make($request->password);
                $user->gender = $request->gender;
                $user->profile_pic = 'female-avatar.png';
                $user->save();
                //send regsiter link templete
                $msg = 'Registered Successfully';
                $request->session()->flash('add_message', $msg);
                return redirect()->route('user-login');
            }
           
            
        }

    }

    public function logout(Request $request)
    {

        
        $request->session()->forget('user_login');
        $request->session()->forget('id');
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('user_type');
        $request->session()->forget('user_data');
        //$request->session()->flush();
        //$request->session()->regenerate();
        Auth::logout();
        return redirect()->route('user-login');
    }

    public function check_email(Request $request)
    {
        
        $email = User::where('email','=',$request->input('email'))->get();
        if ($email->count()>0) {
            echo "false";
            die;
        } else {
            echo "true";
            die;
        }
        
    }




}
