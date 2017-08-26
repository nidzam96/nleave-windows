<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

use App\Http\Requests;

use App\Leavetype;
use App\Branch;
use App\Position;
use App\Claim;

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
        $claim    = Claim::all();

        return view('admin.settings')->with('leave', $leave)->with('branch', $branch)->with('position', $position)->with('claim',$claim);
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

    	//set column name
    	$name = $leavename.'_taken';

    	//create new column in staff table to store new leavetype data
    	Schema::table('staff', function($table) use ($name)
    	{
    	    $table->float($name);
    	});

    	//sweetalert popup for success
    	alert()->success('New leave type successfully created.', 'Good Work!')->autoclose(3000);

    	//redirect to setting page
    	return redirect()->route('admin.setting');
    }

    public function editleave($id)
    {
    	$leave = Leavetype::where('id', $id)->first();

    	return view('admin.leavesetting')->with('leave', $leave);
    }

    public function updateleave(Request $request)
    {
    	//keep the data from front end
    	$id   = $request->input('id');
    	$name = $request->input('udpateName');
    	$days = $request->input('updateDays');
    	$desc = $request->input('updateDesc');

        //update leavetype
        $leave = Leavetype::where('id', $id)->update(array ('leave_name' => $name, 'leave_day' => $days, 'leave_desc' => $desc));

        //sweetalert popup for success
        alert()->success('Leave type successfully updated.', 'Good Work!')->autoclose(3000);

        //redirect user to setting page
        return redirect()->route('admin.setting');
    }

    public function branch(Request $request)
    {
    	//get data from front page
    	$branchname  = $request->input('branchname');
    	$branch_desc = $request->input('branch_desc');

    	//create new branch
    	$branch = New Branch;

    	$branch->branch_name = $branchname;
    	$branch->branch_desc = $branch_desc;

    	$branch->save();

    	//sweetalert popup for success
    	alert()->success('New branch successfully created.', 'Good Work!')->autoclose(3000);

    	//redirect to setting page
    	return redirect()->route('admin.setting');
    }

    public function editbranch($id)
    {
    	$branch = Branch::where('id', $id)->first();

    	return view('admin.branchsetting')->with('branch', $branch);
    }

    public function updatebranch(Request $request)
    {
    	//keep the data from front end
    	$id   = $request->input('id');
    	$name = $request->input('updateName');
    	$desc = $request->input('updateDesc');

        //update branch
        $leave = Branch::where('id', '=', $id)->update(array ('branch_name' => $name, 'branch_desc' => $desc));

        //sweetalert popup for success
        alert()->success('Branch successfully updated.', 'Good Work!')->autoclose(3000);

        //redirect user to setting page
        return redirect()->route('admin.setting');
    }

    public function position(Request $request)
    {
    	//get data from front page
    	$position_name  = $request->input('position_name');
    	$position_desc = $request->input('position_desc');

    	//create new position
    	$position = New Position;

    	$position->position_name = $position_name;
    	$position->position_desc = $position_desc;

    	$position->save();

    	//sweetalert popup for success
    	alert()->success('New position successfully created.', 'Good Work!')->autoclose(3000);

    	//redirect to setting page
    	return redirect()->route('admin.setting');
    }

    public function editposition($id)
    {
    	$position = Position::where('id', $id)->first();

    	return view('admin.positionsetting')->with('position', $position);
    }

    public function updateposition(Request $request)
    {
    	//keep the data from front end
    	$id   = $request->input('id');
    	$name = $request->input('updateName');
    	$desc = $request->input('updateDesc');

        //update position
        $leave = Position::where('id', $id)->update(array ('position_name' => $name, 'position_desc' => $desc));

        //sweetalert popup for success
        alert()->success('Position successfully updated.', 'Good Work!')->autoclose(3000);

        //redirect user to setting page
        return redirect()->route('admin.setting');
    }

    public function claim(Request $request)
    {
        //get data from front page
        $claim_name  = $request->input('claim_name');
        $claim_desc = $request->input('claim_desc');

        //create new claim
        $claim = New Claim;

        $claim->claim_name = $claim_name;
        $claim->claim_desc = $claim_desc;

        $claim->save();

        //sweetalert popup for success
        alert()->success('New claim successfully created.', 'Good Work!')->autoclose(3000);

        //redirect to setting page
        return redirect()->route('admin.setting');
    }

    public function editclaim($id)
    {
        $claim = Claim::where('id', $id)->first();

        return view('admin.claimsetting')->with('claim', $claim);
    }

    public function updateclaim(Request $request)
    {
        //keep the data from front end
        $id   = $request->input('id');
        $name = $request->input('udpateName');
        $desc = $request->input('updateDesc');

        //update leavetype
        $claim = Claim::where('id', $id)->update(array ('claim_name' => $name, 'claim_desc' => $desc));

        //sweetalert popup for success
        alert()->success('Claim successfully updated.', 'Good Work!')->autoclose(3000);

        //redirect user to setting page
        return redirect()->route('admin.setting');
    }
}
