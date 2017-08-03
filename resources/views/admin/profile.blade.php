@extends('admin.layout')

@section('pagetitle','Profile')

@section('section')
    <div class="section-2">    

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
					
					<div class="row top20">
						<div class="col-md-3">
							<label>Email : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->email }}
						@endforeach
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<label>Full Name : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->full_name }}
						@endforeach
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Preferred Name : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->preffered_name }}
						@endforeach
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Phone Number : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->number }}
						@endforeach
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Permanent Address : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->address }}
						@endforeach
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Gender : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->gender }}
						@endforeach
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Date of Birth : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->dob }}
						@endforeach
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Nationality : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->nationality }}
						@endforeach
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Marital Status : </label>
						</div>
						<div class="col-md-3">
						@foreach ($staff as $sta)
							{{ $sta->status }}
						@endforeach
						</div>
					</div>					

					<!-- the popup to edit staff information -->
					<div id="staffModal" class="modal" style="overflow-y: auto">

					  <div class="modal-content" style="width: 100%; height: 800px;">
					    <span class="close">&times;</span>
						
						@if ($errors->staff->all() )
						    <div class="alert alert-danger" role="alert">
						        <p>Validation error.</p>
						        <ul>
						            @foreach ($errors->staff->all() as $message)
						                <li>{{ $message }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif

						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<span class="fa fa-pencil fa-fw"></span>
									Edit
								</div>

								<div class="panel-body">
									<p>Personal Information</p>
									@foreach ($staff as $sta)
										<form method="post" action="{{ route('user.profile.edit.personal', $sta->user_id) }}">
											{{ csrf_field() }}
											<div class="row">
												<div class="col-md-4">
													<label>Email</label>
													<input type="text" name="emailEdit" class="form-control" placeholder="{{ $sta->email }}" value="{{ $sta->email }}" disabled="disabled">
												</div>
												<div class="col-md-4">
													<label>Full Name</label>
													<input type="text" name="fnameEdit" class="form-control" placeholder="{{ $sta->full_name }}" value="{{ $sta->full_name }}">
												</div>
												<div class="col-md-4">
													<label>Prefer Name</label>
													<input type="text" name="preferedEdit" class="form-control" placeholder="{{ $sta->preffered_name }}" value="{{ $sta->preffered_name }}">
												</div>
											</div>
											<div class="row top30">
											<div class="col-md-4">
												<label>Address</label>
												<input type="text" class="form-control" name="addressEdit" placeholder="{{ $sta->address }}" value="{{ $sta->address }}">
											</div>
											<div class="col-md-4">
												<label>Phone Number</label>
												<input type="text" class="form-control" name="numberEdit" placeholder="{{ $sta->number }}" value="{{ $sta->number }}">
											</div>
											<div class="col-md-4">
												<label>Gender</label>												<select name="genderEdit" class="form-control">
													<option value="{{ $sta->gender }}">{{ $sta->gender }}</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
											</div>
											<div class="row top30">
												<div class="col-md-4">
													<label>Date of Birth</label>
													<input type="text" class="form-control" name="dobEdit" placeholder="{{ $sta->dob }}" value="{{ $sta->dob }}">
												</div>
												<div class="col-md-4">
													<label>Nationality</label>
													<input type="text" class="form-control" name="nationalityEdit" placeholder="{{ $sta->nationality }}" value="{{ $sta->nationality }}">
												</div>
												<div class="col-md-4">
													<label>Status</label>
													<input type="text" class="form-control" name="statusEdit" placeholder="{{ $sta->status }}" value="{{ $sta->status }}">
												</div>
											</div>
											<div class="row top30">
												<div class="col-md-4 col-md-offset-5">
													<button type="submit" name="submitEdit" class="btn btn-success">Commit Changes</button>
												</div>
											</div>
										</form>
									@endforeach	
								</div>
							</div>
						</div>

					  </div>

					</div>
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
					
	        			<div class="row top20">
	        				<div class="col-md-3">
	        					<label for="">Reports To : </label>
	        				</div>
	        				<div class="col-md-3">
	        					@foreach ($sv_name as $sv)
									{{ $sv }}
	        					@endforeach
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Branch : </label>
	        				</div>
	        				<div class="col-md-3">
	        					@foreach ($employment as $info)
	        						{{ $info->branch->branch_name }}
	        					@endforeach
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Department : </label>
	        				</div>
	        				<div class="col-md-3">
	        					@foreach ($employment as $info)
	        						{{ $info->department }}
	        					@endforeach
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Position : </label>
	        				</div>
	        				<div class="col-md-3">
	        					@foreach ($employment as $info)
	        						{{ $info->position->position_name }}
	        					@endforeach
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Start Date : </label>
	        				</div>
	        				<div class="col-md-3">
	        					@foreach ($employment as $info)
	        						{{ $info->start }}
	        					@endforeach
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3">
	        					<label for="">Employee Number : </label>
	        				</div>
	        				<div class="col-md-3">
	        					@foreach ($employment as $info)
	        						{{ $info->employee_number }}
	        					@endforeach
	        				</div>
	        			</div>

		        		<!-- the popup to edit employment information -->
		        		<div id="employmentModal" class="modal" style="overflow-y: auto">

		        		  <div class="modal-content" style="width: 100%; height: 600px">
		        		    <span class="close">&times;</span>

		        		    @if ($errors->employ->all() )
		        		        <div class="alert alert-danger" role="alert">
		        		            <p>Validation error.</p>
		        		            <ul>
		        		                @foreach ($errors->employ->all() as $message)
		        		                    <li>{{ $message }}</li>
		        		                @endforeach
		        		            </ul>
		        		        </div>
		        		    @endif

							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<span class="fa fa-pencil fa-fw"></span>
										Edit
									</div>

									<div class="panel-body">
										<p>Personal Information</p>
										<form method="post" action="{{ route('user.profile.edit.employment') }}">
											{{ csrf_field() }}
											
												<input type="hidden" name="id" value="{{ $info->user_id }}">

											<div class="row">
												<div class="col-md-4">
													<label>Report To</label>
														<select name="reportEdit" class="form-control">
															@foreach ($sv_name as $sv)
																<option value="{{ $sv }}">{{ $sv }}</option>
															@endforeach
															
															@role('admin')
																@foreach ($all_staff as $all)
																	<option value="{{ $all->user_id }}">{{ $all->full_name }}</option>
																@endforeach
															@endrole
														</select>
												</div>
												<div class="col-md-4">
													<label>Branch</label>
														<input type="text" name="branchEdit" class="form-control" placeholder="{{ $info->branch->branch_name }}" value="{{ $info->branch->branch_name }}">
												</div>
												<div class="col-md-4">
													<label>Department</label>
														<input type="text" name="departmentEdit" class="form-control" placeholder="{{ $info->department }}" value="{{ $info->department }}">
												</div>
											</div>
											<div class="row top30">
												<div class="col-md-4">
													<label>Position</label>
														<input type="text" class="form-control" name="positionEdit" placeholder="{{ $info->position->position_name }}" value="{{ $info->position->position_name }}">
												</div>
												<div class="col-md-4">
													<label>Start Date</label>
														<input type="text" class="form-control" name="startEdit" placeholder="{{ $info->start }}"  value="{{ $info->start }}">
												</div>
												<div class="col-md-4">
													<label>Employee Number</label>
														<input type="text" class="form-control" name="empnumEdit" placeholder="{{ $info->employee_number }}" value="{{ $info->employee_number }}">
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
		        		  </div>
		        		</div>
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

	        			<div class="row top20">
	        				<div class="col-md-3"><label for="">Employment type : </label></div>
	        				<div class="col-md-3">
	        				@foreach ($compensation as $comp)
	        					{{ $comp->type }}
	        				@endforeach
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3"><label for="">Salary : </label></div>
	        				<div class="col-md-3">
	        				@foreach ($compensation as $comp)
	        					{{ $comp->salary }}
	        				@endforeach
							</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3"><label for="">Pay method : </label></div>
	        				<div class="col-md-3">
	        				@foreach ($compensation as $comp)
	        					{{ $comp->pay_method }}
	        				@endforeach
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-md-3"><label for="">Bank name : </label></div>
	        				<div class="col-md-3">
								@foreach ($compensation as $comp)
									{{ $comp->bank }}
								@endforeach
	        				</div>	
	        			</div>

		        		<!-- the popup to edit compensation information -->
		        		<div id="compensationModal" class="modal" style="overflow-y: auto;">

		        		  <div class="modal-content" style="width: 100%; height: 500px">
		        		    <span class="close">&times;</span>
							
							@if ($errors->compen->all() )
							    <div class="alert alert-danger" role="alert">
							        <p>Validation error.</p>
							        <ul>
							            @foreach ($errors->compen->all() as $message)
							                <li>{{ $message }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif

							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<span class="fa fa-pencil fa-fw"></span>
										Edit
									</div>

									<div class="panel-body">
										<p>Personal Information</p>
										
										@foreach ($compensation as $comp)
											<form method="post" action="{{ route('user.profile.edit.compensation') }}">
												{{ csrf_field() }}

													<input type="hidden" name="id" value="{{ $comp->user_id }}">

												<div class="row">
													<div class="col-md-4">
														<label>Employment type</label>
															<input type="text" name="emptypeEdit" class="form-control" placeholder="{{ $comp->type }}" value="{{ $comp->type }}">
													</div>
													<div class="col-md-4">
														<label>Salary</label>
															<input type="text" name="salaryEdit" class="form-control" placeholder="{{ $comp->salary }}" value="{{ $comp->salary }}">
													</div>
													<div class="col-md-4">
														<label>Pay Method</label>
															<input type="text" name="paymethodEdit" class="form-control" placeholder="{{ $comp->pay_method }}" value="{{ $comp->pay_method }}">
													</div>
												</div>
												<div class="row top30">
													<div class="col-md-4">
														<label>Bank</label>
															<input type="text" class="form-control" name="bankEdit" placeholder="{{ $comp->bank }}" value="{{ $comp->bank }}">
													</div>
												</div>

												<div class="row top30">
													<div class="col-md-4 col-md-offset-5">
														<button type="submit" name="submitEdit" class="btn btn-success">Commit Changes</button>
													</div>
												</div>
											</form>	
										@endforeach
									</div>
								</div>
							</div>

		        		  </div>

		        		</div>
        		</div>
        	</div>
        </div>

    </div>
@endsection

@section('extrascripts')
	<!-- <script type="text/javascript">
		var id = $('#ur_id').val();

		var ajax_url = '/user/getName/' + id;

		$.get(ajax_url, function( data ){
			console.log(data)
		})
	</script> -->
@endsection