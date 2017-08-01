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
          width: 30%;
          height: 500px;
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
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap-theme.min.css') }}
    {{ Html::style('asset/bower_components/jquery-ui/themes/base/jquery-ui.min.css') }}
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('asset/css/fa/css/font-awesome.min.css') }}
    {{ Html::style('asset/css/dashboard.css') }}
    {{ Html::style('asset/css/form.css') }}
    {{ Html::style('asset/css/team.css') }}
    {{ Html::style('asset/css/sweetalert.css') }}
    
@yield('extrastyles')    

</head>

<body>
	@yield('body')
  
  {{ Html::script('asset/js/Chart.js') }}  
  {{ Html::script('asset/js/sweetalert.min.js') }}  
  {{ Html::script('asset/bower_components/moment/min/moment.min.js') }}
  {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}  
  {{ Html::script('asset/js/jquery.validate.min.js') }}  
  {{ Html::script('asset/js/claim-validation.js') }}  
  {{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }}  
  {{ Html::script('asset/bower_components/jquery-ui/jquery-ui.min.js') }}  

  @include('sweet::alert')

<script type="text/javascript">

  // The popup for creating new group 
  var modal = document.getElementById('myModal');
  var btn = document.getElementById("btnCreateGroup");
  var span = document.getElementsByClassName("close")[0];

  $(btn).on('click', function() {
    
      modal.style.display = "block";
  })

  $(span).on('click', function() {
      
    modal.style.display = "none";
  })

  $(window).on('click', function() {
      
    if (event.target == modal) {
          modal.style.display = "none";
      }
  })

  // The popup for edit staff information 
  var modalStaff = document.getElementById('staffModal');
  var btnStaff = document.getElementById("personal_edits");
  var spanStaff = document.getElementsByClassName("close")[0];

  $(btnStaff).on('click', function() {
    
      modalStaff.style.display = "block";
  })

  $(spanStaff).on('click', function() {
      
    modalStaff.style.display = "none";
  })

  $(window).on('click', function() {
      
    if (event.target == modalStaff) {
          modalStaff.style.display = "none";
      }
  })

  // The popup for edit employment information 
  var modalEmployment = document.getElementById('employmentModal');
  var btnEmploymment = document.getElementById("employment_edits");
  var spanEmployment = document.getElementsByClassName("close")[0];

  $(btnEmploymment).on('click', function() {
    
      modalEmployment.style.display = "block";
  })

  $(spanEmployment).on('click', function() {
      
    modalEmployment.style.display = "none";
  })

  $(window).on('click', function() {
      
    if (event.target == modalEmployment) {
          modalEmployment.style.display = "none";
      }
  })

  // The popup for edit compensation information 
  var modalCompensation = document.getElementById('compensationModal');
  var btnCompensation = document.getElementById("compensation_edits");
  var spanCompensation = document.getElementsByClassName("close")[0];

  $(btnCompensation).on('click', function() {
    
      modalCompensation.style.display = "block";
  })

  $(spanCompensation).on('click', function() {
      
    modalCompensation.style.display = "none";
  })

  $(window).on('click', function() {
      
    if (event.target == modalCompensation) {
          modalCompensation.style.display = "none";
      }
  })

  //input type date configuration
  var today = moment().format('YYYY-MM-DD');
  document.getElementById("c_date").value = today; 
  document.getElementById("c_date").setAttribute('min', today);
  console.log(document.getElementById("c_date").value);

  var current_month = moment().format('YYYY-MM');
  document.getElementById('c_month').value = current_month;
  document.getElementById('c_month').setAttribute('min', current_month);
  console.log(document.getElementById("c_month").value);

  $('#entertainment-amount').hide();
  $('#travel-claim').hide();

  $('#c_type').on('change', function (){

    var current = $(this).val();

    if (current ==  2) {
      $('travel-claim').hide();
      $('#normal-amount').hide(); 
      $('#entertainment-amount').show();
    }
    else if (current == 14) {
      $('#normal-claim').hide();
      $('#travel-claim').show();
    }
    else{
      $('#normal-claim').show();
      $('#normal-amount').show();
      $('#entertainment-amount').hide();
      $('#travel-claim').hide();
    }
  })

</script>
<!-- END JSCRIPT -->
	@yield('extrascripts')
</body>
</html>