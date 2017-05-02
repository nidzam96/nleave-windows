<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;

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
                'selectEmployee' => 'required',
                'leaveType' => 'required',
                'ltime' => 'required',
                'sdate' => 'required',
                'edate' => 'required',
                'reason' => 'required',
            ]);

        $leave = new Leave;
        // dd($leave);
        $leave->user_id = $request->input('selectEmployee');
        $leave->branch_id = $request->input('branch');
        $leave->ltype_id = $request->input('leaveType');
        $leave->ltime_id = $request->input('ltime');
        $leave->sdate = $request->input('sdate');
        $leave->edate = $request->input('edate');
        $leave->reason = $request->input('reason');

        $leave->save();

        flash('Leave request sent')->overlay();

        return redirect() ->route('admin.leaves');
    }
}
