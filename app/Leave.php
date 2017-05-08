<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    public function user(){
    	$this->belongsTo('App\User');
    }

    public function branch(){
    	$this->belongsTo('App\Branch');
    }

    public function ltype(){
    	$this->belongsTo('App\Leavetype');
    }

    public function ltime(){
        $this->belongsTo('App\Leavetime');
    }

    protected $dates = ['start', 'end'];
}
