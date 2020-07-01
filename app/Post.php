<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Post extends Model
{
    
    protected $table = 'posts';


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->select('*');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment','post_id','id')->select('*');
    }

    public function share()
    {
        return $this->hasMany('App\Share','post_id','id')->select('*');
    }

     public function reacts()
    {
        return $this->hasMany('App\React','post_id','id')->select('*');
    }
    public function myreact()
    {
        return $this->hasOne('App\React','post_id','id')->where('user_id',Auth::user()->id)->select('*');
    }


    
}
