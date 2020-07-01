<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use Illuminate\Cookie\CookieJar;
use Illuminate\Cookie\CookieServiceProvider;
use Cookie;
use App\User;

class LoginController extends Controller
{
    /**
    * Function __construct
    *
    * function CONSTRUCTOR
    *
    * @Created Date: 04 June, 2017
    * @Modified Date: 04 June, 2017
    * @Created By: Diksha Srivastava
    * @Modified By: Diksha Srivastava
    * @param  INT
    * @return NULL
    */
    public function __construct(Request $request) {
        
     
       
    }
    /**
    * Function login
    *
    * function to load login page
    * @param  INT
    * @return NULL
    */
    public function login(Request $request)
    {

        $temp = @$request->session()->has('admin_login');
        if($temp && $temp==1){
            return redirect('admin/dashboard');
        }
        $AdminLoginDetails = Cookie::get('loginAdminData', array());
        return view('admin.login',['AdminLoginDetails'=>$AdminLoginDetails]); 
    }
    /**
    * Function authenticate
    *
    * function to authenticate login 
    *
    * @Created Date: 04 June, 2017
    * @Modified Date: 04 June, 2017
    * @Created By: Diksha Srivastava
    * @Modified By: Diksha Srivastava
    * @param  INT
    * @return NULL
    */
    function authenticate(Request $request)
    {
        
        $email = strtolower(trim($request->email));
        $password = trim($request->password);

        //dd(Hash::make($password));

        //Validate the input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin-login')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $user = User::where('email',$email)->where('user_type','2')->first();
           
            if($user)
            {
                 $check = Hash::check($password, $user->password);
                
                if(!$check)
                {
                    $validator->errors()->add('password', 'Invalid email or password!');
                    return redirect()->route('admin-login')
                            ->withErrors($validator)
                            ->withInput();
                }
                else
                {
                   
                    $admin_data = array();
                    $admin_data = array('id'=>$user->id,'email'=>$user->email,'name'=>$user->first_name,'user_type'=>'2');
                    //dd($user);
//do login & start session
                    $request->session()->put('admin_login', '1');
                    session(['email' => $user->email]);
                    session(['id' => $user->id]);
                    session(['user_name' => $user->user_name]);
                    session(['name' => $user->first_name]);
                    session(['user_type' => '2']);
                    session(['ADMIN_LOGIN_DATA'=>$admin_data]);
                   
                    return redirect()->route('admin-dashboard'); 
                }
            }
            else{
                $validator->errors()->add('password', 'Invalid email or password!');
                return redirect()->route('admin-login')
                            ->withErrors($validator)
                            ->withInput();
            }
        }
    }
    /**
    * Function logout
    *
    * function to logout
    *
    * @Created Date: 04 June, 2017
    * @Modified Date: 04 June, 2017
    * @Created By: Diksha Srivastava
    * @Modified By: Diksha Srivastava
    * @param  INT
    * @return NULL
    */
    public function logout(Request $request)
    {
        $request->session()->forget('admin_login');
        $request->session()->forget('id');
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('user_name');
        $request->session()->forget('user_type');
        $request->session()->forget('ADMIN_LOGIN_DATA');
        //$request->session()->flush();
        //$request->session()->regenerate();
        return redirect()->route('admin-login');
    }
}
