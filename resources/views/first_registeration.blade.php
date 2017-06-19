<!DOCTYPE html>
<html>
<head>
	<title>HR Login</title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap-theme.min.css') }}
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('asset/css/fa/css/font-awesome.min.css') }}
    {{ Html::style('asset/css/login-style.css') }}


</head>

<bod>
	<div class="container">
		<h1>First Login</h1>

		<form action="{{ route('user.setpassword') }}" method="post">
			{{ csrf_field() }}
			<fieldset>
				<label>Email</label><br>
				<input class="form-control" type="email" name="email" placeholder="Your Email">
			</fieldset>
			<fieldset>
				<label>Password</label><br>
				<input class="form-control" type="password" name="password" placeholder="Your Password">
			</fieldset>

			<button name="submit" type="submit" class="btn btn-primary btn-block">
				Submit
			</button>

			<a href="index.php" type="button" class="btn btn-warning btn-block">Back</a>
		</form>
	</div>
</body>

    {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}  
    {{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }} 
</html>