<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Branch;
use App\Position;
use App\Staff;
use App\User;

class StaffsController extends Controller
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
    public function store(Request $request)
    {
        //
        $staff = New Staff;
        $staff->full_name = $request->input('fullname');
        $staff->preffered_name = $request->input('prefername');
        $staff->gender = $request->input('gender');
        $staff->email = $request->input('email');
        $staff->position_id = $request->input('position');
        $staff->branch_id = $request->input('branch');
        $staff->address = $request->input('address');
        $staff->number = $request->input('number');
        $staff->dob = $request->input('dob');
        $staff->nationality = $request->input('nationality');
        $staff->status = $request->input('status');
        $staff->password = $request->input('password');

            if (empty($request->input('leave_takens'))) {
                # code...
                $staff->leave_taken = 0;
            }
            else{
                $staff->leave_taken = $request->input('leave_takens');
            }
            
        $staff->save();

        $user = New User;
        $user->name = $request->input('prefername');
        $user->email = $request->input('email');
        $user->position = $request->input('position');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect('admin/users');
    }

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
}
