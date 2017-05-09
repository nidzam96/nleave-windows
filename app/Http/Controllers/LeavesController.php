<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use App\User;
use Mail;
use Alert;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // dd($request);

        $this->validate($request, [

                'branch' => 'required',
                // 'selectEmployee' => 'required',
                'leaveType' => 'required',
                'ltime' => 'required',
                'sdate' => 'required',
                'edate' => 'required',
                'reason' => 'required',
            ]);

        $leave = new Leave;
        // dd($leave);
        $leave->user_id = Auth()->user()->id;
        $leave->branch_id = $request->input('branch');
        $leave->ltype_id = $request->input('leaveType');
        $leave->ltime_id = $request->input('ltime');
        $leave->start = $request->input('sdate');
        $leave->end = $request->input('edate');
        $leave->title = $request->input('reason');
        $leave->status = "Pending";

        $leave->save();

        $user_id = Auth()->user()->id;
        $branch_id = $request->input('branch');
        $ltype_id = $request->input('leaveType');
        $ltime_id = $request->input('ltime');
        $sdate = $request->input('sdate');
        $edate = $request->input('edate');
        $reason= $request->input('reason');

        $receiver = User::where('id', $user_id)->get();
        $r_email = $receiver->email->get();
        $r_name = $receiver->name;

        Mail::send('emails.reminder', ['branch' => $branch_id, 'ltype' => $ltype_id, 'ltime' => $ltime_id, 'sdate' => $sdate, 'edate' => $edate, 'reason' => $reason], function ($message)
        {

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($r_email, $r_name);

        });

        alert()->success('You applications have been sent. Please wait for your approval.', 'Thank You!');

        return redirect() ->route('admin.leaves');
    }

    public function approve($id){

        $leave = Leave::where('id', $id)->update(array ('status' => 'Approve'));

        Mail::send('emails.approve', [] , function ($message)
        {

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to('Tester@nazrol.tech', 'Tester');

        });

        return redirect()-> route('admin.leaves');

    }

    public function reject($id){

        $leave = Leave::where('id', $id)->update(array ('status' => 'Reject'));

        Mail::send('emails.reject', [], function ($message)
        {

            $message->from('HR@nazrol.tech', 'Admin');

            $message->to('Tester@nazrol.tech');

        });

        return redirect()-> route('admin.leaves');
    }
}
