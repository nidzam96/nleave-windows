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
    <!-- {{ Html::style('asset/css/team.css') }} -->
    <!-- {{ Html::style('asset/bower_components/fullcalendar/dist/fullcalendar.css') }} -->
    
    {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}
    {{ Html::script('asset/bower_components/moment/min/moment.min.js') }}
    {{ Html::script('asset/bower_components/fullcalendar/dist/fullcalendar.js') }}
    <!-- {{ Html::style('asset/bower_components/moment/min/moment.min.js') }} -->
    <!-- {{ Html::style('asset/bower_components/fullcalendar/dist/fullcalendar.js') }} -->
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
  <!-- {{ Html::script('asset/css/jquery/dist/jquery.min.js') }} -->
  <!-- {{ Html::script('asset/js/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js') }} -->

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

      $('#calendar').fullCalendar({
          // put your options and callbacks here
              eventSources: [

                // your event source
                {
                  events: [ // put the array in the `events` property
                    {
                      title  : 'event1',
                      start  : '2017-04-25',
                      color  : 'red'
                    },
                    {
                      title  : 'event2',
                      start  : '2017-04-12',
                      end    : '2017-04-15',
                      color  : 'lightblue'
                    },
                    {
                      title  : 'event3',
                      start  : '2017-04-29',
                      color  : 'yellow'
                    }
                  ],
                    color: 'black',     // an option!
                    textColor: 'black' // an option!
                }

                // any other event sources...

              ]
      })

      // function UpdateAvailDays() {
      //   var sel = document.getElementById('leaveType');
      //   var avail_days = sel.options[sel.selectedIndex].getAttribute('data-day');

      //   document.getElementById("avail-days").innerHTML = avail_days;
      // }

  });
  </script>


<!-- END JSCRIPT -->
	@yield('extrascripts')
</body>
</html>