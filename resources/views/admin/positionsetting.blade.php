@extends('admin.layout')

@section('pagetitle', 'Setting')

@section('section')
	<div class="section-2">
		<div class="tab-content">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="fa fa-pencil"></span>
					Edit
				</div>

				<div class="panel-body">
					<form method="POST" action="{{ route('setting.position.update') }}">
						{{ csrf_field() }}

						<input type="hidden" name="id" value="{{ $position->id }}">
						<div class="row">
							<div class="col-md-3">
								<label>Position Name</label>
								<input type="text" name="updateName" class="form-control" placeholder="{{ $position->position_name }}" value="{{ $position->position_name }}">
							</div>

							<div class="col-md-3">
								<label>Description</label>
								<input type="text" name="updateDesc" class="form-control" placeholder="{{ $position->position_desc }}" value="{{ $position->position_desc }}">
							</div>
						</div>

						<div class="row top20">
							<div class="col-md-3">
								<div class="btn-group">
									<button type="submit" class="btn btn-primary">Update</button>
									<a href="{{ route('admin.setting') }}" class="btn btn-default">Cancel</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection