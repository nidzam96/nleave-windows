<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Claim_application;
use App\Claim;
use App\User;
use Alert;
use Validator;
use Mail;

class ClaimController extends Controller
{
    //
    public function createClaim(Request $request)
    {
        //validation for normal claim
        // $validator = Validator::make($request->all(), [
        //     'c_month' => 'required',
        //     'c_type' => 'required',
        //     'c_date' => 'required',
        //     'c_particular' => 'required',
        //     'c_brn' => 'required',
        //     'c_gstno' => 'required',
        //     'c_namount' => 'required',
        // ]);

        // // //validation for entertainment claim
        // $validatorE = Validator::make($request->all(), [
        //     'c_month' => 'required',
        //     'c_type' => 'required',
        //     'c_date' => 'required',
        //     'c_particular' => 'required',
        //     'c_brn' => 'required',
        //     'c_gstno' => 'required',
        //     'exsclient_amount' => 'required',
        //     'potclient_amount' => 'required',
        //     'suplier_amount' => 'required',
        //     'c_eamount' => 'required',
        // ]);

        // // //validation for travel claim
        // $validatorT = Validator::make($request->all() [
        //     'c_month' => 'required',
        //     'c_type' => 'required',
        //     'c_date' => 'required',
        //     'client_name' => 'required',
        //     'destination' => 'required',
        //     'toll' => 'required',
        //     'parking' => 'required',
        //     'accomodation' => 'required',
        //     'allowance' => 'required',
        //     'mileage' => 'required',
        //     'amount' => 'required',
        // ]);

        // if ($validator->fails()) {
            
        //     return redirect('admin/claim')
        //                 ->withErrors($validator, 'normal');
        // }

        // if ($validatorE->fails()) {
            
        //     return redirect('admin/claim')
        //                 ->withErrors($validatorE, 'entertainment');
        // }

        // if ($validatorT->fails()) {
            
        //     return redirect('admin/claim')
        //                 ->withErrors($validatorT, 'travel');
        // }

        $month       = $request->input('c_month');
        $type        = $request->input('c_type');
        $date        = $request->input('c_date');
        $particular  = $request->input('c_particular');
        $brn         = $request->input('c_brn');
        $gstno       = $request->input('c_gstno');
        $exsclient   = $request->input('exsclient_amount');
        $potclient   = $request->input('potclient_amount');
        $suplier     = $request->input('suplier_amount');
        $namount     = $request->input('c_namount');
        $eamount     = $request->input('c_eamount');
        $client_name = $request->input('client_name');
        $destination = $request->input('destination');
        $toll        = $request->input('toll');
        $parking     = $request->input('parking');
        $acomodation = $request->input('accomodation');
        $allowance   = $request->input('allowance');
        $mileage     = $request->input('mileage');
        $tramount    = $request->input('amount'); 

    	//create new claim
    	$claim = New Claim_application;

    	$claim->user_id    = Auth()->user()->id;
    	$claim->month 	   = $month;
    	$claim->claim_id   = $type;
    	$claim->date 	   = $date;
    	$claim->status 	   = "Pending";

    	if (!empty($particular) ){
    		
    		//create data for normal and entertainment claim
    		$claim->particular = $particular;
    		$claim->brn 	   = $brn;
    		$claim->gstno 	   = $gstno;

    		if (empty($namount )) {
    			# code...
	    		$claim->exist_amount 	 = $exsclient;
	    		$claim->potential_amount = $potclient;
	    		$claim->supplier_amount  = $suplier;
	    		$claim->total_amount     = $eamount;
    		}
    		else{
    			$claim->total_amount = $namount;
    		}
    	}
    	else{

    		//create data for travelling claim
    		$claim->client_name  = $client_name;
    		$claim->destination  = $destination;
    		$claim->toll 		 = $toll;
    		$claim->parking 	 = $parking;
    		$claim->accomodation = $acomodation;
    		$claim->allowance    = $allowance;
    		$claim->total_travel = $mileage;
    		$claim->total_amount = $tramount;
    	}

    	$claim->save();

        $type_n = Claim::where('id', '=', $type)->first();
        $type_name = $type_n->claim_name;

        //send reminder email to admin
        Mail::send('emails.reminder-claim', ['month' => $month, 'type' => $type_name, 'date' => $date, 'particular' => $particular, 'brn' => $brn, 'gstno' => $gstno, 'namount' => $namount, 'exsclient' => $exsclient, 'potclient' => $potclient, 'suplier' => $suplier, 'eamount' => $eamount, 'client_name' => $client_name, 'destination' => $destination, 'toll' => $toll, 'parking' => $parking, 'accomodation' => $acomodation, 'allowance' => $allowance, 'mileage' => $mileage, 'tramount' => $tramount], function ($message) use ($type)
        {
            $adminEmail = User::where('position', '=', 'HR')->first();
            // $userEmail = User::where('position', '=', 'others' && 'id', '=', $user_id)->get();

            $message->from(Auth()->user()->email, Auth()->user()->name);

            $message->to($adminEmail->email, $adminEmail->name);

        });

    	alert()->success('Claim successfully created.', 'Good Work!')->autoclose(2000);

    	return redirect()->route('admin.claim');
    }

    public function claimChart()
    {
    	return view('chart.claim_data');
    }

    public function approveClaim($id)
    {
        $approve = Claim_application::where('id', $id)->update(array ('status' => 'Approve'));

        alert()->success('Claim approve.', 'Thank You');

        return redirect()->route('admin.claim');
    }

    public function rejectClaim($id)
    {
        $reject = Claim_application::where('id', $id)->update(array ('status' => 'Reject'));

        alert()->success('Claim rejected', 'Thank You');

        return redirect()->route('admin.claim');
    }
}
