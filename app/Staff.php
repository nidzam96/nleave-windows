<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password','position',
    ];

    public function branch(){
    	return $this->belongsTo('App\Branch');
    }

    public function position(){
    	return $this->belongsTo('App\Position');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
