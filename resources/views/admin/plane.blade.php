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
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap-theme.min.css') }}
    {{ Html::style('asset/bower_components/jquery-ui/themes/base/jquery-ui.min.css') }}
    {{ Html::style('asset/css/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('asset/css/fa/css/font-awesome.min.css') }}
    {{ Html::style('asset/css/dashboard.css') }}
    {{ Html::style('asset/css/form.css') }}
    {{ Html::style('asset/css/team.css') }}
    {{ Html::style('asset/css/style1.css') }}
    <!-- {{ Html::style('asset/bower_components/fullcalendar/dist/fullcalendar.css') }} -->
    
    {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}
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
  
  {{ Html::script('asset/css/jquery/dist/jquery.min.js') }}  
  {{ Html::script('asset/css/bootstrap/dist/js/bootstrap.min.js') }}  
  {{ Html::script('asset/bower_components/jquery-ui/jquery-ui.min.js') }}  

  {{ Html::script('asset/css/admin/bootstrap-select.min.js') }}  
  {{ Html::script('asset/css/admin/isotope.pkgd.min.js') }}  
  {{ Html::script('asset/css/admin/bootstrap-datepicker.min.js') }}  
  {{ Html::script('asset/css/admin/functions.js') }}  
  {{ Html::script('asset/css/admin/bootstrap-dialog.min.js') }}  

  {{ Html::script('asset/bower_components/jquery-ui/jquery-ui.min.js') }}  
  {{ Html::script('asset/css/bootstrapValidator.min.js') }}  
  {{ Html::script('asset/css/typeahead.bundle.min.js') }}  
  {{ Html::script('asset/css/bootstrap-tokenfield.min.js') }}  
  {{ Html::script('asset/css/jquery.dataTables.js') }}  
  {{ Html::script('asset/css/dataTables.bootstrap.js') }}  
  {{ Html::script('asset/css/dataTables.tableTools.js') }}  
  {{ Html::script('asset/css/jquery.truncate.min.js') }}  

  <script type="text/javascript">
    $( function() {
      var qsRegex;

      var $grid = $('.users').isotope({
        itemSelector: '.user',
        layoutMode: 'fitRows',
        filter: function() {
           return qsRegex ? $(this).text().match( qsRegex ) : true;
        }
      });

      var $search = $('.search').keyup( debounce( function() {
          qsRegex = new RegExp( $search.val(), 'gi' );
          $grid.isotope();
      }, 200 ) );

      // Filters
      var $users    = $('.user').addClass('visible');
      var $filterJT   = $('#field-job-title');
      var $filterLoc  = $('#field-location');
      var $filterOthers = $('#field-others');

      $filterJT.on('change', function(){
        filterItems();
      });

      $filterLoc.on('change', function(){
        filterItems();
      });

      $filterOthers.on('change', function(){
        filterItems();
      });

      function filterItems(){
        var jt  = $filterJT.val().trim().toLowerCase();
        var loc = $filterLoc.val().trim().toLowerCase();

        var others = null;
        try{
          others = $filterOthers.val().trim().toLowerCase();
        }catch(err){
          others = null;
        }

        $users.each(function(){
          var $user     = $(this);
          var isVisible   = true;
          var userPos   = $user.find('.user-position').text().trim().toLowerCase();
          var userLoc   = $user.find('.user-location').text().trim().toLowerCase();
          var userOthers  = $user.find('.user-others').text().trim().toLowerCase();

          if (jt != '' && userPos != jt){
            isVisible = false;
          }

          if (loc != '' && userLoc != loc){
            isVisible = false;
          }

          if (others != null && others != '') {
            user_others = userOthers.split(';');
            var i;
            for (i = 0; i < user_others.length; i++) {
              user_others[i] = user_others[i].trim().toLowerCase();
            }

            if (user_others.indexOf(others.trim().toLowerCase()) < 0) {
              isVisible = false;
            }
          }

          $user.toggleClass('visible', isVisible);
        });

        $('.users').isotope({
          itemSelector: '.user',
          layoutMode: 'fitRows'
        });
      }

      $('.users').isotope({
        itemSelector: '.user',
        layoutMode: 'fitRows'
      });

      // Drag and drop function
      $('ul.users li').draggable({
        appendTo: "body",
        helper: "clone"
      });

      $('div.group-droppable').droppable({
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
          var data = [];
          data.push({name:"action", value:"add_user_to_group"});
          data.push({name:"employee_id", value: ui.draggable.attr('data-user-id')});
          data.push({name:"group_id", value: $(this).attr('data-group-id')});
          data.push({name:"csrfmiddlewaretoken", value:getCookie('csrftoken')});

          var $group = $(this);

          $.ajax({
            "type": 'POST',
            "url": '/team',
            "data": data,
            "success": function (response, textStatus, jqXHR) {
              window.location.href = "/team";
            },
            "error": function (response, textStatus, jqXHR) {
              var result_message = JSON.parse(response.responseText);

              BootstrapDialog.show({
                type: BootstrapDialog.TYPE_WARNING,
                title: 'Assign employee to group',
                message: result_message.message,
                buttons: [{
                  label: 'OK',
                  action: function (dialogRef) {
                    dialogRef.close();
                  }
                }]
              });
            }
          });
        }
      });

      $('#btnCreateGroup').click(function(event) {
        ShowCreateGroupModal(null);
      });

      $('.user-name a').truncate();
     });

     $('#btnCreateGroup').droppable({
       activeClass: "ui-state-default",
       hoverClass: "ui-state-hover",
       drop: function(event, ui) {
         ShowCreateGroupModal(ui.draggable.attr('data-user-id'));
       }
     });

     $('#btnSendInvite').click(function(event) {
       event.preventDefault();

       var data = [];
       data.push({name:"csrfmiddlewaretoken", value:getCookie('csrftoken')});
       data.push({name:"action", value:'send_invitation'});

       $.ajax({
         "type": 'POST',
         "url": '/leave/invite_all',
         "data": data,
         "success": function (response, textStatus, jqXHR) {
           var result_message = JSON.parse(response);

           BootstrapDialog.show({
             type: BootstrapDialog.TYPE_DEFAULT,
             title: 'Send invitations',
             message: result_message.message,
             buttons: [{
               label: 'OK',
               action: function (dialogRef) {
                 dialogRef.close();
               }
             }]
           });
         },
         "error": function (response, textStatus, jqXHR) {
           BootstrapDialog.show({
             type: BootstrapDialog.TYPE_WARNING,
             title: 'Send invitations',
             message: 'Fail to send invitations.',
             buttons: [{
               label: 'OK',
               action: function (dialogRef) {
                 dialogRef.close();
               }
             }]
           });
         }
       });
     });

     UpdateGroupRelatedControlStatus($('#group_name').text().trim());

     $('.btnDeleteUserFromGroup').click(function(event) {
       event.preventDefault();

       var data = [];
       data.push({name:"csrfmiddlewaretoken", value:getCookie('csrftoken')});
       data.push({name:"action", value:'delete_user_from_group'});
       data.push({name:"employee_id", value: $(this).parents('li.user').attr('data-user-id')});
       data.push({name:"group_name", value: $('#group_name').text().trim()});

       $.ajax({
         "type": 'POST',
         "url": '/team',
         "data": data,
         "success": function (response, textStatus, jqXHR) {
           window.location.href = "/team";
         },
         "error": function (response, textStatus, jqXHR) {
           var result_message = JSON.parse(response.responseText);

           BootstrapDialog.show({
             type: BootstrapDialog.TYPE_WARNING,
             title: 'Remove user from group',
             message: result_message.message,
             buttons: [{
               label: 'OK',
               action: function (dialogRef) {
                 dialogRef.close();
               }
             }]
           });
         }
       });
     });

     // Functions and logic related to edit/remove group
     $('.btnEditGroup').click(function(event) {
       $(this).parents('.section-team').find('.field-edit-group-btn').addClass('hide');
       $(this).parents('.section-team-title').addClass('no-padding');
       $(this).parents('.section-group-edit').find('.field-edit-group-form').removeClass('hide');
     });

     $('#btnCancelEditGroup').click(function(event) {
       $(this).parents('.section-team').find('.field-edit-group-btn').removeClass('hide');
       $(this).parents('.section-team-title').removeClass('no-padding');
       $(this).parents('.section-group-edit').find('.field-edit-group-form').addClass('hide');
     });

     $('#btnDeleteGroup').click(function(event) {
       event.preventDefault();

       BootstrapDialog.show({
         type: BootstrapDialog.TYPE_WARNING,
         title: 'Remove Group',
         message: 'Are you sure you want to delete this group ' + $('#group_name').text().trim() + ' and its associated assignment to leave policy?',
         buttons: [{
           label: 'Yes',
           cssClass: 'btn-primary',
           action: function(dialogRef) {
             var data = [];
             data.push({name:"csrfmiddlewaretoken", value:getCookie('csrftoken')});
             data.push({name:"action", value:'delete_group'});
             data.push({name:"group_name", value: $('#group_name').text().trim()});

             $.ajax({
               "type": 'POST',
               "url": '/team',
               "data": data,
               "success": function (response, textStatus, jqXHR) {
                 window.location.href = "/team";
               },
               "error": function (response, textStatus, jqXHR) {
                 var result_message = JSON.parse(response.responseText);

                 BootstrapDialog.show({
                   type: BootstrapDialog.TYPE_WARNING,
                   title: 'Remove Group',
                   message: result_message.message,
                   buttons: [{
                     label: 'OK',
                     action: function (dialogRef) {
                       dialogRef.close();
                     }
                   }]
                 });
               }
             });
           }
         },
                   {
                     label: 'Cancel',
                     cssClass: 'btn-default',
                     action: function (dialogRef) {
                       dialogRef.close();
                     }
                   }
         ]
       });
     });

     $('form#form-edit-group').bootstrapValidator({
       framework: 'bootstrap',
       message: 'This value is not valid',
       container: function($field, validator) {
         var $parent = $field.parents('.form-group');
       },
       fields: {
         new_group_name: {
           validators: {
             notEmpty: {
               message: 'Please specify the group name.'
             }
           }
         }
       }
     }).on('success.form.bv', function (e) {
       e.preventDefault();

       var data = $(this).serializeArray();
       data.push({name:"action", value:"edit_group"});
       data.push({name:"csrfmiddlewaretoken", value:getCookie('csrftoken')});
       data.push({name:"group_name", value: $('#group_name').text().trim()});

       $.ajax({
         "type": 'POST',
         "url": '/team',
         "data": data,
         "success": function (response, textStatus, jqXHR) {
           window.location.href = "/team";
         },
         "error": function (response, textStatus, jqXHR) {
           var result_message = JSON.parse(response.responseText);

           BootstrapDialog.show({
             type: BootstrapDialog.TYPE_WARNING,
             title: 'Assign employee to group',
             message: result_message.message,
             buttons: [{
               label: 'OK',
               action: function (dialogRef) {
                 dialogRef.close();
               }
             }]
           });
         }
       });
     });

    // Functions related to the modal of creating group
    function ShowCreateGroupModal(employee_id) {
      var modal = $('#modal-create-group').clone();

      modal.modal({'backdrop:': 'static', 'show': false})

      // Set up employee table
      employee_table = modal.find('#employee_table').DataTable({
        "paging": false,
        "ajax": {
          "url": "/leave/query_employees_table",
          "type": "POST",
          "data": function (d) {
            return $.extend({}, d, {
              "csrfmiddlewaretoken": getCookie('csrftoken'),
            });
          }
        },
        "columns": [
          { "data": null, "defaultContent": '', "orderable": false },
          { "data": "employee" },
          { "data": "department" },
          { "data": "location" },
          { "data": "joined" },
          { "data": "gender" }
        ],
        dom: 'T<"clear">lfrtip',
        tableTools: {
          sRowSelect: "multi",
          sRowSelector: 'td:first-child',
          aButtons: [ "select_all", "select_none" ]
        }
      });

      var tableTools = new $.fn.dataTable.TableTools( employee_table, {
        sRowSelect: 'multi',
        sRowSelector: 'td:first-child',
        aButtons: ['select_all', 'select_none' ]
      });

      $(tableTools.fnContainer() ).appendTo( '#employee_table_wrapper .col-sm-6:eq(0)' );

      // Form validation
      modal.find('.form-create-group').bootstrapValidator({
        framework: 'bootstrap',
        message: 'This value is not valid',
        container: function($field, validator) {
          var $parent = $field.parents('.form-group');
        },
        fields: {
          group_name: {
            validators: {
              notEmpty: {
                message: 'Please specify the group name.'
              }
            }
          },
        }
      }).on('success.form.bv', function (e) {

        e.preventDefault();

        selected_employees = employee_table.rows('.selected').data();

        if (selected_employees.length == 0) {
          BootstrapDialog.show({
            type: BootstrapDialog.TYPE_WARNING,
            title: 'Create group',
            message: 'Please select the employees who will be assigned to group.',
            buttons: [{
              label: 'OK',
              action: function (dialogRef) {
                dialogRef.close();
              }
            }]
          });
          modal.find('.btn-CreateGroup').prop('disabled', false);

          return false;
        }

        employee_ids = '';
        for (i = 0; i < selected_employees.length; i++) {
          if (employee_ids == '') {
            employee_ids = selected_employees[i].DT_RowId;
          }
          else {
            employee_ids = employee_ids + ';' + selected_employees[i].DT_RowId;
          }
        }

        var data = $(this).serializeArray();
        data.push({name:"action", value:"create_new_group"});
        data.push({name:"employee_ids", value:employee_ids});
        data.push({name:"csrfmiddlewaretoken", value:getCookie('csrftoken')});

        $.ajax({
          "type": 'POST',
          "url": '/team',
          "data": data,
          "success": function (response, textStatus, jqXHR) {
            window.location.href = "/team";
          },
          "error": function (response, textStatus, jqXHR) {
            var result_message = JSON.parse(response.responseText);

            BootstrapDialog.show({
              type: BootstrapDialog.TYPE_WARNING,
              title: 'Create group',
              message: result_message.message,
              buttons: [{
                label: 'OK',
                action: function (dialogRef) {
                  dialogRef.close();
                }
              }]
            });
          }
        });
      });

      modal.modal('show');
     }

     function UpdateGroupRelatedControlStatus(group_name) {
       if (group_name.toLowerCase() == 'everyone') {
         $('.users').find('.btnDeleteUserFromGroup').addClass('hidden');
         $('.section-team .field-edit-group-btn').addClass('hidden');
       }
       else {
         $('.users').find('.btnDeleteUserFromGroup').removeClass('hidden');
         $('.section-team .field-edit-group-btn').removeClass('hidden');
       }
     }

     // debounce so filtering doesn't happen every millisecond
     function debounce( fn, threshold ) {
       var timeout;
       return function debounced() {
         if (timeout) {
           clearTimeout( timeout );
         }

         function delayed() {
           fn();
           timeout = null;
         }
         timeout = setTimeout( delayed, threshold || 100 );
       }
     }

     $(".panel-default > .panel-collapse").on('shown.bs.collapse', function () {
       var group_name = $(this).parent().find('a').text().trim();

       // Update group name field on the page
       $('#group_name').html( group_name );
       $('input[name=new_group_name]').val(group_name);

       // Update the status of the button for deleting employee from group
       UpdateGroupRelatedControlStatus(group_name);

       $('select#field-others').selectpicker('val', group_name);
       $('select#field-others').trigger('change');

       // Update table/list view
       users_table.columns(6).search('group=' + group_name).draw();
     });

     $("#sidebar_everyone").on('shown.bs.collapse', function () {
       $('.filters-controls > select').selectpicker('val', '');
       $('.filters-controls > select').trigger('change');

       // Update table/list view
       users_table.columns().search('').draw();
     });

     // Show users in list view instead of grid view
     $('#grid_view').click(function(){
       $('#list_view').removeClass('disabled');
       $(this).addClass('disabled');

       $('.users.grid').removeClass('hidden');
       $('.users.table').addClass('hidden');

       $('.filters-team').removeClass('hidden');
       $('.navbar-form[role="search"]').removeClass('hidden');
       return false;
     });

     $('#list_view').click(function(){
       $('#grid_view').removeClass('disabled');
       $(this).addClass('disabled');

       $('.users.table').removeClass('hidden');
       $('.users.grid').addClass('hidden');

       $('.filters-team').addClass('hidden');
       $('.navbar-form[role="search"]').addClass('hidden');
       return false;
     });

     var users_table = $('#users_table').DataTable({
       "paging": false,
       "searching": true,
     });
</script>
<!-- END JSCRIPT -->
	@yield('extrascripts')
</body>
</html>