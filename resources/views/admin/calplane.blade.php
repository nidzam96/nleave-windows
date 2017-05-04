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
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap-theme.css') }}
    {{ Html::style('asset/bower_components/jquery-ui/themes/base/jquery-ui.min.css') }}
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap.css') }}
    {{ Html::style('asset/css/fa/css/font-awesome.css') }}
    {{ Html::style('asset/css/dashboard.css') }}
    {{ Html::style('asset/css/form.css') }}
    {{ Html::style('asset/bower_components/fullcalendar/dist/fullcalendar.css') }}

    {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}  
    {{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }}  
    {{ Html::script('asset/bower_components/jquery-ui/jquery-ui.min.js') }}  

    {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}
    {{ Html::script('asset/bower_components/moment/min/moment.min.js') }}
    {{ Html::script('asset/bower_components/fullcalendar/dist/fullcalendar.js') }}

    <!-- <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">  -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- {{ Html::style('asset/css/metisMenu.css') }} -->
    <!-- {{ Html::style('asset/css/main.css') }} -->

@yield('extrastyles')    

</head>

<body>

  @yield('body')


  <!-- START JSCRIPT -->
	<!-- jQuery -->

  <!-- Bootstrap Core JavaScript -->
  <!-- {{ Html::script('asset/js/bootstrap.min.js') }} -->
  <!-- {{ Html::script('asset/js/metisMenu.js') }} -->

  <!-- Custom JavaScript -->
  <!-- {{ Html::script('asset/js/jsfunc.js') }}   -->
  <!-- Custom JavaScript -->

  <!-- {{ Html::script('asset/js/cal.js') }}   -->

  <script>
    $(document).ready(function() {

      // page is now ready, initialize the calendar...

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

      var calendar = $('#calendar').fullCalendar({
        
        editable: true,
        header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
        },
       
        events: "{{ url('/admin/events') }}",
        // events: "http://kakitangan.dev/resources/views/admin/events.php",
      
        // calendar.fullCalendar('renderEvent',
        // {
        //   title: title,
        //   start: start,
        //   end: end,
        //   allDay: allDay
        // },
        //   true // make the event "stick"
        // );

      });

  });
  </script>

@include('flash::message')

<!-- END JSCRIPT -->
	@yield('extrascripts')
</body>
</html>