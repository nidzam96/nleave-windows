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
					<!-- <form method="POST" action="{{ url('/updatepwd') }}">
						{{ csrf_field() }}

						<div class="row">
							<div class="col-md-3">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="{{ $user->email }}" value="{{ $user->email }}" disabled="disabled">
							</div>

							<div class="col-md-3">
								<label>Current Password</label>
								<input type="password" name="currpwd" class="form-control" placeholder="Current Password">
							</div>

							<div class="col-md-3">
								<label>Change Password</label>
								<input type="password" name="chgpwd" class="form-control" placeholder="Change Password">
							</div>

							<div class="col-md-3">
								<label>Confirm Password</label>
								<input type="password" name="cfrmpwd" class="form-control" placeholder="Confirm Password">
							</div>
						</div>

						<div class="row top20">
							<div class="col-md-3">
								<div class="btn-group">
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</div>
						</div>
					</form> -->
				    <form method="POST" action="{{ url('/updatepwd') }}">
				    	{{ csrf_field() }}

				    	<div class="col-md-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				    	    <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

				    	    <!-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"> -->
				    		<input id="email" type="email" name="email" value="{{ $user->email }}" class="form-control" disabled="disabled" />

			    	        @if ($errors->has('email'))
			    	            <span class="help-block">
			    	                <strong>{{ $errors->first('email') }}</strong>
			    	            </span>
			    	        @endif

				    	</div>

				    	<div class="col-md-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				    	    <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

			    	        <!-- <input id="password" type="password" class="form-control" name="password"> -->
				        	<input id="password" type="password" name="password" placeholder="Password" class="form-control" required="required" />


			    	        @if ($errors->has('password'))
			    	            <span class="help-block">
			    	                <strong>{{ $errors->first('password') }}</strong>
			    	            </span>
			    	        @endif
				    	</div>

				    	<div class="col-md-3 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
				    	    <!-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> -->

			    	        <!-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation"> -->
				        	<input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required="required" />


			    	        @if ($errors->has('password_confirmation'))
			    	            <span class="help-block">
			    	                <strong>{{ $errors->first('password_confirmation') }}</strong>
			    	            </span>
			    	        @endif
				    	</div>

				    	<!-- <input type="email" name="email" placeholder="E-mail Address" required="required" />
				        <input type="password" name="password" placeholder="Password" required="required" />
				        <input type="password" name="confirm" placeholder="Retype Password" required="required" /> -->
				        <button type="submit" class="btn btn-primary">Update</button>
				    </form>
				</div>
			</div>
		</div>
	</div>
@endsection