<<<<<<< HEAD
=======
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
}
>>>>>>> ec825643444da9b5ef599f246757d986d79c9fe8
