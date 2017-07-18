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
use App\Birthday;
use App\Claim;
use App\Claim_application;
use DB;

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
        $this->middleware('auth')->except('first_login', 'setpassword');
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

        if (Auth()->user()->position == 'HR') {
            # code...
            $leave = Leave::all();
            // $leave = Leave::paginate(2);
            // $leave = $leave->paginate(5);
        }
        else{
            $leave = Leave::where('user_id', '=', Auth()->user()->id)->get();
            // $leave = Leave::paginate(2);
        }


        return view('admin.leave')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('leaves', $leave)->with('staff', $staff);

        // return view('admin.leave', compact('leave', 'branch', 'ltype', 'ltime'));
    }


    //Shows benefits page
    public function benefits(){
    	return view('admin.benefits');
    }

    //Shows claim page
    public function claim()
    {
        $claim = Claim::all();

        if (Auth()->user()->position == 'HR') {
            # code...
            $claim_app = Claim_application::all();
        }
        else{
            $claim_app = Claim_application::where('user_id', '=', Auth()->user()->id)->get();
        }

        $amount = Claim_application::select(DB::raw("SUM(total_amount) as count"))
                ->where('user_id', '=', Auth()->user()->id )
                ->where('status', '=', 'Approve')
                ->orderBy("created_at")
                ->groupBy(DB::raw("month"))
                ->get()->toArray();
        $amount = array_column($amount, 'count');

        $month = Claim_application::select(DB::raw("month as count"))
                ->where('user_id', '=', Auth()->user()->id )
                ->where('status', '=', 'Approve')
                ->orderBy("created_at")
                ->groupBy(DB::raw("month"))
                ->get()->toArray();
        $month = array_column($month, 'count');

        return view('admin.claim')
            ->with('claim', $claim)
            ->with('claim_app', $claim_app)
            ->with('amount',json_encode($amount,JSON_NUMERIC_CHECK))
            ->with('month',json_encode($month,JSON_NUMERIC_CHECK));
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

        // dd($compensation);

        return view('admin.profile')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('staff', $staff)->with('position', $position)->with('employment', $employment)->with('compensation', $compensation);
    }

    public function add_user(){    

        
        $branch = Branch::all();
        $ltype = Leavetype::all();
        $ltime = Leavetime::all();
        $position = Position::all();
        $staff    = Staff::all();

        return view('admin.add_user')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('position', $position)->with('staff', $staff);
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

        $staff        = Staff::where('email', '=', $email)->update(array ('user_id' => $get_id));
        $compensation = Compensation::where('email', '=', $email)->update(array ('user_id' => $get_id));
        $employment   = Employment::where('email', '=', $email)->update(array ('user_id' => $get_id));
        $employment   = Birthday::where('email', '=', $email)->update(array ('user_id' => $get_id));

        return redirect('/admin/leave');
    }
}
