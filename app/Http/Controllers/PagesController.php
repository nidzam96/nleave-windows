<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //
    public function getLogin(){
    	// dd(1);
    	return view('auth.login');
    }
}
