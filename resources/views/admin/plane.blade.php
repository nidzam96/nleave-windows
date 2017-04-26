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
    <title>Nazrol HR : @yield('pagetitle')</title>

    <!-- Bootstrap -->
    {{ Html::style('asset/css/bootstrap.min.css') }}
    {{ Html::style('asset/css/font-awesome.min.css') }}
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{ Html::style('asset/css/metisMenu.css') }}
    {{ Html::style('asset/css/main.css') }}

@yield('extrastyles')    

</head>

<body>
	@yield('body')
  <!-- START JSCRIPT -->
	<!-- jQuery -->
  {{ Html::script('asset/js/jquery-2.1.1.min.js') }}
  {{ Html::script('asset/js/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}

  <!-- Bootstrap Core JavaScript -->
  {{ Html::script('asset/js/bootstrap.min.js') }}
  {{ Html::script('asset/js/metisMenu.js') }}

  <!-- Custom JavaScript -->
  {{ Html::script('asset/js/jsfunc.js') }}  
  <!-- Custom JavaScript -->


<!-- END JSCRIPT -->
	@yield('extrascripts')
</body>
</html>