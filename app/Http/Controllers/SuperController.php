<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Branch;
use App\User;
use App\Staff;
use App\Position;
use App\Employment;
use App\Compensation;
use App\Birthday;

use Carbon\Carbon;

class SuperController extends Controller
{
    //
    public function add()
    {
    	// show add hr page
    	$branch = Branch::all();

    	return view('admin.add_hr')->with('branch', $branch);
    }

    public function create(Request $request)
    {    	
    	//create new User data
    	$user = New User;

    	$user->name     = $request->input('fullname');
    	$user->email    = $request->input('email');
    	$user->password = bcrypt($request->input('password'));
    	$user->position = 'HR';
    	$user->role     = 2;

    	$user->save();
    	
    	$user2 = User::where('id', '=', $user->id);
    	$member_role_id = 2;
    	$user->attachRole($member_role_id);

    	//create new staff data
    	$staff = New Staff;

    	//get position id
    	$position    = Position::where('position_name', '=', 'HR')->first();
    	$position_id = $position->id;

    	$staff->user_id = $user->id;
    	$staff->full_name = $request->input('fullname');
    	$staff->preffered_name = $request->input('prefername');
    	$staff->email = $request->input('email');
    	$staff->gender = $request->input('gender');
    	$staff->password = bcrypt($request->input('password'));
    	$staff->dob = $request->input('dob');
    	$staff->branch_id = $request->input('location');
    	$staff->position_id = $position_id;

    	$staff->save();

    	//create new employment data
    	$employment = New Employment;

    	$position    = Position::where('position_name', '=', 'HR')->first();
    	$position_id = $position->id;

    	$employment->email   = $request->input('email');
    	$employment->user_id = $user->id;
    	$employment->position_id = $position_id;
    	$employment->branch_id = $request->input('location');
    	$employment->start = $request->input('sdate');
    	$employment->report = $user->id;

    	$employment->save();

    	//create new compensation
    	$compensation = New Compensation;

    	$compensation->email = $request->input('email');
    	$compensation->user_id = $user->id;

    	$compensation->save();

    	//create new birthday
    	$birthday = New Birthday;

    	$year    = 2017;
    	$month   = Carbon::createFromFormat('Y-m-d', $request->input('dob'))->month;
    	$day     = Carbon::createFromFormat('Y-m-d', $request->input('dob'))->day;

    	$birthday_latest = Carbon::parse($request->input('dob'))->format(''.$year.'-'.$month.'-'.$day);

    	$birthday->email = $request->input('email');
    	$birthday->user_id = $user->id;
    	$birthday->title   = $request->input('prefername');
    	$birthday->start   = $birthday_latest;

    	$birthday->save();

    	//redirect user
    	return redirect('admin/users');
    }
}
