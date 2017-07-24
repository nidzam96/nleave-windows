<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Claim_application;
use Alert;
use Validator;

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

    	//create new claim
    	$claim = New Claim_application;

    	$claim->user_id    = Auth()->user()->id;
    	$claim->month 	   = $request->input('c_month');
    	$claim->claim_id   = $request->input('c_type');
    	$claim->date 	   = $request->input('c_date');
    	$claim->status 	   = "Pending";

    	if (!empty($request->input('c_particular') )) {
    		
    		//create data for normal and entertainment claim
    		$claim->particular = $request->input('c_particular');
    		$claim->brn 	   = $request->input('c_brn');
    		$claim->gstno 	   = $request->input('c_gstno');

    		if (empty($request->input('c_namount') )) {
    			# code...
	    		$claim->exist_amount 	 = $request->input('exsclient_amount');
	    		$claim->potential_amount = $request->input('potclient_amount');
	    		$claim->supplier_amount  = $request->input('suplier_amount');
	    		$claim->total_amount     = $request->input('c_eamount');
    		}
    		else{
    			$claim->total_amount = $request->input('c_namount');
    		}
    	}
    	else{

    		//create data for travelling claim
    		$claim->client_name  = $request->input('client_name');
    		$claim->destination  = $request->input('destination');
    		$claim->toll 		 = $request->input('toll');
    		$claim->parking 	 = $request->input('parking');
    		$claim->accomodation = $request->input('accomodation');
    		$claim->allowance    = $request->input('allowance');
    		$claim->total_travel = $request->input('mileage');
    		$claim->total_amount = $request->input('amount');
    	}

    	$claim->save();

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
