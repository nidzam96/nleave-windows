<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap-theme.min.css') }}
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('asset/css/fa/css/font-awesome.min.css') }}
    {{ Html::style('asset/css/login-style.css') }}
    {{ Html::style('asset/css/sweetalert.css') }}


</head>

<bod>
	<div class="container">
		<h1>Set Password</h1>

		<form action="{{ route('user.setpassword') }}" method="post">
			{{ csrf_field() }}

			<fieldset>
				<label>Email</label><br>
				<input class="form-control" type="email" name="email" placeholder="Your Email">
			</fieldset>

			<fieldset>
				<label>Password</label><br>
				<input id="pwd" class="form-control" type="password" name="password" placeholder="Your Password">
			</fieldset>

			<fieldset>
				<label>Confirm Password</label><br>
				<input id="cpwd" class="form-control" type="password" name="confirm" placeholder="Reenter Password">
			</fieldset>
			
			<div class="btn-group" style="padding-top: 20px">
				<button name="submit" type="submit" class="btn btn-primary">
					Submit
				</button>

				<a href="/" type="button" class="btn btn-warning">Cancel</a>
			</div>
		</form>
	</div>
</body>
	
    {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}  
    {{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }} 
    {{ Html::script('asset/js/sweetalert.min.js') }} 

	@include('sweet::alert')

</html>