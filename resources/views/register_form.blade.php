<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Nazrol HR : Login</title>

	<!-- Bootstrap -->
	{{ Html::style('asset/css/bootstrap/dist/css/bootstrap-theme.min.css') }}
	{{ Html::style('asset/bower_components/jquery-ui/themes/base/jquery-ui.min.css') }}
	{{ Html::style('asset/css/bootstrap/dist/css/bootstrap.min.css') }}
	{{ Html::style('asset/css/fa/css/font-awesome.min.css') }}
	{{ Html::style('asset/css/styleLogin.css') }}

</head>
<body>
	<div class="login">
		<h1>Login</h1>
	    <form method="POST" action="{{ url('/register') }}">
	    	{{ csrf_field() }}

	    	<input type="hidden" name="register" value="1">

	    	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	    	    <!-- <label for="name" class="col-md-4 control-label">Name</label> -->
    	        <!-- <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"> -->
    			<input id="name" type="text" name="name" placeholder="Your name here.." required="required" />
				
    	        @if ($errors->has('name'))
    	            <span class="help-block">
    	                <strong>{{ $errors->first('name') }}</strong>
    	            </span>
    	        @endif
	    	</div>

	    	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	    	    <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

	    	    <!-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"> -->
	    		<input id="email" type="email" name="email" placeholder="E-mail Address" required="required" />

    	        @if ($errors->has('email'))
    	            <span class="help-block">
    	                <strong>{{ $errors->first('email') }}</strong>
    	            </span>
    	        @endif

	    	</div>

	    	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	    	    <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

    	        <!-- <input id="password" type="password" class="form-control" name="password"> -->
	        	<input id="password" type="password" name="password" placeholder="Password" required="required" />


    	        @if ($errors->has('password'))
    	            <span class="help-block">
    	                <strong>{{ $errors->first('password') }}</strong>
    	            </span>
    	        @endif
	    	</div>

	    	<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	    	    <!-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> -->

    	        <!-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation"> -->
	        	<input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm password" required="required" />


    	        @if ($errors->has('password_confirmation'))
    	            <span class="help-block">
    	                <strong>{{ $errors->first('password_confirmation') }}</strong>
    	            </span>
    	        @endif
	    	</div>

	        <button type="submit" class="btn btn-primary btn-block btn-large">Register</button>
	        <a href="{{ url('/') }}" class="btn btn-primary btn-block btn-large">Back</a>
	    </form>
	</div>

</body>

	<!-- Javascript -->
	{{ Html::script('asset/js/index.js') }}
	{{ Html::script('asset/bower_components/moment/min/moment.min.js') }}
	{{ Html::script('asset/css/jquery/dist/jquery.min.js') }}
	{{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }}  
	{{ Html::script('asset/bower_components/jquery-ui/jquery-ui.min.js') }}

</html>