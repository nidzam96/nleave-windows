<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    public function branch(){
    	return $this->belongsTo('App\Branch');
    }

    public function position(){
    	return $this->belongsTo('App\Position');
    }
}
