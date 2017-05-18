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
          right: 'month,agendaWeek,agendaDay'
        },

        events: "{{ url('/admin/events') }}",
     
        // Convert the allDay from string to boolean
        // eventRender: function(event, element, view) {

        // },
     
      });

      var today = moment().format('YYYY-MM-DD');
      document.getElementById("sdate").value = today; 
      document.getElementById("edate").value = today; 

      $('#sdate').on('change', function (){

        var current = $(this).val(); 

        $('#sdate').val(current);
        $('#edate').val(current);

        $('#ltime').show();
        $('#submitApply').text('Apply for 1 day');
      })

      $('#edate').on('change', function (){

        var Weekday = new Array("Sun","Mon","Tue","Wed","Thur","Fri","Sat");

        var endDate = $(this).val();
        var startDate = $('#sdate').val();

        if (endDate != startDate) {

          $('#ltime').hide();

          var checkEnd = moment(endDate, 'YYYY-MM-DD');
          var checkStart = moment(startDate, 'YYYY-MM-DD');

          // console.log(checkEnd)
          // var monthEnd = checkEnd.format('M');
          // var dayEnd = checkEnd.format('D');
          // var yearEnd = checkEnd.format('YYYY');

          // var monthStart = checkStart.format('M');
          // var dayStart = checkStart.format('D');
          // var yearStart = checkStart.format('YYYY');

          // var day = checkEnd.diff(checkStart, 'days') + 1;

          var startdate1 = checkStart;
          var enddate1 = checkEnd;

          console.log(startdate1,enddate1)

          // var newstartdate=new moment();
          // newstartdate.set({'year' : startdate1.format('YYYY'), 'month' : startdate1.format('M'), 'date' : startdate1.format('D')});

          // var newenddate=new moment();
          // newenddate.set({'year' : enddate1.format('YYYY'), 'month' : enddate1.format('M'), 'date' : enddate1.format('D')});

          // console.log(newstartdate, newenddate)

          var days = calcBusinessDays(startdate1,enddate1);
          console.log(days)

          // console.log(day);
          // var a=day;
          // var week = [];

          // for (var i=0; i<day; i++){

          //   var days = day - a;
          //   week.push(days);
          //   a--;
          // }

          // console.log(dateDiff)

          $('#submitApply').text('Apply for ' +days+ ' days');
        }
      })

      function calcBusinessDays(dDate1, dDate2) { // input given as Date objects
        
        var iWeeks, iDateDiff, iAdjust = 0;

        if (dDate2 < dDate1) return -1; // error code if dates transposed
        
        var iWeekday1 = dDate1.day(); // day of week
        var iWeekday2 = dDate2.day();

        console.log(iWeekday1, iWeekday2);

        // iWeekday1 = (iWeekday1 == 0) ? 7 : iWeekday1; // change Sunday from 0 to 7
        // iWeekday2 = (iWeekday2 == 0) ? 7 : iWeekday2;

        if ((iWeekday1 > 5) && (iWeekday2 > 5)) iAdjust = 1; // adjustment if both days on weekend
        iWeekday1 = (iWeekday1 > 5) ? 5 : iWeekday1; // only count weekdays
        iWeekday2 = (iWeekday2 < 1) ? 5 : iWeekday2;

        // calculate differnece in weeks (1000mS * 60sec * 60min * 24hrs * 7 days = 604800000)
        // iWeeks = Math.floor((dDate2.getTime() - dDate1.getTime()) / 604800000)

        if (iWeekday1 <= iWeekday2) {
          iDateDiff = (iWeeks * 5) + (iWeekday2 - iWeekday1)
        } else {
          iDateDiff = ((iWeeks + 1) * 5) - (iWeekday1 - iWeekday2)
        }

        return iDateDiff;
        // iDateDiff -= iAdjust // take into account both days on weekend

        // return (iDateDiff + 1); // add 1 because dates are inclusive
      }

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