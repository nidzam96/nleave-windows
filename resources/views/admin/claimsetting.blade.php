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
					<form method="POST" action="{{ route('setting.claim.update') }}">
						{{ csrf_field() }}

						<input type="hidden" name="id" value="{{ $claim->id }}">
						<div class="row">
							<div class="col-md-3">
								<label>Claim Name</label>
								<input type="text" name="updateName" class="form-control" placeholder="{{ $claim->claim_name }}" value="{{ $claim->claim_name }}">
							</div>

							<div class="col-md-3">
								<label>Description</label>
								<input type="text" name="updateDesc" class="form-control" placeholder="{{ $claim->claim_desc }}" value="{{ $claim->claim_desc }}">
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