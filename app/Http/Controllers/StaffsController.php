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
use App\Birthday;
use Mail;
use Alert;
use Validator;
use Carbon\Carbon;

class StaffsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        $this->middleware('check_user_role:admin')->except('editStaffInfo');
    }
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
        //vaidate the new staff information
        $this->validate($request, [
                'fullname' => 'required|alpha|max:255',
                'prefername' => 'required|alpha',
                'gender' => 'required',
                'email' => 'required',
                'number' => 'required|numeric',
                'dob' => 'required',
                'sdate' => 'required',
                'report' => 'required',
                'position' => 'required',
                'location' => 'required',
            ]);

        //create new Staff in database
        $current_year = Carbon::now()->format('Y');

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

        //create new Employment in database
        $employment = New Employment;

        $employment->email         = $request->input('email');
        $employment->department    = $request->input('department');
        $employment->start         = $request->input('sdate');
        $employment->report        = $request->input('report');
        $employment->branch_id     = $request->input('location');
        $employment->position_id   = $request->input('position');
        $employment->employee_number = $request->input('empNum');

        $employment->save();

        //create new Compensation in database
        $compensation = New Compensation;
        $compensation->email = $request->input('email');
        $compensation->save();

        $birthday = New Birthday;

        $birthday->email = $request->input('email');
        $birthday->title = $request->input('prefername');
        $birthday->start = Carbon::parse($request->input('dob'))->format(''.$current_year.'-m-d');

        $birthday->save();

        $staffName  = $request->input('fullname');
        $staffEmail = $request->input('email');

        // send invite links
        Mail::send('emails.invitation', ['staffName' => $staffName], function ($message) use($staffName, $staffEmail)
        {
            
            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($staffEmail, $staffName);

        });

        //create new User in database
        $user = New User;
        $user->name  = $request->input('prefername');
        $user->email = $request->input('email');

        $position      = $request->input('position');
        $getPosition    = Position::where('id', '=', $position)->first();
        $positionName   = $getPosition->position_name;
        $user->position = $positionName;

        $user->save();

        alert()->success('New staff successfully created and email have been sent to corresponding staff.', 'Good Work!')->persistent('OK');

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
        $staffAll     = Staff::all();
        $staff        = Staff::where('user_id', '=', $id)->get();
        $employment   = Employment::where('user_id', '=', $id)->get();
        $compensation = Compensation::where('user_id', '=', $id)->get();

        $uInfo = Employment::where('user_id', '=', $id )->first();
        $uRepo = $uInfo->report;

        $rep_name = User::where('id', '=', $uRepo)->pluck('name', 'id');

        return view('admin.profile')->with('branchview', $branch)->with('ltview', $ltype)->with('ltiview', $ltime)->with('staff', $staff)->with('position', $position)->with('employment', $employment)->with('compensation', $compensation)->with('sv_name', $rep_name)->with('all_staff', $staffAll);
    }

    public function editStaffInfo(Request $request, $id)
    {
        //validate the edit information
        $validator = Validator::make($request->all(), [
            'fnameEdit' => 'required|regex:/^[\pL\s\-]+$/u',
            'preferedEdit' => 'required|regex:/^[\pL\s\-]+$/u',
            'addressEdit' => 'required',
            'numberEdit' => 'required|numeric',
            'genderEdit' => 'required|alpha',
            'dobEdit' => 'required',
            'nationalityEdit' => 'required|alpha',
            'statusEdit' => 'required|alpha',
        ]);

        if ($validator->fails()) {
            return redirect('admin/user/profile/'.$id)
                        ->withErrors($validator, 'staff')
                        ->withInput();
        }

        $fname          = $request->input('fnameEdit');
        $prefername     = $request->input('preferedEdit');
        $address        = $request->input('addressEdit');
        $number         = $request->input('numberEdit');
        $gender         = $request->input('genderEdit');
        $dob            = $request->input('dobEdit');
        $nationality    = $request->input('nationalityEdit');
        $status         = $request->input('statusEdit');

        //update record in table Staff
        $staffEdit = Staff::where('user_id', $id)->update(array ('full_name' => $fname,'preffered_name' => $prefername,'address' => $address,'number' => $number,'gender' => $gender,'dob' => $dob,'nationality' => $nationality,'status' => $status));

        //update record in table Birthday
        $current_year  = Carbon::now()->format('Y');
        $request_month = Carbon::createFromFormat('Y-m-d', $dob)->month;
        $request_day   = Carbon::createFromFormat('Y-m-d', $dob)->day;
        $dob_new       = Carbon::parse($request->input('dob'))->format(''.$current_year.'-'.$request_month.'-'.$request_day);
        $dobEdit       = Birthday::where('user_id', $id)->update(array ('start' => $dob_new));

        alert()->success('Information successfully updated.', 'Good Work!')->autoclose(3000);

        //redirect user to specific page after update process
        if (Auth()->user()->position == 'HR') {
            # code...
            return redirect('admin/users');
        }
        else
            return redirect('/admin/profile');
    }

    public function editEmployment(Request $request)
    {
        //user id
        $id         = $request->input('id');

        //validate the edit information
        $validator = Validator::make($request->all(), [
            'reportEdit' => 'required',
            'branchEdit' => 'required|regex:/^[\pL\s\-]+$/u',
            'departmentEdit' => 'required|regex:/^[\pL\s\-]+$/u',
            'positionEdit' => 'required',
            'startEdit' => 'required',
            'empnumEdit' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/user/profile/'.$id)
                        ->withErrors($validator, 'employ')
                        ->withInput();
        }

        //update record in table Employment
        $report     = $request->input('reportEdit');

        $branch     = $request->input('branchEdit');
        $getbranch  = Branch::where('branch_name', '=', $branch)->first();
        $branch_id  = $getbranch->id;

        $department = $request->input('departmentEdit');

        $position   = $request->input('positionEdit');
        $getposition = Position::where('position_name', '=', $position)->first();
        $position_id = $getposition->id;

        $start      = $request->input('startEdit');
        $empNum     = $request->input('empnumEdit');

        $employmentEdit = Employment::where('user_id', '=', $id)->update(array ('report' => $report,'branch_id' => $branch_id,'department' => $department,'position_id' => $position_id,'start' => $start,'employee_number' => $empNum) );

        alert()->success('Information successfully updated.', 'Good Work!')->autoclose(3000);

        return redirect('admin/users');
    }

    public function editCompensation(Request $request)
    {
        //user id
        $id         = $request->input('id');

        //validate the edit information
        $validator = Validator::make($request->all(), [
            'emptypeEdit' => 'required|regex:/^[\pL\s\-]+$/u',
            'salaryEdit' => 'required|numeric',
            'paymethodEdit' => 'required|regex:/^[\pL\s\-]+$/u',
            'bankEdit' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        if ($validator->fails()) {
            return redirect('admin/user/profile/'.$id)
                        ->withErrors($validator, 'compen')
                        ->withInput();
        }

        //update record in table Compensation
        $emptype    = $request->input('emptypeEdit');
        $salary     = $request->input('salaryEdit');
        $paymethod  = $request->input('paymethodEdit');
        $bank   = $request->input('bankEdit');

        $compensationEdit = Compensation::where('user_id', '=', $id)->update(array ('type' => $emptype,'salary' => $salary,'pay_method' => $paymethod,'bank' => $bank));

        alert()->success('Information successfully updated.', 'Good Work!')->autoclose(3000);

        return redirect('admin/users');
    }

    public function getUserId($id)
    {
        $user    = User::where('id', '=', $id)->pluck('name','id');

        return $user;
    }
}
