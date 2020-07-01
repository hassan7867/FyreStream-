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
use App\Post;
use App\Comment;
use Session;
Use Str;
use Carbon\Carbon;
use Response;

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
       // $this->get_records();
        $this->middleware('check_admin_status');
    }

    
    public function index(Request $request) {

         $pageNo = trim($request->input('page', 1));
         $posts = Post::whereIn('status',[0,1])->with('user');
         
         $this->data['records'] = $posts->paginate($this->record_per_page);
       

        return view('admin.posts.allposts', ['data' => $this->data, 'pageNo' => @$pageNo, 'record_per_page' => $this->record_per_page,'request'=>$request]); 

        
    }

    
   

    public function delete_post($post_id,Request $request) {
        if ($post_id) {
            $post = Post::find($post_id);
            
            if($post->delete()){
                $msg = 'Post has been deleted successfully.';
                $request->session()->flash('message', $msg);
            }
        }
       return redirect()->route('manage-posts');
    }

    public function change_status($post_id,Request $request){
        if ($post_id) {
            $post = Post::find($post_id);
            $post->status = $post->status == 1 ? 0 :1;


            if($post->update()){

                $msg = 'Updated successfully.';
                $request->session()->flash('message', $msg);
            }
        }
       return redirect()->back();

    }



    



    
  


}