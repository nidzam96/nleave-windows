<!DOCTYPE html>
<html lang="en">

<head>
@include('partials._header')
</head>

<body id="top" class="backroundimg">
	<!-- WRAPPER -->
	<div class="wrapper">

@yield('content')

	<!-- END WRAPPER -->
	</div>

@include('partials._javascript')
</body>
</html>