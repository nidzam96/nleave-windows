<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use App\Branch;
use App\Leavetype;

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

        $varbranch = Branch::all();

        return view('admin.leave')->with('branchview', $varbranch);
    }

    public function applyLeave(Request $request){
        $varpost=New Leave;

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
