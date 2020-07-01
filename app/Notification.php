<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    
    protected $table = 'notifications';


    public function post()
    {
        return $this->belongsTo('App\User','user_id','id')->select('*');
    }

   

    
}
