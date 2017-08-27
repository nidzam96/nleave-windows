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
	    <form method="POST" action="{{ url('/login') }}">
	    	{{ csrf_field() }}
			
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
	    	
	    	<!-- <input type="email" name="email" placeholder="E-mail Address" required="required" />
	        <input type="password" name="password" placeholder="Password" required="required" /> -->
	        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
	        <a href="{{ url('/register_form') }}" class="btn btn-primary btn-block btn-large">Register here.</a>
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