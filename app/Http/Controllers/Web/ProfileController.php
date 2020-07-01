<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Follower;
use Illuminate\Support\Facades\Auth;
use Validator;
use Route;
use App\User;
use App\Share;
use App\Post;
use App\React;
use App\Notification;
use Session;
use Carbon\Carbon;
use Redirect;

class ProfileController extends Controller
{

    public $record_per_page = 50;

    /**
     * Function __construct
     *
     * function constructor
     * @param  NULL
     * @return NULL
     */
    public function __construct()
    {
        $this->middleware('check_user_status');

    }

    /**
     * Function index
     *
     * function to load admin dashboard
     * @param  ARRAY
     * @return NULL
     */
    public function index(int $user_id, Request $request)
    {

        //$user_id = Auth::user()->id;
        if ($user_id==(int)Auth::user()->id){
            $isProfile=1;
        }
        else{
            $isProfile=0;
        }
        $user = User::where('id', $user_id)->where('status', 1)->first();
        $is_following = Follower::where('user_id', $user_id)->where('follower_id', Auth::user()->id)->count();
        $notifications = Notification::where('user_id', Auth::user()->id)->where('status', 0)->get();

        $posts = Post::where('user_id', $user_id)->with('comments.user')->get();
        //dd($posts->get());
        $posts = Post::where('status', 1)->where('user_id', $user_id)->with('user')->with('share')->with('reacts')->with('myreact')->with('comments.user')->get();


        $shared_posts = Share::where('user_id', $user_id)->with('user')->with('post.comments.user')->with('post.share')->with('post.reacts')->with('post.myreact')->get();

        $this->data['records'] = $posts->merge($shared_posts)->sortByDesc('created_at')->paginate($this->record_per_page);
        //dd($this->data['records']);
        return view('web.user.profile', [
            'data' => $this->data,
            'pageNo' => @$pageNo,
            'record_per_page' => $this->record_per_page,
            'request' => $request,
            'user_id' => $user_id,
            'user' => $user,
            'is_following' => $is_following,
            'notifications' => $notifications,
            'posts' => $posts,
                'isProfile'=>$isProfile
                ]
        );


    }

    public function suggestions(Request $request)
    {

        $my_followings = Follower::where('follower_id', Auth::user()->id)->pluck('user_id');
        //dd($my_followings);
        $notifications = Notification::where('user_id', Auth::user()->id)->where('status', 0)->get();

        $suggestion = User::whereNotIn('id', $my_followings)->where('id', '!=', Auth::user()->id)->where('user_type', 1);
        $this->data['records'] = $suggestion->paginate($this->record_per_page);

        return view('web.user.suggestions', [
            'data' => $this->data,
            'pageNo' => @$pageNo,
            'record_per_page' => $this->record_per_page,
            'suggestion' => $suggestion,
            'notifications' => $notifications
        ]);

    }

    public function save_profile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file.*' => 'mimes:jpeg,png,jpg,gif,svg,mp4|max:20000',
            'first_name' => 'required',
            'last_name' => 'required',
            'about_us' => 'required'

        ],
            [
                'file.*.mimes' => 'Only jpeg,png,jpg,gif,svg,mp4 are supported.',
                'file.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',


            ]);

        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400);

        } else {


            $input = $request->all();
            $user = User::find(Auth::user()->id);
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->about_us = $input['about_us'];
            if (!empty($input['youtube_link'])) {
                $user->youtube_link = $input['youtube_link'];
            }

            if (!empty($input['insta_link'])) {
                $user->insta_link = $input['insta_link'];
            }

            //dd($input);
            $images = array();
            if ($files = $request->file('file')) {
                $files = $request->file('file');
                foreach ($files as $key => $file) {


                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . $key . '_' . Auth::user()->id . '.' . $extension;
                    $file->move(public_path() . '/image/profileImages/', $filename);
                    // $verification_image['name'] = $filename;
                    // $verification_image['user_id'] = Auth::user()->id;
                    // $verification_image['type'] = $extension == 'mp4' ? 1 :0;

                    $user->profile_pic = $filename;
                    $user->save();


                }
            }

            $msg = 'Profile has been edited successfully.';
            $request->session()->flash('add_message', $msg);


            return response()->json(array(
                'success' => true,
                'errors' => $msg

            ), 200);

        }


    }


    public function save_profile1(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'about_us' => 'required'

        ],
            [


            ]);

        if ($validator->fails()) {
            return redirect()->route('profile', Auth::user()->id)
                ->withErrors($validator)
                ->withInput();

        } else {


            $input = $request->all();
            $user = User::find(Auth::user()->id);
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->about_us = $input['about_us'];
            if (!empty($input['youtube_link'])) {
                $user->youtube_link = $input['youtube_link'];
            }

            if (!empty($input['insta_link'])) {
                $user->insta_link = $input['insta_link'];
            }

            $user->save();

            $msg = 'Profile has been edited successfully.';
            $request->session()->flash('add_message', $msg);


            return Redirect::route('profile', Auth::user()->id);

        }


    }


}
