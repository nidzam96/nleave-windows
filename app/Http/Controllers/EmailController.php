<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class EmailController extends Controller
{
    //
    public function send(Request $request){
    	//
    	// $title = $request->input('title');
     	// $content = $request->input('content');

        $branch_id = $request->input('branch');
        $ltype_id = $request->input('leaveType');
        $ltime_id = $request->input('ltime');
        $sdate = $request->input('sdate');
        $edate = $request->input('edate');
        $reason= $request->input('reason');

        Mail::send('emails.reminder', ['branch' => $branch_id, 'ltype' => $ltype_id, 'ltime' => $ltime_id, 'sdate' => $sdate, 'edate' => $edate, 'reason' => $reason], function ($message)
        {

            $message->from('me@gmail.com', 'Tester');

            $message->to('HR@nazrol.tech');

        });

        return redirect()-> route('admin.leaves');
    }
}
