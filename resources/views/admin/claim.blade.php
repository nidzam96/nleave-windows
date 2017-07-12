@extends('admin.layout')

@section('pagetitle','Claim')

@section('section')
    <div class="section-2">    

        <!-- <div class="tab-content">
            <div class="col-md-12">
                <div class="row">
                	
                	<div class="col-md-3">
                		<img src="{{ asset('/images/images.jpeg') }}" alt="testing" class="img-responsive" >
                	</div>
                </div>
            </div>
        </div> -->

        <div class="tabs" role="tabpanel">
            <ul class="nav-tabs" role="tablist">
                <li class="active" role="presentation">
                    <a href="#claim" role="tab" data-toggle="tab" aria-controls="claim" id="tabClaim">
                        Claim
                    </a>
                </li>
                <li role="presentation" style="margin-left: -2px;">
                    <a href="#myClaim" role="tab" data-toggle="tab" aria-controls="myClaim" id="tabmyClaim">
                        My Claim
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">

        	<div class="tab-pane active" id="claim" role="tabpanel">
        		<section class="section-secondary section-team">
	        		<div class="row">
	        			<div class="col-md-12">
	        				<div class="top20">
	        					<h2 class="title">Claim</h2>
	        				</div>
	        			</div>
	        		</div>
					
					<div class="section-body" style="margin-top: 20px">
    					<div class="panel panel-primary">	
                            <div class="panel-heading">
                                <span class="fa fa-plus fa-fw"></span>
                                New Claim
                            </div>

                            <div class="panel-body">
                                                      
                                <div class="xol-md-12">
                                    <div class="col-md-6">
                                        <canvas id="barClaim" width="400" height="400"></canvas>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1 top20">
                                        <form method="POST" action="{{ route('claim.create') }}">
                                            {{ csrf_field() }}

                                            <div class="row">
                                                <label>Claim for month :</label>
                                                <input type="month" id="c_month" name="c_month" style="border-radius: 5px">
                                            </div>

                                            <div class="row top20">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label>Claim Type</label>
                                                        <select id="c_type" name="c_type" class="form-control">
                                                            <option value="">Please select type</option>
                                                            @foreach ($claim as $claims)
                                                                <option value="{{ $claims->id }}">{{ $claims->claim_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="row top20">
                                                        <label>Date</label>
                                                        <input type="date" id="c_date" name="c_date" class="form-control">
                                                    </div>
                                                    
                                                    <div id="normal-claim">
                                                        <div class="row top20">
                                                            <label>Particular</label>
                                                            <input type="text" name="c_particular" class="form-control" placeholder="*Your particular here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Business Reg. No</label>
                                                            <input type="text" name="c_brn" class="form-control" placeholder="*Business Registeration Number Here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>GST No</label>
                                                            <input type="text" name="c_gstno" class="form-control" placeholder="*GST Number Here">
                                                        </div>

                                                        <div id="normal-amount" class="row top20">
                                                            <label>Amount</label>
                                                            <input type="text" name="c_namount" class="form-control" placeholder="*Claim amount Here">
                                                        </div>

                                                        <div id="entertainment-amount">
                                                            <div class="row top20">
                                                                <label>Existing Client</label>
                                                                <input type="text" name="exsclient_amount" class="form-control" placeholder="*Amount spent on existing client">
                                                            </div>

                                                            <div class="row top20">
                                                                <label>Potential Client</label>
                                                                <input type="text" name="potclient_amount" class="form-control" placeholder="*Amount spent on potential client">
                                                            </div>

                                                            <div class="row top20">
                                                                <label>Supplier</label>
                                                                <input type="text" name="suplier_amount" class="form-control" placeholder="*Amount spent on supplier">
                                                            </div>

                                                            <div class="row top20">
                                                                <label>Amount</label>
                                                                <input type="text" name="c_eamount" class="form-control" placeholder="*Claim amount here">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="travel-claim">
                                                        <div class="row top20">
                                                            <label>Client</label>
                                                            <input type="text" name="client_name" class="form-control" placeholder="*Client name here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Destination</label>
                                                            <input type="text" name="destination" class="form-control" placeholder="*Destination here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Toll</label>
                                                            <input type="text" name="toll" class="form-control" placeholder="*Total amount for toll here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Parking Total</label>
                                                            <input type="text" name="parking" class="form-control" placeholder="*Total amount for parking here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Accomodation Total</label>
                                                            <input type="text" name="accomodation" class="form-control" placeholder="*Total amount for accomodation here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Allowance</label>
                                                            <input type="text" name="allowance" class="form-control" placeholder="*Allowance here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Mileage | KM</label>
                                                            <input type="text" name="mileage" class="form-control" placeholder="*Total travel here">
                                                        </div>

                                                        <div class="row top20">
                                                            <label>Amount</label>
                                                            <input type="text" name="amount" class="form-control" placeholder="*Claim amount here">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row top20">
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>                      
                            </div>
                        </div>
					</div>
				</section>
        	</div>

        	<div class="tab-pane" id="myClaim" role="tabpanel">
        		<div class="row">
        			<div class="col-md-12">
        				
        				<div class="top20">
        					<h2 class="title">My Claims</h2>
        				</div>
        			</div>
        		</div>
        	</div>

        </div>

    </div>
@endsection
