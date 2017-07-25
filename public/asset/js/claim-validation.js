// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='claimForm']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      c_month : "required",
      c_type  : "required",
      c_date  : "required",
      c_particular : "required",
      c_brn        : "required",
      c_gstno      : "required",
      c_namount : "required",
      exsclient_amount : "required",
      potclient_amount : "required",
      suplier_amount   : "required",
      c_eamount        : "required",
      client_name  : "required",
      destination  : "required",
      toll         : "required",
      parking      : "required",
      accomodation : "required",
      allowance    : "required",
      mileage      : "required",
      amount       : "required",
    },
    // Specify validation error messages
    messages: {
      c_month  : "Please select month",
      c_type   : "Please select claim type",
      c_date   : "Please select date",
      c_particular  : "Please enter the particular",
      c_brn  : "Please enter the business registration number",
      c_gstno  : "Please enter the GST No.",
      c_namount  : "Please enter the total amount",
      exsclient_amount  : "Please enter the amount spent on existing client",
      potclient_amount  : "Please enter the amount spent on potential client",
      suplier_amount    : "Please enter the amount spent on supplier",
      c_eamount         : "Please enter the total amount",
      client_name       : "Please enter the cliet name",
      destination       : "Please enter the destination",
      toll              : "Please enter amount used for toll",
      parking           : "Please enter amount used for parking",
      accomodation      : "Please enter amount used for accomodation",
      allowance         : "Please enter amount spent on allowance",
      mileage           : "Please enter total distance travel",
      amount            : "Please enter the total amount"
    },

    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});