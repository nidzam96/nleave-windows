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
                                        <form method="POST" action="{{ route('setting.leave.update') }}">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="id" value="{{ $leave->id }}">

                                                <div class="row">
                                                        <div class="col-md-3">
                                                                <label>Leave Name</label>
                                                                <input type="text" name="updateName" class="form-control" placeholder="{{ $leave->leave_name }}">
                                                        </div>

                                                        <div class="col-md-3">
                                                                <label>Days Provided</label>
                                                                <input type="number" name="updateDays" class="form-control" placeholder="{{ $leave->leave_day }}">
                                                        </div>

                                                        <div class="col-md-3">
                                                                <label>Description</label>
                                                                <input type="text" name="updateDesc" class="form-control" placeholder="{{ $leave->leave_desc }}">
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