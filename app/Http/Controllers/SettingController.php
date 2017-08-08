<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

use App\Http\Requests;

use App\Leavetype;
use App\Branch;
use App\Position;
use App\Role;

class SettingController extends Controller
{
	public function __construct(){
	    $this->middleware('auth');

	    $this->middleware('check_user_role:admin');
	}

    public function index()
    {
        $leave    = Leavetype::all();
        $branch   = Branch::all();
        $position = Position::all();
        $role     = Role::all();

        return view('admin.settings')->with('leave', $leave)->with('branch', $branch)->with('position', $position)->with('role', $role);
    }

    public function leave(Request $request)
    {
    	//get data from front page
    	$leavename = $request->input('leavename');
    	$days      = $request->input('days_provided');

    	//create new leavetype
    	$leave = New Leavetype;

    	$leave->leave_name = $leavename;
    	$leave->leave_day  = $days;

    	$leave->save();

    	$name = $leavename.'_taken';

    	Schema::table('staff', function($table) use ($name)
    	{
    	    $table->float($name);
    	});

    	alert()->success('New leave type successfully created.', 'Good Work!')->autoclose(3000);

    	return redirect()->route('admin.setting');
    }

    public function branch()
    {

    }

    public function position()
    {

    }

    public function role()
    {

    }
}
