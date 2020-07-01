<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\ReplyCommentTable;
use Illuminate\Http\Request;
use App\Follower;
use Auth;
use Illuminate\Support\Facades\File;
use Validator;
use Route;
use App\User;
use App\Post;
use App\Comment;
use App\Share;
use App\React;
use Session;
use Carbon\Carbon;
use Redirect;

class PostController extends Controller {

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
    public function save_text_post(Request $request) {

      if ($request->all()) { //post
           
              $validator = Validator::make($request->all(), [
                    'post_text' => 'required',

                ],
                [
                    'required' =>'This field is required.'

                ]);
            
            if ($validator->fails()) 
            {
                
                    return redirect()->route('timeline')
                            ->withErrors($validator)
                            ->withInput();
                
            }
            else {
                $postType=0;
                $filename="";
                $post = new Post();
                if($files=$request->file('photo')){

                    $files = $request->file('photo');
                    $extension = $files->getClientOriginalExtension();
                    $filename = time().'_'.Auth::user()->id.'.'.$extension;
                    $files->move(public_path().'/image/postImages/', $filename);
                    $postType=1;
//                    foreach ($files as $key=>$file) {
//
//
//                        // $verification_image['name'] = $filename;
//                        // $verification_image['user_id'] = Auth::user()->id;
//                        // $verification_image['type'] = $extension == 'mp4' ? 1 :0;
//
//
//                    }
                }

                $post->user_id = Auth::user()->id;
                $post->image_name = $filename;
                $post->post_title = $request->post_text;
                $post->post_description = $request->post_text;
                $post->post_type = $postType;
                $post->save();
                $request->session()->flash('add_message', 'Post Has been Published');
                return Redirect::route('timeline');
                
            }
        }

        
    }

     public function share_post(Request $request) {

       //dd($request->all());
      if ($request->all()) { //post
           
              $validator = Validator::make($request->all(), [
                    'post_id' => 'required',

                ],
                [
                    'required' =>'This field is required.'

                ]);
            
            if ($validator->fails()) 
            {
                
                     return response()->json(array(
                    'success' => false,
                    'errors' => 'Something went wrong!!'

                ), 500);
                
            }
            else {

                $share = new Share();
                $share->user_id = Auth::user()->id;
                $share->text = $request->text;
                $share->post_id = $request->post_id;
                $share->save();
                //$request->session()->flash('add_message', 'Post has been shared.');
                return response()->json(array(
                    'success' => true,
                    'errors' => 'Post has been shared.'

                ), 200);
                
            }
        }

        
    }

    

     public function react_post(Request $request) {

       //dd($request->all());
      if ($request->all()) { //post
           
              $validator = Validator::make($request->all(), [
                    'post_id' => 'required',

                ],
                [
                    'required' =>'This field is required.'

                ]);
            
            if ($validator->fails()) 
            {
                
                     return response()->json(array(
                    'success' => false,
                    'errors' => 'Something went wrong!!'

                ), 500);
                
            }
            else {

                $oldreact =React::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->count();

                if($oldreact == 0){
                $react = new React();
                $react->user_id = Auth::user()->id;
                $react->react_type = $request->react_type;
                $react->post_id = $request->post_id;
                $react->save();    
                }else{

                $react = React::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->first();
                $react->react_type = $request->react_type;
                $react->save();
                }
                
                
                //$request->session()->flash('add_message', 'Post has been shared.');
                return response()->json(array(
                    'success' => true,
                    'errors' => 'Reacted.'

                ), 200);
                
            }
        }

        
    }
    public function save_comment(Request $request) {
       //dd($request->all());
      if ($request->all()) { //post
           
              $validator = Validator::make($request->all(), [
                    'comment' => 'required',

                ],
                [
                    'required' =>'This field is required.'

                ]);
            
            if ($validator->fails()) 
            {
                
                     return response()->json(array(
                    'success' => false,
                    'errors' => 'Something went wrong!!'

                ), 500);
                
            }
            else {

                $comment = new Comment();
                $comment->user_id = Auth::user()->id;
                $comment->post_id = $request->post_id;
                $comment->parent_id = 0;
                $comment->comment = $request->comment;
                $fileName="";
                if($request->hasFile('image')){
                    $brand_logo= $request->file('image');
                    $fileName = time().'.'.$brand_logo->getClientOriginalExtension();
                    $request->image->move(public_path('image/'), $fileName);
                    if(!File::exists(public_path('image/'. $fileName))) {  // check file exists in directory or not
                        return json_encode("Image is not uploaded!", 401);
                    }
                    $input["image"] = $fileName;
                    $comment->image=$fileName;
                }
                $comment->save();
               // $request->session()->flash('add_message', 'Comment Added Successfully');
                return response()->json(array(
                    'success' => true,
                    'user_name' =>Auth::user()->first_name." ".Auth::user()->last_name,
                    'comment' => $request->comment,
                    'user_image' => Auth::user()->profile_pic,
                    'image' => $fileName,
                    'errors' => 'Comment has been Published.'

                ), 200);
                
            }
        }

        
    }

    

    public function save_video_post(Request $request) {

       //dd($request->all());
      if ($request->all()) { //post
           
              $validator = Validator::make($request->all(), [
                    'post_text' => 'required',
                    'video_code' => 'required'

                ],
                [
                    'required' =>'This field is required.'

                ]);
            
            if ($validator->fails()) 
            {
                
                    return redirect()->route('timeline')
                            ->withErrors($validator)
                            ->withInput();
                
            }
            else {

                $post = new Post();
                $post->user_id = Auth::user()->id;
                $post->post_title = $request->post_text;
                $post->post_description = $request->post_text;
                $post->post_type = 2;
                $post->video_url = $request->video_code;
                $post->save();
                $request->session()->flash('add_message', 'Post Has been Published');
                return Redirect::route('timeline');
                
            }
        }

        
    }


    public function save_image_post(Request $request){
        //dd($request->all());

        $validator = Validator::make($request->all(), [
                    'file.*' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4|max:20000',
                    'post_text' => 'required'

                ],
                [
                    'file.*.mimes' =>'Only jpeg,png,jpg,gif,svg,mp4 are supported.',
                    'file.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',


                ]);
            
            if ($validator->fails()) 
            {
                return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400);

            }else{


                $input=$request->all();
                //dd($input);
                $images=array();
                if($files=$request->file('file')){
                    $files = $request->file('file');
                    foreach ($files as $key=>$file) {
                       

                        $extension = $file->getClientOriginalExtension();
                        $filename = time().$key.'_'.Auth::user()->id.'.'.$extension;
                        $file->move(public_path().'/image/postImages/', $filename);
                        // $verification_image['name'] = $filename;
                        // $verification_image['user_id'] = Auth::user()->id;
                        // $verification_image['type'] = $extension == 'mp4' ? 1 :0;

                        $post = new Post();
                        $post->image_name = $filename;
                        $post->post_type = 1;
                        $post->user_id = Auth::user()->id;
                        $post->post_title = $request->post_text;
                        $post->post_description = $request->post_text;
                        $post->save();



                    }
                }

            $msg = 'Post has been Published.';
            $request->session()->flash('add_message', $msg);


                return response()->json(array(
                'success' => true,
                'errors' => 'Post has been Published.'

            ), 200);

            }


    
    /*Insert your data*/

    }

    public function replyComment(Request $request)
    {
        $replyComment=new ReplyCommentTable();
        $replyComment->message=$request->message;
        $replyComment->id_comment=$request->commentId;
        $replyComment->id_user=Auth::user()->id;
        $replyComment->save();
        return response()->json(array(
            'success' => true,
            'comment' =>$request->message,
            'fname' => User::where('id', Auth::user()->id)->first()['first_name'],
            'lname' => User::where('id', Auth::user()->id)->first()['last_name'],
            'id_comment' => $request->commentId,
            'id_user' => Auth::user()->profile_pic,
            'errors' => 'Comment reply has been Published.'

        ), 200);
    }

}
