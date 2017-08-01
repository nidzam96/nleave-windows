@extends('admin.layout')

@section('pagetitle','Leave Setting')

@section('section')
    <div class="section-2">    

        <div class="tab-content">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="fa fa-pencil fa-fw"></span>
					Leave Setting
				</div>

				<div class="panel-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<form method="POST" action="#">
									{{ csrf_field() }}

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>

    </div>
@endsection