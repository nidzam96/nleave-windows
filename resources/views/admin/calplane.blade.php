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

    <style>
      /* The Modal (background) */
      .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      /* Modal Content */
      .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 50%;
      }

      /* The Close Button */
      .close {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
      }

      .close:hover,
      .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
      }
    </style>

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
        editable: false,
        eventLimit: true,

        displayEventTime : false,

        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay',
        },

        eventSources: [
                  "{{ url('/admin/events') }}",
                  // "{{ url('/admin/holiday') }}"
                ],

        eventClick: function(calEvent, jsEvent, view){

          alert("Reason : "+calEvent.reason);
        }
        
      });
      
      //input type date configuration
      var today = moment().format('YYYY-MM-DD');
      document.getElementById("sdate").value = today; 
      document.getElementById("edate").value = today; 
      document.getElementById("sdate").setAttribute('min', today);
      document.getElementById("edate").setAttribute('min', today);

      $('#sdate').on('change', function (){

        var current = $(this).val(); 

        $('#sdate').val(current);
        $('#edate').val(current);

        $('#ltime').show();
      })

      $('#edate').on('change', function (){

        var endDate = $(this).val();
        var startDate = $('#sdate').val();

        if (endDate != startDate) {

          $('#ltime').hide();

          var checkEnd = moment(endDate, 'YYYY-MM-DD 23:59:59');
          var checkStart = moment(startDate, 'YYYY-MM-DD 09:00:00');

          var days = calcBusinessDays(checkStart,checkEnd);

          $('#submitApply').text('Apply for ' +days+ ' days');

          document.getElementById('dateDiff').value = days;
        }
      })

      //change text if half day
      $('#halfDay').on('change', function (){

        var half = $(this).val();
        console.log(half)

        if (half != '1') {

          $('#submitApply').text('Apply for 0.5 day');
        }
        else{

          $('#submitApply').text('Apply for 1 day');
        }
      })

      function calcBusinessDays(dDate1, dDate2) { // input given as Date objects
        // var ajax_url = '/admin/holiday/date/' + dDate1 + dDate2;

        // $.get(ajax_url, function( data ){
        //     $.each(data, function(start, end){
        //       console.log(start,end)
        //     })
        // })

        var iWeeks, iDateDiff, iAdjust = 0;

        if (dDate2 < dDate1) return -1; // error code if dates transposed
        
        var iWeekday1 = dDate1.day(); // day of week
        var iWeekday2 = dDate2.day();

        var checkWeek1 = dDate1.week();// week of year
        var checkWeek2 = dDate2.week();
        var diffWeek = checkWeek2 - checkWeek1;

        if ((iWeekday1 > 5) && (iWeekday2 > 5)) iAdjust = 1; // adjustment if both days on weekend
        iWeekday1 = (iWeekday1 > 5) ? 5 : iWeekday1; // only count weekdays
        iWeekday2 = (iWeekday2 > 5) ? 5 : iWeekday2;

        // calculate difference in weeks (1000mS * 60sec * 60min * 24hrs * 7 days = 604800000)
        iWeeks = Math.floor((dDate2.hour() - dDate1.hour()) / 604800000)

        if (iWeekday1 < iWeekday2) {

          if (diffWeek > 0) {
           iDateDiff = ((diffWeek) * 5) - (iWeekday1 - iWeekday2)
          }else{
            iDateDiff = (iWeeks * 5) + (iWeekday2 - iWeekday1)
          }
        } else if(iWeekday1 == iWeekday2){
           
            if (diffWeek > 0) {
             iDateDiff = ((diffWeek) * 5) - (iWeekday1 - iWeekday2)
            }else{
             iDateDiff = ((iWeeks + 1) * 5) + (iWeekday1 - iWeekday2)
            }

        } else{
           iDateDiff = ((diffWeek) * 5) - (iWeekday1 - iWeekday2)
        }

       return (iDateDiff + 1); // add 1 because dates are inclusive
      }

      $('#leaveType').on('change', function (){

        var leave_type_id = $(this).val();

        $('#avails-day').empty();
        getUserId(leave_type_id);
      })

      function getUserId(leave_type_id){

        var ajax_url = '/leaves/getUserId';

        $.get(ajax_url, function( data ){

          var user_id = data;
          getLeaveDays(leave_type_id, user_id);
        })
      }

      function getLeaveDays(leave_type_id, user_id){
        
        //send leave_type_id to controller
        var ajax_url = '/leaves/days/' + leave_type_id;

        $.get(ajax_url, function( data ) {
          console.log(data)
          $.each(data, function(leave_type_id, leave_day){

            checkUserLeaveRemain(leave_type_id, leave_day);
          })
        })
      }

      function checkUserLeaveRemain(leave_type_id, leave_day){

        //send leavetype id to get for remaining days left
        var ajax_url = '/leaves/checkRemain/' + leave_type_id;

        $.get(ajax_url, function( data ){

          //keep the pluck data from controller
          var leave_taken = data;

          //get the remaining days available for user
          var remainDays = leave_day - leave_taken;

          //change text on button apply
          $('#avails-day').append(remainDays+' remaining days');

          if (remainDays < 1) {
            //disable the apply button if the user had use all the specify days
            $('#submitApply').attr('disabled','disabled');
          }
          else
          {
            //remove disable attribute when user change leavetype
            $('#submitApply').removeAttr('disabled');
          }
        })
      }

      // Get the modal
      var modal = document.getElementById('myModal');

      // Get the button that opens the modal
      var btn = document.getElementById("btn-reject");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      $(btn).on('click', function() {
        
          modal.style.display = "block";
      })

      // When the user clicks on <span> (x), close the modal
      $(span).on('click', function() {
          
        modal.style.display = "none";
      })

      // When the user clicks anywhere outside of the modal, close it
      $(window).on('click', function() {
          
        if (event.target == modal) {
              modal.style.display = "none";
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