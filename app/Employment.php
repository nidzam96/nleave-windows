<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function staff(){
    	return $this->belongsTo('App\Staff');
    }

    public function branch(){
    	return $this->belongsTo('App\Branch');
    }

    public function position(){
    	return $this->belongsTo('App\Position');
    }

    public function department(){
    	return $this->belongsTo('App\Department');
    }
}
