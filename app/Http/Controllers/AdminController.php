<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Shows dashboard page
    public function dashboard(){
    	return view('admin.dashboard');
    }

    //Shows users page
    public function users(){
    	return view('admin.users');
    }

    //Shows leave page
    public function leave(){
    	return view('admin.leave');
    }

    //Shows benefits page
    public function benefits(){
    	return view('admin.benefits');
    }

    //Shows profile page
    public function showProfile(){
    	return view('admin.profile');
    }
}
