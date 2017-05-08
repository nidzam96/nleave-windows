<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use App\Branch;
use App\Leavetype;
use App\Leavetime;

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

        $branch = Branch::all();
        $ltype = Leavetype::all();
        $ltime = Leavetime::all();

        $leave = Leave::all();

        return view('admin.leave')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('leaves', $leave);
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
