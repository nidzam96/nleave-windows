@extends('admin.layout')

@section('pagetitle','Setting')

@section('section')
    <div class="section-2">
        <div class="tabs" role="tabpanel">
            <ul class="nav-tabs" role="tablist">
                <li class="active" role="presentation">
                    <a href="#leave" role="tab" data-toggle="tab" aria-controls="leave" id="tabLeave">
                        Leave Setting
                    </a>
                </li>
                <li role="presentation" style="margin-left: -2px;">
                    <a href="#branch" role="tab" data-toggle="tab" aria-controls="branch" id="tabBranch">
                        Branch Setting
                    </a>
                </li>
                <li role="presentation" style="margin-left: -2px;">
                    <a href="#position" role="tab" data-toggle="tab" aria-controls="position" id="tabPosition">
                        Position Setting
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
        	<div class="tab-pane active" id="leave" role="tabpanel">
        		<section class="section-secondary section-leave">
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<span class="fa fa-pencil"></span>
								Edit leave
							</div>

							<div class="panel-body">
								<a href="#" type="button" id="leaveAdd" class="btn btn-success">Add leave type</a>

								<!-- the popup to add new leave type -->
								<div id="leaveModal" class="modal" style="overflow-y: auto">

							    	<div class="modal-content" style="width: 50%; height: 500px;">
							   			<span class="close">&times;</span>
										
										<div class="panel panel-primary">
											<div class="panel-heading">
												<span class="fa fa-plus"></span>
												New Leave Type
											</div>
											<div class="panel-body">
												<form method="POST" action="{{ route('setting.leave') }}">
													{{ csrf_field() }}
													
													<label>Leave Name</label>
													<input type="text" name="leavename" placeholder="Please enter leave name" class="form-control" required="required">

													<label>Days Provided</label>
													<input type="number" name="days_provided" class="form-control" required="required" placeholder="Please enter days to provide">

													<div class="btn-group top20">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</form>
											</div>
										</div>
							  		</div>
								</div>

								<div class="col-md-12 table-responsive top20">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Day Provided</th>
												<th>Action</th>
											</tr>
										</thead>
										
										@foreach($leave as $leave)
										<tbody>
											<tr>
												<td>{{ $leave->id }}</td>
												<td>{{ $leave->leave_name }}</td>
												<td>{{ $leave->leave_day }}</td>
												<td>
													<a href="{{ route('setting.leave.edit', $leave->id ) }}" class="btn btn-warning">
														<span class="fa fa-edit"></span>
														Edit
													</a>
													<a href="#" class="btn btn-danger">
														Delete
														<span class="fa fa-trash-o"></span>
													</a>
												</td>
											</tr>
										</tbody>
										@endforeach
									</table>
								</div>
							</div>
						</div>
					</div>
        		</section>
        	</div>

        	<div role="tabpanel" class="tab-pane" id="branch">
        		<section class="section-secondary section-branch">
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<span class="fa fa-pencil"></span>
								Edit branch
							</div>

							<div class="panel-body">
								<a href="#" type="button" id="branchAdd" class="btn btn-success">Add branch</a>
								
								<!-- the popup to add new branch -->
								<div id="branchModal" class="modal" style="overflow-y: auto">

							    	<div class="modal-content" style="width: 50%; height: 500px;">
							   			<span class="close">&times;</span>
										
										<div class="panel panel-primary">
											<div class="panel-heading">
												<span class="fa fa-plus"></span>
												New Branch
											</div>
											<div class="panel-body">
												<form method="POST" action="{{ route('setting.branch') }}">
													{{ csrf_field() }}
													
													<label>Branch Name</label>
													<input type="text" name="branchname" placeholder="Please enter branch name" class="form-control" required="required">

													<label>Description</label>
													<input type="text" name="branch_desc" class="form-control" placeholder="Please enter branch description">

													<div class="btn-group top20">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</form>
											</div>
										</div>
							  		</div>
								</div>

								<div class="col-md-12 table-responsive top20">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>
										
										@foreach($branch as $branch)
										<tbody>
											<tr>
												<td>{{ $branch->id }}</td>
												<td>{{ $branch->branch_name }}</td>
												<td>{{ $branch->branch_desc }}</td>
												<td>
													<a href="{{ route('setting.branch.edit', $branch->id) }}" class="btn btn-warning">
														<span class="fa fa-edit"></span>
														Edit
													</a>
													<a href="#" class="btn btn-danger">
														Delete
														<span class="fa fa-trash-o"></span>
													</a>
												</td>
											</tr>
										</tbody>
										@endforeach
									</table>
								</div>
							</div>
						</div>
					</div>
        		</section>
        	</div>

        	<div role="tabpanel" class="tab-pane" id="position">
        		<section class="section-secondary section-position">
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<span class="fa fa-pencil"></span>
								Edit position
							</div>

							<div class="panel-body">
								<a href="#" type="button" id="positionAdd" class="btn btn-success">Add position</a>
								
								<!-- the popup to add new position -->
								<div id="positionModal" class="modal" style="overflow-y: auto">

							    	<div class="modal-content" style="width: 50%; height: 500px;">
							   			<span class="close">&times;</span>
										
										<div class="panel panel-primary">
											<div class="panel-heading">
												<span class="fa fa-plus"></span>
												New Position
											</div>
											<div class="panel-body">
												<form method="POST" action="{{ route('setting.position') }}">
													{{ csrf_field() }}
													
													<label>Position Name</label>
													<input type="text" name="position_name" placeholder="Please enter position name" class="form-control" required="required">

													<label>Description</label>
													<input type="text" name="position_desc" class="form-control" placeholder="Please enter position description">

													<div class="btn-group top20">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</form>
											</div>
										</div>
							  		</div>
								</div>

								<div class="col-md-12 table-responsive top20">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>
										
										@foreach($position as $position)
										<tbody>
											<tr>
												<td>{{ $position->id }}</td>
												<td>{{ $position->position_name }}</td>
												<td>{{ $position->position_desc }}</td>
												<td>
													<a href="{{ route('setting.position.edit', $position->id) }}" class="btn btn-warning">
														<span class="fa fa-edit"></span>
														Edit
													</a>
													<a href="#" class="btn btn-danger">
														Delete
														<span class="fa fa-trash-o"></span>
													</a>
												</td>
											</tr>
										</tbody>
										@endforeach
									</table>
								</div>
							</div>
						</div>
					</div>
        		</section>
        	</div>
        </div>
    </div>
@endsection

@section('extrascripts')
	<script type="text/javascript">
		// The popup for creating new leave
		var leavemodal = document.getElementById('leaveModal');
		var leavebtn = document.getElementById("leaveAdd");
		var leavespan = document.getElementsByClassName("close")[0];

		$(leavebtn).on('click', function() {
		  
		    leavemodal.style.display = "block";
		})

		$(leavespan).on('click', function() {
		    
		  	leavemodal.style.display = "none";
		})

		$(window).on('click', function() {
		    
		  if (event.target == leavemodal) {
		        leavemodal.style.display = "none";
		    }
		})

		// The popup for creating new branch 
		var branchmodal = document.getElementById('branchModal');
		var branchbtn = document.getElementById("branchAdd");
		var branchspan = document.getElementsByClassName("close")[0];

		$(branchbtn).on('click', function() {
		  
		    branchmodal.style.display = "block";
		})

		$(branchspan).on('click', function() {
		    
		  	branchmodal.style.display = "none";
		})

		$(window).on('click', function() {
		    
		  if (event.target == branchmodal) {
		        branchmodal.style.display = "none";
		    }
		})

		// The popup for creating new position 
		var positionmodal = document.getElementById('positionModal');
		var positionbtn = document.getElementById("positionAdd");
		var positionspan = document.getElementsByClassName("close")[0];

		$(positionbtn).on('click', function() {
		  
		    positionmodal.style.display = "block";
		})

		$(positionspan).on('click', function() {
		    
		  	positionmodal.style.display = "none";
		})

		$(window).on('click', function() {
		    
		  if (event.target == positionmodal) {
		        positionmodal.style.display = "none";
		    }
		})
	</script>
@endsection