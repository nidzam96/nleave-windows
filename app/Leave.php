<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function branch(){
    	return $this->belongsTo('App\Branch');
    }

    public function ltype(){
    	return $this->belongsTo('App\Leavetype');
    }

    public function ltime(){
        return $this->belongsTo('App\Leavetime');
    }
    
    public function position(){
        return $this->belongsTo('App/Position');
    }

    protected $dates = ['start', 'end'];
}
