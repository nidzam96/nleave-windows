<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use App\User;
use Mail;
use Alert;
use Carbon\Carbon;
use App\leaveType;
use App\Staff;
use App\Department;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get the application into fullcalendar
        return view('admin.events');

    }

    public function birthday()
    {
        //get the application into fullcalendar
        return view('admin.bevent');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function applyLeave(Request $request)
    {
        //vaidate the leave application
        $this->validate($request, [
                'branch' => 'required',
                'leaveType' => 'required',
                'ltime' => 'required',
                'sdate' => 'required',
                'edate' => 'required',
                'reason' => 'required',
            ]);

        //store new application into database
        $leave = new Leave;
        $leave->user_id = Auth()->user()->id;
        $leave->title = Auth()->user()->name;
        $leave->branch_id = $request->input('branch');
        $leave->ltype_id = $request->input('leaveType');

        if (!empty($request->input('ltime'))) {
            # code...
            if ($request->input('ltime') == '1') {
                # code...
                $leave->ltime_id = $request->input('ltime');

                if ($request->input('edate') != $request->input('sdate')) {
                    # code...
                    $leave->start = Carbon::parse($request->input('sdate'))->format('Y-m-d 09:00:00');
                    $leave->end = Carbon::parse($request->input('edate'))->format('Y-m-d 17:59:59');
                    $leave->days = $request->input('dateDiff');
                }
                else{
                    $leave->start = Carbon::parse($request->input('sdate'))->format('Y-m-d 09:00:00');
                    $leave->end = Carbon::parse($request->input('edate'))->format('Y-m-d 17:59:59');
                    $leave->days = 1;
                }
            }
            elseif ($request->input('ltime') == '2') {
                # code...
                $leave->ltime_id = $request->input('ltime');     
                $leave->start = Carbon::parse($request->input('sdate'))->format('Y-m-d 09:00:00');
                $leave->end = Carbon::parse($request->input('edate'))->format('Y-m-d 13:00:00');
                $leave->days = 0.5;
            }
            else{
                $leave->ltime_id = $request->input('ltime');    
                $leave->start = Carbon::parse($request->input('sdate'))->format('Y-m-d 13:00:00');
                $leave->end = Carbon::parse($request->input('edate'))->format('Y-m-d 17:59:59');
                $leave->days = 0.5;
            }

        }

        $leave->reason = $request->input('reason');
        $leave->status = "Pending";

        $leave->save();

        //get the user information for email 
        $user_id = Auth()->user()->id;
        $branch_id = $request->input('branch');
        $ltype_id = $request->input('leaveType');
        
        $sdate = $request->input('sdate');
        $edate = $request->input('edate');
        $reason= $request->input('reason');

        //send reminder email to admin
        Mail::send('emails.reminder', ['branch' => $branch_id, 'ltype' => $ltype_id, 'sdate' => $sdate, 'edate' => $edate, 'reason' => $reason], function ($message)
        {
            $adminEmail = User::where('position', '=', 'HR')->first();
            // $userEmail = User::where('position', '=', 'others' && 'id', '=', $user_id)->get();

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($adminEmail->email, $adminEmail->name);

        });

        return redirect() ->route('admin.leaves');
    }

    public function approve($id, $user_id, $days_requested, $ltype_id){

        //find the approve application
        // dd($id, $user_id, $days_requested, $ltype_id);
        $leave    = Leave::where('id', $id)->update(array ('status' => 'Approve'));

        $getstaff = Staff::where('user_id', '=', $user_id)->first();
        $ltaken   = $getstaff->leave_taken;
        $staff    = Staff::where('user_id', $user_id)->update(array ('leave_taken' => $ltaken+$days_requested));

        if ($ltype_id == 1) {
            # code...
            $annual_taken = $getstaff->annual_taken;
            $staff    = Staff::where('user_id', $user_id)->update(array ('annual_taken' => $annual_taken+$days_requested));
        }
        elseif ($ltype_id == 2) {
            # code...
            $marriage_taken = $getstaff->marriage_taken;
            $staff    = Staff::where('user_id', $user_id)->update(array ('marriage_taken' => $marriage_taken+$days_requested));

        }
        elseif ($ltype_id == 3) {
            # code...
            $maternity_taken = $getstaff->maternity_taken;
            $staff    = Staff::where('user_id', $user_id)->update(array ('maternity_taken' => $maternity_+$days_requested));

        }
        elseif ($ltype_id == 4) {
            # code...
            $paternity_taken = $getstaff->paternity_taken;
            $staff    = Staff::where('user_id', $user_id)->update(array ('paternity_taken' => $paternity_taken+$days_requested));

        }
        elseif ($ltype_id == 5) {
            # code...
            $sick_taken = $getstaff->sick_taken;
            $staff    = Staff::where('user_id', $user_id)->update(array ('sick_taken' => $sick_taken+$days_requested));

        }
        else{
            $sick_taken = $getstaff->sick_taken;
            $staff    = Staff::where('user_id', $user_id)->update(array ('sick_taken' => $sick_taken+$days_requested));
        }
        
        $userId = $user_id;

        //send approve mail to user
        Mail::send('emails.approve', [$userId] , function ($message) use($userId)
        {

            $userEmail = User::where('id', '=', $userId)->first();

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($userEmail->email, $userEmail->name);

        });

        return redirect()-> route('admin.leaves');

    }

    public function reject(Request $request){

        // dd($request);

        //keep the received data
        $leave_id = $request->input('leave_id');
        $userId   = $request->input('user_id');
        $reason   = $request->input('remark');
        // dd($leave_id, $userId, $reason);

        //find the rejected application
        $leave = Leave::where('id', $leave_id)->update(array ('status' => 'Reject'));

        //send rejected email to user
        Mail::send('emails.reject', [$userId, 'reason' => $reason], function ($message) use($userId)
        {
            $userEmail = User::where('id', '=', $userId)->first();

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($userEmail->email, $userEmail->name);

        });

        return redirect()-> route('admin.leaves');
    }

    public function getLeaveDays($leave_type_id)
    {
        $leave_days = Leavetype::where('id', '=', $leave_type_id)->pluck('leave_day','id');

        return $leave_days;
    }

    public function checkLeaveDayRemain($leave_type_id)
    {
        if ($leave_type_id == 1) {
            # code...
            $getuser = Staff::where('user_id', '=', Auth()->user()->id)->pluck('annual_taken', 'user_id');
            return $getuser;
        }
        elseif ($leave_type_id == '2') {
            # code...
            $getuser = Staff::where('user_id', '=', Auth()->user()->id)->pluck('marriage_taken', 'user_id');
            return $getuser;
        }
        elseif ($leave_type_id == '3') {
            # code...
            $getuser = Staff::where('user_id', '=', Auth()->user()->id)->pluck('maternity_taken', 'user_id');
            return $getuser;
        }
        elseif ($leave_type_id == '4') {
            # code...
            $getuser = Staff::where('user_id', '=', Auth()->user()->id)->pluck('paternity_taken', 'user_id');
            return $getuser;
        }
        elseif ($leave_type_id == '5') {
            # code...
            $getuser = Staff::where('user_id', '=', Auth()->user()->id)->pluck('sick_taken', 'user_id');
            return $getuser;
        }
        else{
            $getuser = Staff::where('user_id', '=', Auth()->user()->id)->pluck('annual_taken', 'user_id');
            return $getuser;
        }
    }

    public function getUserId()
    {
        $id = Auth()->user()->id;

        return $id;
    }

    public function newDepartment(Request $request){

        //create new department and store member id
        $request->merge([ 
                'staffSelected' => implode(',', (array) $request->get('staffSelected'))
            ]);
        // dd($request->input('staffSelected'));

        $department = New Department;
        
        $department->department_name = $request->input('new_department');  
        $department->member          = $request->input('staffSelected'); 

        $department->save();

        return redirect('/admin/users');
    }
}
