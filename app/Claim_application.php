<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim_application extends Model
{
    //
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function branch(){
    	return $this->belongsTo('App\Branch');
    }

    public function claim(){
    	return $this->belongsTo('App\Claim');
    }
}
