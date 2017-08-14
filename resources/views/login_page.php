<!DOCTYPE html>

<html lang="en" class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login Page</title>

	<!-- Bootstrap -->
	{{ Html::style('asset/css/bootstrap/dist/css/bootstrap-theme.min.css') }}
	{{ Html::style('asset/bower_components/jquery-ui/themes/base/jquery-ui.min.css') }}
	{{ Html::style('asset/css/bootstrap/dist/css/bootstrap.min.css') }}
	{{ Html::style('asset/css/fa/css/font-awesome.min.css') }}
	{{ Html::style('asset/login.css') }}
</head>
<body>
	<div class="container" style="border: solid 1px red;">
		
	</div>
</body>

	{{ Html::script('asset/bower_components/moment/min/moment.min.js') }}
	{{ Html::script('asset/css/jquery/dist/jquery.min.js') }}   
	{{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }}  
	{{ Html::script('asset/bower_components/jquery-ui/jquery-ui.min.js') }}  

	@include('sweet::alert')

</html>