<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\ProfileSettingsTable;
use Illuminate\Http\Request;
use App\Follower;
use App\Notification;
use Auth;
use Validator;
use Route;
use App\User;
use Session;
use Carbon\Carbon;
use Redirect;

class FollowController extends Controller {

    public $record_per_page = 50;

    /**
     * Function __construct
     *
     * function constructor
     * @param  NULL
     * @return NULL
     */
    public function __construct() {
         $this->middleware('check_user_status');

    }

    /**
     * Function index
     *
     * function to load admin dashboard
     * @param  ARRAY
     * @return NULL
     */
    public function follow($user_id,Request $request) {

       
        $is_following = Follower::where('user_id',$user_id)->where('follower_id',Auth::user()->id)->count();
        //$user = User::find($user_id);  
         
         if(ProfileSettingsTable::where('user_id', $user_id)->exists() && ProfileSettingsTable::where('user_id', $user_id)->first()['privacy'] == 0){
            $follow = new Follower();
            $follow->user_id = $user_id;
            $follow->follower_id = Auth::user()->id;
            $follow->status = 1;
            $follow->save();
            $message = Auth::user()->first_name." ".Auth::user()->last_name." has followed you.";
            $this->notifyUser($user_id,Auth::user()->id,$message);
         }elseif (ProfileSettingsTable::where('user_id', $user_id)->exists() && ProfileSettingsTable::where('user_id', $user_id)->first()['privacy'] == 1)
         {
             $follow = new Follower();
             $follow->user_id = $user_id;
             $follow->follower_id = Auth::user()->id;
             $follow->status = 0;
             $follow->save();
             $message = Auth::user()->first_name." ".Auth::user()->last_name." has requested to follow you.";
             $this->notifyUser($user_id,Auth::user()->id,$message);
         }else{
             $follow = new Follower();
             $follow->user_id = $user_id;
             $follow->follower_id = Auth::user()->id;
             $follow->status = 1;
             $follow->save();
             $message = Auth::user()->first_name." ".Auth::user()->last_name." has followed you.";
             $this->notifyUser($user_id,Auth::user()->id,$message);
         }
        return redirect()->back();

        
    }

    public function notifyUser($user_id,$notification_from,$message){

        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->notification_from = $notification_from;
        $notification->message = $message;
        $notification->save();
    }

    public  function accept_follow($notification_from,$notification_id, Request $request){

        $follow = Follower::where('user_id',Auth::user()->id)->where('follower_id',$notification_from)->first();
        $notification = Notification::find($notification_id);
        $notification->status = 1;
        $notification->save();
      // dd($follow);
        $follow->status=1;
        $follow->update();
        return Redirect::route('profile',$notification_from);
    }

    public  function rejectFollow($notification_from,$notification_id, Request $request){

        Follower::where('user_id',Auth::user()->id)->where('follower_id',$notification_from)->first()->delete();
        $notification = Notification::find($notification_id);
        $notification->status = 1;
        $notification->save();
        return redirect()->back();
    }




}