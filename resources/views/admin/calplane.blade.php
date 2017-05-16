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
    {{ Html::style('asset/css/bootstrap-datepicker.min.css') }}
    {{ Html::style('asset/bower_components/fullcalendar/dist/fullcalendar.css') }}

    {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}  
    {{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }}  
    {{ Html::script('asset/bower_components/jquery-ui/jquery-ui.min.js') }}  
    {{ Html::script('asset/js/bootstrap-datepicker.min.js') }}  

    {{ Html::script('asset/bower_components/moment/min/moment.min.js') }}
    {{ Html::script('asset/bower_components/fullcalendar/dist/fullcalendar.js') }}

@yield('extrastyles')   

  <script>

    $(document).ready(function() {

      $('#calendar').fullCalendar({
        
        theme: true,
        editable: true,
        eventLimit: true,

        displayEventTime : false,

        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listMonth'
        },

        events: "{{ url('/admin/events') }}",
     
        // Convert the allDay from string to boolean
        eventRender: function(event, element, view) {

        },
     
      });

      var today = moment().format('YYYY-MM-DD');
      document.getElementById("sdate").value = today; 
      document.getElementById("edate").value = today; 

      $('#sdate').on('change', function (){

        var current = $(this).val(); 

        $('#sdate').val(current);
        $('#edate').val(current);
      })

      $('#edate').on('change', function (){

        var Weekday = new Array("Sun","Mon","Tue","Wed","Thur","Fri","Sat");

        var endDate = $(this).val();
        var startDate = $('#sdate').val();

        if (endDate != startDate) {

          $('#ltime').hide();
          // $('#ltime').css("visibility", "hidden");

          var checkEnd = moment(endDate, 'YYYY-MM-DD');
          var checkStart = moment(startDate, 'YYYY-MM-DD');

          while(startDate<=endDate){

            var weekDay = checkStart.moment().day();
            console.log(weekDay)
            die()
          }

          // var monthEnd = checkEnd.format('M');
          // var dayEnd = checkEnd.format('D');
          // var yearEnd = checkEnd.format('YYYY');

          // var monthStart = checkStart.format('M');
          // var dayStart = checkStart.format('D');
          // var yearStart = checkStart.format('YYYY');

          var day = checkEnd.diff(checkStart, 'days') + 1;  
          // var day = dayEnd - dayStart + 1;

          $('#submitApply').text('Apply for ' +day+ ' days');
          // console.log(day);
        }
      })

      $('#halfDay').on('change', function (){

        var half = $(this).val();

        if (half != '1') {

          $('#submitApply').text('Apply for 0.5 day');
        }
        else{

          $('#submitApply').text('Apply for 1 day');
        }
      })

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