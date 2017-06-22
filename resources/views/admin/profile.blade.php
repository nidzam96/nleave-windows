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
							<a href="#" type="button" id="personal_edits">Edit</a>
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

						<!-- the popup to edit staff information -->
						<div id="staffModal" class="modal">

						  <div class="modal-content" style="width: 100%; height: 300px">
						    <span class="close">&times;</span>
							
							<div class="col-md-12">

								<p>Personal Information</p>
								<form method="post" action="{{ route('user.profile.edit', $sta->user_id) }}">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-4">
											<input type="text" name="emailEdit" class="form-control" placeholder="{{ $sta->email }}" value="{{ $sta->email }}">
										</div>
										<div class="col-md-4">
											<input type="text" name="fnameEdit" class="form-control" placeholder="{{ $sta->full_name }}" value="{{ $sta->full_name }}">
										</div>
										<div class="col-md-4">
											<input type="text" name="preferedEdit" class="form-control" placeholder="{{ $sta->preffered_name }}" value="{{ $sta->preffered_name }}">
										</div>
									</div>
									<div class="row top30">
									<div class="col-md-4">
										<input type="text" class="form-control" name="addressEdit" placeholder="{{ $sta->address }}" value="{{ $sta->address }}">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="numberEdit" placeholder="{{ $sta->number }}" value="{{ $sta->number }}">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="genderEdit" placeholder="{{ $sta->gender }}" value="{{ $sta->gender }}">
									</div>
									</div>
									<div class="row top30">
										<div class="col-md-4">
											<input type="text" class="form-control" name="dobEdit" placeholder="{{ $sta->dob }}" value="{{ $sta->dob }}">
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="nationalityEdit" placeholder="{{ $sta->nationality }}" value="{{ $sta->nationality }}">
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="statusEdit" placeholder="{{ $sta->status }}" value="{{ $sta->status }}">
										</div>
									</div>
									<div class="row top30">
										<div class="col-md-4 col-md-offset-5">
											<button type="submit" name="submitEdit" class="btn btn-success">Commit Changes</button>
										</div>
									</div>
								</form>

							</div>

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
						@if (Auth::user()->position == 'HR')	
							<a href="#" type="button" id="employment_edits">Edit</a>
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

		        		<!-- the popup to edit employment information -->
		        		<!-- <div id="employmentModal" class="modal">

		        		  <div class="modal-content">
		        		    <span class="close">&times;</span>

							<div class="col-md-12">

								<p>Personal Information</p>
								<form method="post" action="#">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-4">
											<input type="text" name="emailEdit" class="form-control" placeholder="{{ $sta->email }}" value="{{ $sta->email }}">
										</div>
										<div class="col-md-4">
											<input type="text" name="fnameEdit" class="form-control" placeholder="{{ $sta->full_name }}" value="{{ $sta->full_name }}">
										</div>
										<div class="col-md-4">
											<input type="text" name="preferedEdit" class="form-control" placeholder="{{ $sta->preffered_name }}" value="{{ $sta->preffered_name }}">
										</div>
									</div>
									<div class="row top30">
									<div class="col-md-4">
										<input type="text" class="form-control" name="addressEdit" placeholder="{{ $sta->address }}" value="{{ $sta->address }}">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="numberEdit" placeholder="{{ $sta->number }}" value="{{ $sta->number }}">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="genderEdit" placeholder="{{ $sta->gender }}" value="{{ $sta->gender }}">
									</div>
									</div>
									<div class="row top30">
										<div class="col-md-4">
											<input type="text" class="form-control" name="dobEdit" placeholder="{{ $sta->dob }}" value="{{ $sta->dob }}">
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="nationalityEdit" placeholder="{{ $sta->nationality }}" value="{{ $sta->nationality }}">
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="statusEdit" placeholder="{{ $sta->status }}" value="{{ $sta->status }}">
										</div>
									</div>
									<div class="row top30">
										<div class="col-md-4 col-md-offset-5">
											<button type="submit" name="submitEdit" class="btn btn-success">Commit Changes</button>
										</div>
									</div>
								</form>

							</div>
		        		  </div>

		        		</div> -->
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
        				@if (Auth::user()->position == 'HR')	
        					<a href="#" type="button" id="compensation_edits">Edit</a>
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

	        		<!-- the popup to edit compensation information -->
	        		<!-- <div id="compensationModal" class="modal">

	        		  <div class="modal-content">
	        		    <span class="close">&times;</span>


	        		  </div>

	        		</div> -->
        		</div>
        	</div>
        </div>

    </div>
@endsection
