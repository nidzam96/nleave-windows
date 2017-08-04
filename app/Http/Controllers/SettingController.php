<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
