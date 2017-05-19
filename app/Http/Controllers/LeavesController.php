<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use App\User;
use Mail;
use Alert;
use Carbon\Carbon;

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

    public function applyLeave(Request $request){

        // $this->validate($request, [

        //         'branch' => 'required|alpha ',
        //         // 'selectEmployee' => 'required',
        //         'leaveType' => 'required|numeric',
        //         // 'ltime' => 'required',
        //         'sdate' => 'required',
        //         'edate' => 'required',
        //         'reason' => 'required',
        //     ]);

        //store new application into database
        // dd($request->input('diffDate'))
        $leave = new Leave;
        $leave->user_id = Auth()->user()->id;
        $leave->branch_id = $request->input('branch');
        $leave->ltype_id = $request->input('leaveType');
        $leave->ltime_id = $request->input('ltime');

        if (!empty($request->input('ltime'))) {
            # code...
            if ($request->input('ltime') == '1') {
                # code...
                $leave->start = Carbon::parse($request->input('sdate'))->format('Y-m-d 09:00:00');
                $leave->end = Carbon::parse($request->input('edate'))->format('Y-m-d 17:59:59');
            }
            elseif ($request->input('ltime') == '2') {
                # code...
                $leave->start = Carbon::parse($request->input('sdate'))->format('Y-m-d 09:00:00');
                $leave->end = Carbon::parse($request->input('edate'))->format('Y-m-d 13:00:00');
            }
            else{
                $leave->start = Carbon::parse($request->input('sdate'))->format('Y-m-d 13:00:00');
                $leave->end = Carbon::parse($request->input('edate'))->format('Y-m-d 17:59:59');
            }
        }
        else{

            $leave->start = Carbon::parse($request->input('sdate'))->format('Y-m-d 09:00:00');
            $leave->end = Carbon::parse($request->input('edate'))->format('Y-m-d 17:59:59');
        }

        $leave->title = $request->input('reason');
        $leave->status = "Pending";

        $leave->save();

        //get the user information for email 
        $user_id = Auth()->user()->id;
        $branch_id = $request->input('branch');
        $ltype_id = $request->input('leaveType');

        if (!empty($request->input('ltime'))) {
            # code...

            $ltime_id = $request->input('ltime');
        }
        
        $sdate = $request->input('sdate');
        $edate = $request->input('edate');
        $reason= $request->input('reason');

        //send reminder email to admin
        Mail::send('emails.reminder', ['branch' => $branch_id, 'ltype' => $ltype_id, 'ltime' => $ltime_id, 'sdate' => $sdate, 'edate' => $edate, 'reason' => $reason], function ($message)
        {
            $adminEmail = User::where('position', '=', 'HR')->first();
            // $userEmail = User::where('position', '=', 'others' && 'id', '=', $user_id)->get();

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($adminEmail->email, $adminEmail->name);

        });

        alert()->success('You applications have been sent. Please wait for your approval.', 'Thank You!');

        return redirect() ->route('admin.leaves');
    }

    public function approve($id){

        //find the approve application
        $leave = Leave::where('id', $id)->update(array ('status' => 'Approve'));

        //send approve mail to user
        Mail::send('emails.approve', [] , function ($message)
        {
            $userEmail = User::where('position', '=', 'Others')->first();

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($userEmail->email, $userEmail->name);

        });

        return redirect()-> route('admin.leaves');

    }

    public function reject($id){

        //find the rejected application
        $leave = Leave::where('id', $id)->update(array ('status' => 'Reject'));

        //send rejected email to user
        Mail::send('emails.reject', [], function ($message)
        {
            $userEmail = User::where('position', '=', 'Others')->first();

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($userEmail->email, $userEmail->name);

        });

        return redirect()-> route('admin.leaves');
    }
}
