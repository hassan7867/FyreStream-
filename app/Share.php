<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Share extends Model
{
    
    protected $table = 'shared_posts';


    public function post()
    {
        return $this->belongsTo('App\Post','post_id','id')->select('*');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->select('*');
    }

    
}
