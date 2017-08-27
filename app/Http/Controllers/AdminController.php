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
use App\Role;
use DB;
use Carbon\Carbon;

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
        $this->middleware('auth')->except('first_login', 'setpassword','registerform');
    }

    // Shows dashboard page
    public function dashboard(){
        $leave = Leave::where('status', '=', 'Pending')
            ->orWhere('status', '=', 'Approve')
            ->paginate(5, ['*'], 'leave');

        $claim = Claim_application::paginate(5, ['*'], 'claim');

    	return view('admin.dashboard')->with('leave', $leave)->with('claim', $claim);
    }

    //Shows users page
    public function users(){

    	$branch = Branch::all();
        $ltype = Leavetype::all();
        $ltime = Leavetime::all();
        $staff = Staff::paginate(10);
        $position = Position::all();

        return view('admin.users')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('staff', $staff)->with('position', $position);
    }

    public function registerform()
    {

        return view('register_form');
    }

    //Shows leave page with pagination
    public function leave(){

        $branch = Branch::all();
        $ltype = Leavetype::all();
        $ltime = Leavetime::all();
        $staff = Staff::all();

        if (Auth()->user()->position == 'HR') {
            $leave = Leave::paginate(5);
        }
        else{
            $leave = Leave::where('user_id', '=', Auth()->user()->id)->paginate(5);
        }


        return view('admin.leave')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('leaves', $leave)->with('staff', $staff);
    }


    //Shows benefits page
    public function benefits(){
    	return view('admin.benefits');
    }

    //Shows claim page
    public function claim()
    {
        $claim = Claim::all();

        if (Auth()->user()->role == 1) {
            # code...
            $claim_app = Claim_application::paginate(5);
        }
        else{
            $claim_app = Claim_application::where('user_id', '=', Auth()->user()->id)->paginate(5);
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
    	
        $branch       = Branch::all();
        $ltype        = Leavetype::all();
        $ltime        = Leavetime::all();
        $position     = Position::all();
        $staff        = Staff::where('user_id', '=', Auth()->user()->id)->get();
        $employment   = Employment::where('user_id', '=', Auth()->user()->id)->get();
        $compensation = Compensation::where('user_id', '=', Auth()->user()->id)->get();

        $uInfo = Employment::where('user_id', '=', Auth()->user()->id )->first();
        $uRepo = $uInfo->report;

        $rep_name = User::where('id', '=', $uRepo)->pluck('name');

        return view('admin.profile')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('staff', $staff)->with('position', $position)->with('employment', $employment)->with('compensation', $compensation)->with('sv_name', $rep_name);
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
        $error = '';
        return view('first_registeration')->with('error', $error);
    }

    public function setpassword(Request $request){

        //keep data from front end
        $email    = $request->input('email');
        $password = bcrypt($request->input('password'));
        $cpasword = bcrypt($request->input('confirm'));

        //check pasword and confirm password
        if ($request->input('password') != $request->input('confirm')) {
            $error = "Password Mismatch";
            return redirect('/first_login')->with('error', $error);
        }

        //update user password in table user
        $user = User::where('email', '=', $email)->update(array ('password' => $password ));

        //get user information
        $user_id  = User::where('email', '=', $email)->first();

        //get position id
        $position    = $user_id->position;
        $position_id = Position::where('position_name','=',$position)->first();

        //check if user HR or Staff
        if ($position_id == 1) {
            $member_role_id = 1;
            $user_id->attachRole($member_role_id);
            $user = User::where('email','=',$email)->update(array ('role' => $member_role_id));
        }
        else{
            $member_role_id = 2;
            $user_id->attachRole($member_role_id);
            $user = User::where('email','=',$email)->update(array ('role' => $member_role_id));
        }

        //get user id
        $get_id  = $user_id->id;

        //update email information in table staff
        $staff        = Staff::where('email', '=', $email)->update(array ('user_id' => $get_id));

        //update email information in table compensation
        $compensation = Compensation::where('email', '=', $email)->update(array ('user_id' => $get_id));

        //update email information in table employment
        $employment   = Employment::where('email', '=', $email)->update(array ('user_id' => $get_id));

        //update email information in table birthday
        $birthday     = Birthday::where('email', '=', $email)->update(array ('user_id' => $get_id));

        //redirect user to landing page
        return redirect('/admin/leave');
    }

    public function newStaff()
    {

        $today   = Carbon::now()->format('Y-m-d');
        $user    = User::where('email', '=', Auth()->user()->email )->first();

        if ($user->remember_token) {
            $user_id = Birthday::where('user_id', '=', Auth()->user()->id )->first();
            $user_b  = $user_id->start;

            $c_year  = 2017;
            $year    = Carbon::createFromFormat('Y-m-d', $today)->year;
            $month   = Carbon::createFromFormat('Y-m-d', $user_b)->month;
            $day     = Carbon::createFromFormat('Y-m-d', $user_b)->day;

            if ($year != $c_year) {
                $birthday_latest = Carbon::parse($user_b)->format(''.$year.'-'.$month.'-'.$day);
                $birthday_update = Birthday::where('user_id', '=', Auth()->user()->id)
                                    ->update(array ('start' => $birthday_latest));
            }

            return redirect('/admin/leave');
        }
        else{
            $staff = New Staff;

            $position    = Position::where('position_name', '=', $user->position)->first();
            $position_id = $position->id;

            $staff->user_id = $user->id;
            $staff->full_name = $user->name;
            $staff->email = $user->email;
            $staff->password = $user->password;
            $staff->dob = $today;
            $staff->branch_id = 1;
            $staff->position_id = $position_id;

            $staff->save();

            $employment = New Employment;

            $position    = Position::where('position_name', '=', $user->position)->first();
            $position_id = $position->id;

            $employment->email   = $user->email;
            $employment->user_id = $user->id;
            $employment->position_id = $position_id;
            $employment->branch_id = 1;
            $employment->start = $today;
            $employment->report = 1;

            $employment->save();

            $compensation = New Compensation;

            $compensation->email = $user->email;
            $compensation->user_id = $user->id;

            $compensation->save();

            $birthday = New Birthday;

            $birthday->email = $user->email;
            $birthday->user_id = $user->id;
            $birthday->title   = $user->name;

            $birthday->save();

            return redirect('admin/leave');
        }
    }
}
