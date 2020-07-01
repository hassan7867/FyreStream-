<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Route;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
Use Str;
use Carbon\Carbon;
use Response;

class UserController extends Controller {

     public $record_per_page = 50;

    /**
     * Function __construct
     *
     * function constructor
     * @param  NULL
     * @return NULL
     */
    public function __construct() {
       // $this->get_records();
        $this->middleware('check_admin_status');
    }

    
    public function index(Request $request) {

         $pageNo = trim($request->input('page', 1));
         $users = User::whereIn('status',[0,1])->where('user_type','=',1);
         
         $this->data['records'] = $users->paginate($this->record_per_page);
       

        return view('admin.users.allusers', ['data' => $this->data, 'pageNo' => @$pageNo, 'record_per_page' => $this->record_per_page,'request'=>$request]); 

        
    }

    public function add_user(Request $request){

        $countries = Country::where('status','=','1')->get();
        //dd($countries);

        return view('admin.city.add_city', ['countries'=>$countries]); 

    }

    public function edit_user($user_id,Request $request) {
           
            $user = User::find($user_id);
            //dd($state);
            return view('admin.users.edit_user', ['data' => $user]);
    }

    public function delete_user($user_id,Request $request) {
        if ($user_id) {
            $user = User::find($user_id);
            
            if($user->delete()){
                $msg = 'User has been deleted successfully.';
                $request->session()->flash('message', $msg);
            }
        }
       return redirect()->route('manage-users');
    }

    public function change_status($user_id,Request $request){
        if ($user_id) {
            $user = User::find($user_id);
            $user->status = $user->status == 1 ? 0 :1;


            if($user->update()){

                $msg = 'Updated successfully.';
                $request->session()->flash('message', $msg);
            }
        }
       return redirect()->back();

    }



    

    public function save_user(Request $request){


        if ($request->all()) { //post
           
            
            //dd($request->all());
            //SS$reply_id = 1; 

             $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                ]);
            
            if ($validator->fails()) 
            {
                
                    return redirect()->route('edit-user')
                            ->withErrors($validator)
                            ->withInput();
                
            }
            else {

                if(empty($request->id)){
                    $user = new User();
                }else{
                     $user = User::find($request->id);
                }
                
               $user->first_name = $request->first_name;
               $user->last_name = $request->last_name;
               $user->phone = $request->phone;
               $user->email = $request->email;
               $user->status = $request->status;
               $user->email_verified = $request->email_verified;
               if(!empty($request->password)){
                $user->password = Hash::make($request->password);
               }
               $user->save();
               $msg = 'User has been updated successfully.';
               $request->session()->flash('add_message', $msg);
               return redirect()->route('manage-users');
                
            }
        }

    }


    public function verification_requests(Request $request){


         $pageNo = trim($request->input('page', 1));
         $users = User::where('user_type',1)->orderBy('is_verified','ASC')->whereHas('verifications')->with('verifications');
         
         $this->data['records'] = $users->paginate($this->record_per_page);
       

        return view('admin.users.verification_requests', ['data' => $this->data, 'pageNo' => @$pageNo, 'record_per_page' => $this->record_per_page,'request'=>$request]);
     

    }

    public function verification_requests_detail($user_id, Request $request){

        $verification_data_image = Verification::where('user_id',$user_id)->where('file_type',0)->get();
        $verification_data_video = Verification::where('user_id',$user_id)->where('file_type',1)->get();
        //dd($verification_data);
        $user = User::find($user_id);
        return view('admin.users.verification_detail', ['verification_data_video' => $verification_data_video,'verification_data_image'=>$verification_data_image,'user_data'=>$user]);

    }

    public function verification_requests_update($user_id, Request $request){
        $user = User::find($user_id);
        $user->is_verified = 1;
        $user->update();

        $Verification_data = Verification::where('user_id',$user_id)->update(['is_verified'=>1]);

         $msg = 'Verified updated successfully.';
         $request->session()->flash('add_message', $msg);
          return redirect()->route('user_verification_requests');


    }

    
  


}