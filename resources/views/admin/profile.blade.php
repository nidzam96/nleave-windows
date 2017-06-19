@extends('admin.layout')

@section('pagetitle','Profile')

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

        <div class="tab-content">
        	
        	<div class="row">
        		<div class="col-md-12">
					
					<div class="row">
						<div class="col-md-3">
							<p>Personal Details</p>
						</div>

						<div class="col-md-3 col-md-offset-2">
						@if (Auth::user()->position != 7)
							<a href="" id="personal_edits">Edit</a>
						@endif
						</div>
					</div>
					
					@foreach ($staff as $sta)
						<div class="row top20">
							<div class="col-md-3">
								<label>Email : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->email }}
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<label>Full Name : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->full_name }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Preferred Name : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->preffered_name }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Phone Number : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->number }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Permanet Address : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->address }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Gender : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->gender }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Date of Birth : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->dob }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Nationality : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->nationality }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Marital Status : </label>
							</div>
							<div class="col-md-3">
								{{ $sta->status }}
							</div>
						</div>
					
					@endforeach
        		</div>
        	</div>

        	<div class="row top30">
        		<div class="col-md-12">
        			
        			<div class="row">        				
						<div class="col-md-3">
							<p>Employment Info</p>
						</div>
						<div class="col-md-3 col-md-offset-2">
						@if (Auth::user()->position != 7)	
							<a href="" id="employment_edits">Edit</a>
						@endif
						</div>
        			</div>
					
					@foreach ($employment as $info)
	        			<div class="row top20">
	        				<div class="col-md-3">
	        					<label for="">Reports To : </label>
	        				</div>
	        				<div class="col-md-3">
	        					
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Branch : </label>
	        				</div>
	        				<div class="col-md-3">
	        					{{ $info->branch->branch_name }}
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Department : </label>
	        				</div>
	        				<div class="col-md-3">
	        					{{ $info->department->department_name }}
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Position : </label>
	        				</div>
	        				<div class="col-md-3">
	        					{{ $info->position->position_name }}
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Start Date : </label>
	        				</div>
	        				<div class="col-md-3">
	        					{{ $info->start }}
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Employee Number : </label>
	        				</div>
	        				<div class="col-md-3">
	        					{{ $info->employee_number }}
	        				</div>
	        			</div>
	        		@endforeach
        		</div>
        	</div>

        	<div class="row top30">
        		<div class="col-md-12">

        			<div class="row">
        				<div class="col-md-3">
        					<p>Compensation</p>
        				</div>
        				<div class="col-md-3 col-md-offset-2">
        				@if (Auth::user()->position != 7)	
        					<a href="" id="compensation_edits">Edit</a>
        				@endif
        				</div>
        			</div>

					@foreach ($compensation as $comp)
	        			<div class="row top20">
	        				<div class="col-md-3"><label for="">Employment type : </label></div>
	        				<div class="col-md-3">{{ $comp->type }}</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3"><label for="">Salary : </label></div>
	        				<div class="col-md-3">{{ $comp->salary }}</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3"><label for="">Pay method : </label></div>
	        				<div class="col-md-3">{{ $comp->pay_method }}</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3"><label for="">Bank name : </label></div>
	        				<div class="col-md-3">{{ $comp->bank }}</div>
	        			</div>
	        		@endforeach
        		</div>
        	</div>
        </div>

    </div>
@endsection
