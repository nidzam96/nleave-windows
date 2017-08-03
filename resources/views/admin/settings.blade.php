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
								<a href="#" type="button" class="btn btn-success">Add leave type</a>

								<div class="col-md-12 table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Name</th>
												<th>Day Provided</th>
											</tr>
										</thead>
										
										@foreach($leave as $leave)
										<tbody>
											<tr>
												<td>{{ $leave->leave_name }}</td>
												<td>{{ $leave->desc }}</td>
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
								
							</div>
						</div>
					</div>
        		</section>
        	</div>
        </div>
    </div>
@endsection