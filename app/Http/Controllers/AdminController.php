<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use App\Branch;
use App\Leavetype;
use App\Leavetime;
use App\Position;
use App\Staff;
use App\Employment;
use App\Department;
use App\Compensation;
use App\User;

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

    	$branch = Branch::all();
        $ltype = Leavetype::all();
        $ltime = Leavetime::all();
        $staff = Staff::all();
        $position = Position::all();

        return view('admin.users')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('staff', $staff)->with('position', $position);
    }

    //Shows leave page
    public function leave(){

        $branch = Branch::all();
        $ltype = Leavetype::all();
        $ltime = Leavetime::all();
        $staff = Staff::all();

        // $branch = Branch::pluck('branch_name', 'id');
        // $ltype = Leavetype::pluck('leave_name', 'id');
        // $ltime = Leavetime::pluck('times_name', 'id');

        if (Auth()->user()->position == '7') {
            # code...
            $leave = Leave::all();
        }
        else{
            $leave = Leave::where('user_id', '=', Auth()->user()->id)->get();
        }

        return view('admin.leave')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('leaves', $leave)->with('staff', $staff);

        // return view('admin.leave', compact('leave', 'branch', 'ltype', 'ltime'));
    }


    //Shows benefits page
    public function benefits(){
    	return view('admin.benefits');
    }

    //Shows profile page
    public function showProfile(){
    	
        $branch = Branch::all();
        $ltype = Leavetype::all();
        $ltime = Leavetime::all();
        $position = Position::all();
        $staff = Staff::where('user_id', '=', Auth()->user()->id)->get();
        $employment = Employment::where('user_id', '=', Auth()->user()->id)->get();
        $compensation = Compensation::where('user_id', '=', Auth()->user()->id)->get();

        return view('admin.profile')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('staff', $staff)->with('position', $position)->with('employment', $employment)->with('compensation', $compensation);
    }

    public function add_user(){
        
        $branch = Branch::all();
        $ltype = Leavetype::all();
        $ltime = Leavetime::all();
        $position = Position::all();

        return view('admin.add_user')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('position', $position);
    }

    public function first_login(){

        return view('first_registeration');
    }

    public function setpassword(Request $request){

        $email    = $request->input('email');
        $password = bcrypt($request->input('password'));
        $user = User::where('email', '=', $email)->update(array ('password' => $password ));

        $user_id = User::where('email', '=', $email)->first();
        $get_id  = $user_id->id;
        $staff   = Staff::where('email', '=', $email)->update(array ('user_id' => $get_id));

        return redirect('/');
    }
}
