<?php

namespace App\Http\Controllers\Web;

use App\Follower;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Post;
use App\ProfileSettingsTable;
use App\Share;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSettingsController extends Controller
{
    public $record_per_page = 50;

    public function index(int $user_id, Request $request)
    {
        if ($user_id == (int)Auth::user()->id) {
            $isProfile = 1;
        } else {
            $isProfile = 0;
        }
        $user = User::where('id', $user_id)->where('status', 1)->first();
        $is_following = Follower::where('user_id', $user_id)->where('follower_id', Auth::user()->id)->count();
        $notifications = Notification::where('user_id', Auth::user()->id)->where('status', 0)->get();
        for ($i=0;$i<count($notifications);$i++)
        {
            $notifications[$i]['profile_pic'] = User::where('id', $notifications[$i]->notification_from)->first()['profile_pic'];
        }
        $posts = Post::where('user_id', $user_id)->with('comments.user')->get();
        //dd($posts->get());
        $posts = Post::where('status', 1)->where('user_id', $user_id)->with('user')->with('share')->with('reacts')->with('myreact')->with('comments.user')->get();


        $shared_posts = Share::where('user_id', $user_id)->with('user')->with('post.comments.user')->with('post.share')->with('post.reacts')->with('post.myreact')->get();

        $this->data['records'] = $posts->merge($shared_posts)->sortByDesc('created_at')->paginate($this->record_per_page);
        //dd($this->data['records']);
        $followerNo = Follower::where('user_id', $user_id)->get()->count();
        $followersArray = [];
        $followers = Follower::where('user_id', $user_id)->get();
        foreach ($followers as $follower) {
            array_push($followersArray, User::where('id', $follower->follower_id)->where('user_type', 1)->first());
        }
        if(ProfileSettingsTable::where('user_id', Auth::user()->id)->exists())
        {
            $privacy = ProfileSettingsTable::where('user_id', Auth::user()->id)->first()['privacy'];
        }else{
            $privacy = false;
        }

        return view('web.user.profile-settings', [
                'data' => $this->data,
                'data2' => $followersArray,
                'pageNo' => @$pageNo,
                'record_per_page' => $this->record_per_page,
                'request' => $request,
                'user_id' => $user_id,
                'user' => $user,
                'is_following' => $is_following,
                'notifications' => $notifications,
                'posts' => $posts,
                'isProfile' => $isProfile,
                'followerNo' => $followerNo,
                'privacy' => $privacy
            ]
        );
    }

    public function saveSettings(Request $request)
    {
        try {
            if (ProfileSettingsTable::where('user_id', Auth::user()->id)->exists()) {
                $profileSettingsTable = ProfileSettingsTable::where('user_id', Auth::user()->id)->first();
                $profileSettingsTable->privacy = $request->privacy;
                return json_encode(['status' => $profileSettingsTable->update()]);
            } else {
                $profileSettingsTable = new ProfileSettingsTable();
                $profileSettingsTable->user_id = Auth::user()->id;
                $profileSettingsTable->privacy = $request->privacy;
                return json_encode(['status' => $profileSettingsTable->save()]);
            }
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }
}
