@extends('admin.layout')

@section('pagetitle','Leave Setting')

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
                <li role="presentation" style="margin-left: -2px;">
                    <a href="#role" role="tab" data-toggle="tab" aria-controls="role" id="tabRole">
                        Role Setting
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

								<!-- the popup to edit leave information -->
								<div id="leaveModal" class="modal" style="overflow-y: auto">

							    	<div class="modal-content" style="width: 100%; height: 800px;">
							   			<span class="close">&times;</span>

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
													<a href="#" class="btn btn-warning">
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
								
								<!-- the popup to edit branch information -->
								<div id="branchModal" class="modal" style="overflow-y: auto">

							    	<div class="modal-content" style="width: 100%; height: 800px;">
							   			<span class="close">&times;</span>

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
													<a href="#" class="btn btn-warning">
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
								
								<!-- the popup to edit position information -->
								<div id="positionModal" class="modal" style="overflow-y: auto">

							    	<div class="modal-content" style="width: 100%; height: 800px;">
							   			<span class="close">&times;</span>

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
													<a href="#" class="btn btn-warning">
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

        	<div role="tabpanel" class="tab-pane" id="role">
        		<section class="section-secondary section-role">
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<span class="fa fa-pencil"></span>
								Edit role
							</div>

							<div class="panel-body">
								<a href="#" type="button" id="roleAdd" class="btn btn-success">Add role</a>
								
								<!-- the popup to edit leave information -->
								<div id="roleModal" class="modal" style="overflow-y: auto">

							    	<div class="modal-content" style="width: 100%; height: 800px;">
							   			<span class="close">&times;</span>

							  		</div>
								</div>

								<div class="col-md-12 table-responsive top20">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Display Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>
										
										@foreach($role as $role)
										<tbody>
											<tr>
												<td>{{ $role->id }}</td>
												<td>{{ $role->name }}</td>
												<td>{{ $role->display_name }}</td>
												<td>{{ $role->description }}</td>
												<td>
													<a href="#" class="btn btn-warning">
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

		// The popup for creating new role 
		var rolemodal = document.getElementById('roleModal');
		var rolebtn = document.getElementById("roleAdd");
		var rolespan = document.getElementsByClassName("close")[0];

		$(rolebtn).on('click', function() {
		  
		    rolemodal.style.display = "block";
		})

		$(rolespan).on('click', function() {
		    
		  	rolemodal.style.display = "none";
		})

		$(window).on('click', function() {
		    
		  if (event.target == rolemodal) {
		        rolemodal.style.display = "none";
		    }
		})
	</script>
@endsection