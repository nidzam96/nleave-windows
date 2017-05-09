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
    <!-- {{ Html::style('asset/css/sweetalert.css') }} -->
    {{ Html::style('asset/bower_components/fullcalendar/dist/fullcalendar.css') }}

    {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}  
    {{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }}  
    {{ Html::script('asset/bower_components/jquery-ui/jquery-ui.min.js') }}  
    
    <!-- {{ Html::script('asset/js/sweetalert.min.js') }}   -->
    <!-- @include('sweet::alert') -->

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

  <script>

    $(document).ready(function() {

      function ActiveTab(tab) {
          $('.nav-tabs a[href="#' + tab + '"]').tab('show');
      }

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

      var calendar = $('#calendar').fullCalendar({
        
        editable: true,
        
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listWeek'
        },
     
        events: "{{ url('/admin/events') }}",
     
        // Convert the allDay from string to boolean
        eventRender: function(event, element, view) {
        
          if (event.allDay === 'true') {
            event.allDay = true;
          }
          else {
            event.allDay = false;
          }

        },
     
        selectable: false,
        selectHelper: false,
     
        select: function(start, end, allDay) {
        
          // var title = prompt('Event Title:');
          // var url = prompt('Type Event url, if exits:');
     
          if (title) {
            var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
            
            $.ajax({
              url: 'http://localhost/calendar/add_events.php',
              data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
              type: "POST",
             
              success: function(json) {
                alert('Added Successfully');
              }
            });

            calendar.fullCalendar('renderEvent',
            {
              title: title,
              start: start,
              end: end,
              allDay: allDay
            },
              true // make the event "stick",
            );
          }
            calendar.fullCalendar('unselect');
        },
     
        editable: false,
     
    });
    
   });

  </script> 

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


<!-- END JSCRIPT -->
	@yield('extrascripts')
</body>
</html>