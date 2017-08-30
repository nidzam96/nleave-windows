<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SuperController extends Controller
{
    //
    public function add()
    {
    	// show add hr page
    	return view('admin.add_hr');
    }
}
