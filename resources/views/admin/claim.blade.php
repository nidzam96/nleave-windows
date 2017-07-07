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
						<div class="row top30">
							<button class="btn btn-default">New claim</button>
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
