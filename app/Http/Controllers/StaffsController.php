<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Branch;
use App\Position;
use App\Staff;
use App\User;
use App\Leavetype;
use App\Leavetime;
use App\Employment;
use App\Compensation;
use Mail;

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
        
        $staff->full_name       = $request->input('fullname');
        $staff->preffered_name  = $request->input('prefername');
        $staff->gender          = $request->input('gender');
        $staff->email           = $request->input('email');
        $staff->number          = $request->input('number');
        $staff->dob             = $request->input('dob');
        $staff->branch_id       = $request->input('location');
        $staff->position_id     = $request->input('position');

        $staff->save();

        $employment = New Employment;

        $employment->department    = $request->input('department');
        $employment->start         = $request->input('sdate');
        $employment->report        = $request->input('report');
        $employment->branch_id     = $request->input('location');
        $employment->position_id   = $request->input('position');
        $employment->employee_number = $request->input('empNum');

        $employment->save();
     
        $staffName  = $request->input('fullname');
        $staffEmail = $request->input('email');

        // send invite links
        Mail::send('emails.invitation', ['staffName' => $staffName], function ($message) use($staffName, $staffEmail)
        {
            
            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($staffEmail, $staffName);

        });

        $user = New User;
        $user->name  = $request->input('prefername');
        $user->email = $request->input('email');

        $position      = $request->input('position');
        $getPosition    = Position::where('id', '=', $position)->first();
        $positionName   = $getPosition->position_name;
        $user->position = $positionName;

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

    public function userprofile($id)
    {

        $branch       = Branch::all();
        $ltype        = Leavetype::all();
        $ltime        = Leavetime::all();
        $position     = Position::all();
        $staff        = Staff::where('user_id', '=', $id)->get();
        $employment   = Employment::where('user_id', '=', $id)->get();
        $compensation = Compensation::where('user_id', '=', $id)->get();

        return view('admin.profile')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('staff', $staff)->with('position', $position)->with('employment', $employment)->with('compensation', $compensation);
    }

    public function editStaffInfo(Request $request, $id)
    {

        $email          = $request->input('emailEdit');
        $fname          = $request->input('fnameEdit');
        $prefername     = $request->input('preferedEdit');
        $address        = $request->input('addressEdit');
        $number         = $request->input('numberEdit');
        $gender         = $request->input('genderEdit');
        $dob            = $request->input('dobEdit');
        $nationality    = $request->input('nationalityEdit');
        $status         = $request->input('statusEdit');

        $staffEdit = Staff::where('user_id', $id)->update(array ('email' => $email,'full_name' => $fname,'preffered_name' => $prefername,'address' => $address,'number' => $number,'gender' => $gender,'dob' => $dob,'nationality' => $nationality,'status' => $status));

        if (Auth()->user()->position == 'HR') {
            # code...
            return redirect('admin/users');
        }
        else
            return redirect('/admin/profile');
    }

    public function editEmployment(Request $request, $id)
    {

        $report     = $request->input('reportEdit');
        $branch     = $request->input('branchEdit');
        $department = $request->input('departmentEdit');
        $position   = $request->input('positionEdit');
        $start      = $request->input('startEdit');
        $empNum     = $request->input('empnumEdit');

        $employmentEdit = Employment::where('user_id', '=', $id)->update(array ('report','branch','department','position','start','employee_number') );
    }
}
