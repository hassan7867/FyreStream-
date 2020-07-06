<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Follower;
use App\Notification;
use App\User;
use App\Share;
use App\Post;
use App\React;
use Auth;
use Validator;
use Route;

use Session;
use Carbon\Carbon;
use View;

class TimelineController extends Controller {

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
    public function index(Request $request) {


        $my_followings = Follower::where('follower_id',Auth::user()->id)->where('status',1)->pluck('user_id');
        
        $my_followings->push(Auth::user()->id);


        $posts = Post::where('status',1)->whereIn('user_id',$my_followings)->with('user')->with('share')->with('reacts.user')->with('myreact')->with('comments.user')->get();
        
        
        $shared_posts = Share::whereIn('user_id',$my_followings)->with('user')->with('post.comments.user')->with('post.share')->with('post.user')->with('post.reacts.user')->with('post.myreact')->get();
        //dd($shared_posts);
        //$shared_posts = Post::where('status',1)->whereIn('id',$shared_post_ids)->with('user')->with('comments.user')->orderBy('created_at','DESC');
        //dd($this->record_per_page);

       
        $user_id = Auth::user()->id;

        $notifications= Notification::where('user_id',Auth::user()->id)->where('status',0)->get();
        for ($i=0;$i<count($notifications);$i++)
        {
            $notifications[$i]['profile_pic'] = User::where('id', $notifications[$i]->notification_from)->first()['profile_pic'];
        }
        
       $this->data['records'] = $posts->merge($shared_posts)->sortByDesc('created_at')->paginate($this->record_per_page);


        return view('web.timeline.timeline',[
            'data' => $this->data,
            'pageNo' => @$pageNo,
            'record_per_page' => $this->record_per_page,
            'request'=>$request,
            'notifications'=>$notifications
             ]); 

        
    }




}